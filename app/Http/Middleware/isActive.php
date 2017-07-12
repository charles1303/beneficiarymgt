<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Guard;

class isActive
{

    protected $auth;

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = $this->auth->user();
        if($user && $user->active == 0){
            $request->session()->flash('activeMsg', 'Please Contact Admin to Activate your account');
            return redirect()->action('HomeController@index');
        }
        return $next($request);
    }
}
