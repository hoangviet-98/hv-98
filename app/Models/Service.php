<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'hv_service';
    protected $guarded = [''];

    public function spa()
    {
        return $this->belongsTo(Spa::class, 'se_spa_id');
    }
}
