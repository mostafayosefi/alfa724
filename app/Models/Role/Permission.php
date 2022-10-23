<?php

namespace App\Models\Role;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{



    protected $fillable = [
        'name', 'link',
    ];



    public function roles(){
        return $this->hasMany(PermissionRole::class , 'role_id');
    }

    public function permission_accesses(){
        return $this->hasMany(PermissionAccesse::class , 'permission_id');
    }



}
