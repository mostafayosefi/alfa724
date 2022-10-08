<?php

namespace App\Models\Price;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PriceMyProject extends Model
{

    protected $fillable = [
        'price', 'text', 'date', 'miladi',
        'type','status','project_id',
    ];

    public function project(){
        return $this->belongsTo(Project::class);
    }
}
