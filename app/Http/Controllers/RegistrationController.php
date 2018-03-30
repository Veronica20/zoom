<?php

namespace App\Http\Controllers;
use App\Loan;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{

    public function registration(Request $request){

        if($request->isMethod('post')){

            //validation
            $request->validate([
                'email' => 'required|email|unique:users',
                'email_confirmation' => 'required|same:email|email',
                'password' => 'required|max:12|min:6',
                'password_confirmation' => 'required|same:password|max:12|min:6',
                'image' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            //upload image
            $image = $request->file('image');
            $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('images');
            $image->move($destinationPath, $input['imagename']);


            //save to db
            $user = new User();
            $user->email = $request->input('email');
            $user->password  = Hash::make($request->input('password')); ;
            $user->image = $input['imagename'];
            $user->save();


            //login
            Auth::loginUsingId($user->id);

            return redirect()->route('loan');

        }else{
            $path =1;

            return view('registration',[
                'path' =>$path
            ]);
        }

    }

    public function loan(Request $request){

        if($request->isMethod('post')){

            $request->validate([
                'currency' => 'required|max:3',
                'money' => 'required|integer',
                'county' => 'required',
            ]);

            $loan = new Loan();
            $loan->currency = $request->input('currency');
            $loan->user_id = Auth::id();
            $loan->money = $request->input('money');
            $loan->county = $request->input('county');
            $loan->save();

            return redirect()->route('personal');
        }else{

            $path = 2;
            $county = ['Երևան','Արագածոտն','Արարատ', 'Արմավիր','Գեղարքունիք','Կոտայք','Լոռի','Շիրակ','Սյունիք','Տավուշ',
                'Վայոց ձոր'];

            return view('loan',[
                'county' =>$county,
                'path'=>$path
            ]);
        }
    }

    public function personal(Request $request){

        if($request->isMethod('post')){
            $request->validate([
                'name' => 'required|max:8',
                'surname' => 'required|max:8',
                'sex' => 'required',

                'day' => 'required|max:2|date_format:"d"',
                'month' => 'required|date_format:"m"',
                'year' => 'required|max:4|date_format:"Y"',

                'address' => 'required|max:12',
                'family_count' => 'required|max:3',
                'identity_type' => 'required|max:25',
                'identity_number' => 'required|max:25',

                'given_day' => 'required|max:4|date_format:"d"',
                'given_month' => 'required|max:4|date_format:"m"',
                'given_year' => 'required|max:4|date_format:"Y"',

                'given_person' => 'required|max:25',
            ]);

            $DOB = Carbon::create(
                $request->input('year'),
                $request->input('month'),
                $request->input('day')
            )->format('Y-m-d');

            $given_date = Carbon::create(
                $request->input('given_year'),
                $request->input('given_month'),
                $request->input('given_day')
            )->format('Y-m-d');



            Loan::where('user_id', Auth::id())->
                update([
                 'name'=>$request->name,
                'surname' => $request->surname,
                'sex' => $request->sex,
                'DOB' => $DOB,
                'address' => $request->address,
                'family_count'=>$request->family_count,
                'identity_type'=>$request->identity_type,
                'identity_number'=>$request->identity_number,
                'given_date'=>$given_date,
                'given_person'=>$request->given_person,
            ]);



            return redirect()->route('hurray');
        }else{

            $month = [
                1 => 'Հունվար‎','Փետրվար‎','Մարտ‎','Ապրիլ‎','Մայիս‎',
                'Հունիս‎','Հուլիս‎' ,'Օգոստոս‎' , 'Սեպտեմբեր‎',
                'Հոկտեմբեր‎','Նոյեմբեր‎','Դեկտեմբեր‎'];

            $year = array_reverse(range(1950, Carbon::now()->format('Y')));

            $path = 3;

            return view('personal',[
                'month' => $month,
                'year'=>$year,
                'path' =>$path
            ]);
        }
    }

    public function hurray(){

        $path = 4;
        return view('hurray',['path' =>$path]);
    }

    public function logout(){

        Auth::logout();
        return redirect()->route('login');
    }
}
