<?php

namespace App\Models\Notification;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotificationType extends Model
{


    protected $fillable = [
        'name',   'link',
    ];


    
    public function notification_lists(){
        return $this->hasMany(NotificationList::class , 'notification_type_id');
    }


}
