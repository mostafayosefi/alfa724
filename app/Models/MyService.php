<?php

namespace App\Models;

use App\Models\Cleander\CleanderDayMyService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MyService extends Model
{


    protected $fillable = [
        'name', 'count', 'price',
        'durday','startdate','enddate',
        'recvdate','purdate','pricerecvsallary',
        'text','user_id','my_customer_id',  'status','service_id',
    ];


    public function service(){
        return $this->belongsTo(Service::class);
    }

    public function cleander_day_my_services(){
        return $this->hasMany(CleanderDayMyService::class , 'my_service_id');
    }


    public function user(){
        return $this->belongsTo(User::class);
    }


}
