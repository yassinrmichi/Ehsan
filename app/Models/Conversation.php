<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Conversation extends Model
{
    protected $fillable = ['donator_id', 'association_id'];


    protected $with = ['latestMessage'];

    public function donator()
    {
        return $this->belongsTo(User::class, 'donator_id');
    }

    public function association()
    {
        return $this->belongsTo(User::class, 'association_id');
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function latestMessage()
    {
        return $this->hasOne(Message::class)->latest();
    }

    // Nouvelle méthode : compter les messages non lus pour l'utilisateur connecté
    public function getUnreadMessagesCountAttribute()
    {
        return $this->messages()
                    ->where('sender_id', '!=', auth()->id())
                    ->whereNull('read_at')
                    ->count();
    }

    // Retourne le nom de l'autre participant
  public function getOtherParticipant()
{
    $userId = auth()->id();
    if ($this->donator_id === $userId) {
        return $this->association;
    }
    return $this->donator;
}

}



