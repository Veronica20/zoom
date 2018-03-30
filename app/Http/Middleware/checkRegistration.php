<?php

namespace App\Http\Middleware;

use App\Loan;
use App\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class checkRegistration
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $userLoged =  Auth::id();

        if(is_null($userLoged)){
            return $next($request);
        }else{
           $user = Loan::where('user_id',$userLoged)->get()->toArray();
           if(empty($user)){
               return redirect()->route('loan');
           }elseif($user[0]['name']){
               return redirect()->route('personal');
           }else{
               return redirect()->route('hurray');
           }
        }

    }
}
