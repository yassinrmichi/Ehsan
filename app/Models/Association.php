<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Association extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'nom',
        'adresse',
        'ville',
        'code_postal',
        'telephone',
        'email',
        'description',
        'site_web',
        'logo',
        'couverture',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function donations()
    {
        return $this->hasMany(Donation::class);
    }

    public function publications()
{
    return $this->hasMany(Publication::class);
}

public function events()
{
    return $this->hasMany(Event::class);
}


}
