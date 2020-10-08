<?php

namespace App\Models;

use App\User;
use App\Models\Spa;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'hv_transactions';
    protected $guarded = [''];

    public function users()
    {
        return $this->belongsTo(User::class, 'tr_user_id');
    }

    public function spa()
    {
        return $this->belongsTo(Spa::class, 'tr_spa_id');
    }

    protected $status = [
        0 => [
            'name' => 'Tiep nhan',
            'class' => 'label-default'
        ],
        1 => [
            'name' => 'Dang van chuyen',
            'class' => 'label-primary'
        ],
        2 => [
            'name' => 'Da ban giao',
            'class' => 'label-info'
        ],
        -1 => [
            'name' => 'da huy',
            'class' => 'label-danger'
        ]
    ];

    public function getStatus()
    {
        return array_get($this->status, $this->tr_status, 'N\A');
    }
}
