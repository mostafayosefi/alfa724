<?php

namespace App\Models;

use App\Models\Cleander\CleanderDayMyService;
use App\Models\Price\PriceMyService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MyService extends Model
{


    protected $fillable = [
        'name', 'count', 'price',
        'durday','startdate','enddate',
        'recvdate','purdate','pricerecvsallary',
        'text','user_id','customer_id',  'status','service_id',
    ];

 

    public function cleander_day_my_services(){
        return $this->hasMany(CleanderDayMyService::class , 'my_service_id');
    }


    public function user(){
        return $this->belongsTo(User::class)->withTrashed();
    }


    public function price_my_services(){
        return $this->hasMany(PriceMyService::class , 'my_service_id');
    }


    // public function my_customer(){
    //     return $this->belongsTo(MyCustomer::class);
    // }


    public function customer(){
        return $this->belongsTo(Customer::class)->withTrashed();
    }


}
