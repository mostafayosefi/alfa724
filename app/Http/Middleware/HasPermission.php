<?php

namespace App\Http\Middleware;

use App\Models\Role\PermissionAccesse;
use App\Models\Role\PermissionRole;
use Closure;
use Illuminate\Http\Request;

class HasPermission
{

public function handle($request, Closure $next,$permissions  )
{



    $PermissionAccesse = PermissionAccesse::where([ ['link',$permissions], ])->first();
    $PermissionRole = PermissionRole::where([
        ['permission_accesse_id',$PermissionAccesse->id],
        ['role_id',$request->user()->role_id],
         ])->first();
    $status = $PermissionRole->status;

        if($status == 'inactive'){
            return redirect()->route('dashboard.admin.customer.create');
        }

 

    return $next($request);


 }
}
