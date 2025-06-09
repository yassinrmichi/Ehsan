<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paiyment extends Model
{
    protected $fillable = [
        'association_id',
        'donor_name',
        'amount',
        'payment_intent_id',
        'status',
    ];

    public function association()
    {
        return $this->belongsTo(Association::class);
    }
}
