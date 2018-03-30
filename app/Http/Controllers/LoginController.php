<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    public function index(Request $request){
        if($request->isMethod('post')){

            //validation
            $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);

            $check = User::where('email',$request->input('email'))->get()->toArray();
            if(empty($check)){
                return  Redirect::back()->withErrors([ 'Անվավեր Էլ Հասցե']);
            }else{

                if (Hash::check($request->input('password'), $check[0]['password'])) {

                     Auth::loginUsingId($check[0]['id']);
                    return redirect()->route('loan');

                }else{

                    return  Redirect::back()->withErrors([ 'Անվավեր Գաղտնաբառ']);

                }
            }

        }else{
            return view('login');
        }
    }
}
