<?php

namespace App\Models\Role;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{


    protected $fillable = [
        'name', 'link',
    ];


    public function users(){
        return $this->hasMany(User::class , 'role_id');
    }

    public function permissions(){
        return $this->hasMany(PermissionRole::class , 'permission_id');
    }

 


}
