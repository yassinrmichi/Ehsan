<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;
    protected $fillable = [
        'association_id',
        'montant',
        'date',
        'message',
    ];
    public function association()
    {
        return $this->belongsTo(Association::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
