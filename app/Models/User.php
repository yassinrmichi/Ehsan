<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'role',
        'phone',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    public function association()
{
    return $this->hasOne(Association::class);
}

    // Si l'utilisateur est un donateur
    public function donorConversations()
    {
        return $this->hasMany(Conversation::class, 'donator_id');
    }

    // Si l'utilisateur est une association
    public function associationConversations()
    {
        return $this->hasMany(Conversation::class, 'association_id');
    }

    // Pour récupérer toutes les conversations où l'utilisateur participe
    public function conversations()
    {
        return $this->hasMany(Conversation::class, 'donator_id')
                    ->orWhere('association_id', $this->id);
    }
}





