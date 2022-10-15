<?php

namespace App\Models\Role;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermissionRole extends Model
{


    protected $fillable = [
        'role_id', 'permission_id','status', 'permission_accesse_id' ,
    ];



    public function permission(){
        return $this->belongsTo(Permission::class);
    }


    public function role(){
        return $this->belongsTo(Role::class);
    }


    public function permission_accesse(){
        return $this->belongsTo(PermissionAccesse::class);
    }

 





}
