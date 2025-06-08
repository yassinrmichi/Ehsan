<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
     protected $fillable = [
        'conversation_id', // <-- ajoute cette ligne
        'sender_id',
        'message',

    ];
    protected $dates = ['read_at'];

        public function conversation()
        {
            return $this->belongsTo(Conversation::class);
        }


        public function sender()
        {
            return $this->belongsTo(User::class, 'sender_id');
        }




}


