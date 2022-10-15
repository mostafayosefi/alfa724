<?php

namespace App\Models\Score;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScoreSetting extends Model
{

    protected $fillable = [
        'name',
        'link',
        'status',
        'value',
        'text',
        'value_award',
        'text_value_award',
        'price',
        'text_price',
        'price_award',
        'text_price_award',
    ];
 


}
