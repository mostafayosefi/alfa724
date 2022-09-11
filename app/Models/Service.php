<?php

namespace App\Models;

use App\Models\Cleander\CleanderDayService;
use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use SoftDeletes;
    use CascadeSoftDeletes;
    use HasFactory;
    protected $table='services';
    protected $fillable=['name','description','start_date','end_date', 'status',
    'count',
    'price',
    'customer_id',
    'time',
    'lead',
    'customer_job',
    'salary',
    'final_date',
    'purchase_date',
    'deposit',
    'deposit_date',
    'deposit2',
    'deposit_date2',
    'deposit3',
    'deposit_date3',
    'deposit4',
    'deposit_date4',
    'deposit5',
    'deposit_date5',
    'deposit5',
    'deposit_date5',
    'deposit6',
    'deposit_date6',
    'deposit7',
    'deposit_date7',
    'deposit8',
    'deposit_date8',
    'deposit9',
    'deposit_date9',
    ];
    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    public function custome() {
        return $this->belongsTo(Customer::class, 'customer_id');
    }


    public function user() {
        return $this->belongsTo(User::class, 'lead');
    }



    public function cleander_day_services(){
        return $this->hasMany(CleanderDayService::class , 'service_id');
    }


}
