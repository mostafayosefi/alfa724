<?php

namespace App\Models\Notification;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotificationList extends Model
{


    protected $fillable = [
        'notification_service_id', 'notification_type_id' , 'name' , 'status' , 'link', 'text_default'
    ];

    

    public function notification_service(){
        return $this->belongsTo(NotificationService::class);
    }


    public function notification_type(){
        return $this->belongsTo(NotificationType::class);
    }


    
    public function notification_messages(){
        return $this->hasMany(NotificationMessage::class , 'notification_list_id');
    }



}
