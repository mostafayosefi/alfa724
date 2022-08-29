<?php

namespace App\Models\Cleander;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CleanderDay extends Model
{

    protected $fillable = [
        'date', 'holiday', 'day',
        'cleander_month_id',
    ];



    public function cleander_month(){
        return $this->belongsTo(CleanderMonth::class);
    }

}
