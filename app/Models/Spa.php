<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Spa extends Model
{
    protected $table = 'hv_spa';
    protected $guarded = [''];

    public function spa()
    {
        return $this->belongsTo(Spa::class, 'emp_spa_id');
    }
}
