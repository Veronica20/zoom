<?php

namespace App\Http\Middleware;

use App\Loan;
use Closure;

class checkPersonal
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
        if(is_null($userLoged)){
            return redirect()->route('registration');
        }else{
            $user = Loan::where('user_id',$userLoged)->get()->toArray();
            if(empty($user)){
                return redirect()->route('loan');
            }elseif (empty($user[0]['name']) && !empty($user[0]['user_id'])){
                return $next($request);
            }else{
                return redirect()->route('hurray');
            }
        }
    }
}
