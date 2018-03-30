<?php

namespace App\Http\Middleware;

use App\Loan;
use Closure;

class checkLoan
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
        $userLoged =  \Auth::id();

        if(!is_null($userLoged)){

            $user = Loan::where('user_id',$userLoged)->get()->toArray();
            if(empty($user)){
                return $next($request);
            }elseif(empty($user[0]['name']) && !empty($user[0]['user_id'])){
                return redirect()->route('personal');
            }else{
                return redirect()->route('hurray');
            }
        }else{
            return redirect()->route('registration');
        }
    }
}
