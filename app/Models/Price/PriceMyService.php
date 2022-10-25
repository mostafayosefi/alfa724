<?php

namespace App\Models\Price;

use App\Models\MyService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PriceMyService extends Model
{

    protected $fillable = [
        'price', 'text', 'date', 'miladi',
        'type','status','my_service_id',
        'for','description','name_send',
        'name_recv','intype','file',
    ];

    public function my_service(){
        return $this->belongsTo(MyService::class);
    }


}
