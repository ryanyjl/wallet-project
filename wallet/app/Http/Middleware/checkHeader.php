<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;  

use Response;  

class checkHeader
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

        if($request->segment(2) == 'admin') {

            if(!isset($_SERVER['HTTP_X_AUTH_KEY'])){  
                return Response::json(array('error'=>'Please set custom header'));
            } 

            if($_SERVER['HTTP_X_AUTH_KEY'] != "Zioj23D92j2kGf9D"){
                return Response::json(array('error'=>'Incorrect header.'));
            }

        }

        return $next($request);  
    }
}
