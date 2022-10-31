<?php

namespace App\Models\Price;

use App\Models\Project;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
