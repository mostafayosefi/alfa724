<?php

namespace App\Models\Role;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermissionAccesse extends Model
{

    protected $fillable = [
        'name', 'link',
    ];



    public function permission_roles(){
        return $this->hasMany(PermissionRole::class , 'permission_accesse_id');
    }

}
