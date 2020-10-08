<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = 'booking';
    protected $guarded = [''];

    public function spa()
    {
        return $this->belongsTo(Spa::class, 'spa_id');
    }
}
