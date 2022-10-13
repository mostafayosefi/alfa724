<?php

namespace App\Models\Price;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PriceMyProject extends Model
{

    protected $fillable = [
        'price', 'text', 'date', 'miladi',
        'type','status','project_id',
        'for','description','name_send',
        'name_recv','intype','file',
    ];

 

    public function project(){
        return $this->belongsTo(Project::class);
    }
}
