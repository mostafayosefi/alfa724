<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class HasPermission
{

public function handle($request, Closure $next,$permissions ,$b)
{




    $permissions_array = explode('|', $permissions);
    // $user = $this->auth->user();

    dd($b);
    // dd($permissions_array);
    // dd($request->user()->hasPermission('superasmin'));
    foreach($permissions_array as $permission){
        if(!$request->user()->hasPermission($permission)){

            // echo $permission.'<br>';
            return redirect()->route('dashboard.admin.customer.create');
        }
    }
    // dd($request->user()->hasPermission($permission));

    return $next($request);


 }
}
