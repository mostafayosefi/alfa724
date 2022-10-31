<?php

namespace App\Models\Price;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PriceSystem extends Model
{

    protected $fillable = [
        'price',  'date', 'miladi',
        'type','status',
        'for','description','name_send',
        'name_recv','intype', 
    ];
}
