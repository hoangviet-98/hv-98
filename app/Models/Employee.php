<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'hv_employee';
    protected $guarded = [''];


public function spa()
{
    return $this->belongsTo(Spa::class, 'emp_spa_id');
}
}
