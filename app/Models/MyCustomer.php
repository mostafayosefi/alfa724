<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MyCustomer extends Model
{

    protected $fillable = [
        'name', 'code', 'tell',
        'tells','job','referal',
        'domain','host','email',
        'text','customer_id',
    ];


    public function customer(){
        return $this->belongsTo(Customer::class);
    }


}
