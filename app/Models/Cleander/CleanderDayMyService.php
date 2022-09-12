<?php

namespace App\Models\Cleander;

use App\Models\MyService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CleanderDayMyService extends Model
{

    protected $fillable = [
        'my_service_id',
        'cleander_day_id',
    ];


    public function cleander_day(){
        return $this->belongsTo(CleanderDay::class);
    }

    public function my_service(){
        return $this->belongsTo(MyService::class);
    }
}
