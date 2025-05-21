<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $fillable = ['association_id','titre','description','date','lieu','image'];

    public function association()
{
    return $this->belongsTo(Association::class);
}

}
