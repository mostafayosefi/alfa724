<?php

namespace App\Models;

use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use SoftDeletes;
    use CascadeSoftDeletes;
    use HasFactory;
    protected $table='customers';
    protected $fillable=['description',
    'customer_name',
    'customer_phone',
    'customer_mobile',
    'customer_job',
    'customer_provider',
    'customer_code',
    'domain',
    'host',
    'email',
    ];


    public function my_customer(){
        return $this->hasOne(MyCustomer::class , 'customer_id');
    }


    public function my_services(){
        return $this->hasMany(MyService::class , 'customer_id');
    }


}
