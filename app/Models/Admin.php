<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
class Admin extends Authenticatable
{
    use Notifiable;

    protected $table = 'admins';
    public $timestamps = false;

    protected $fillable = [
        'name', 'spa_id', 'email', 'password', 'phone', 'avatar' ,'created_at',  'password', 'role_id',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id', 'id');
    }

    public function spa()
    {
        return $this->belongsTo(Spa::class, 'spa_id');
    }
}

