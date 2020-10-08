<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $table = 'hv_schedule';
    protected $guarded = [''];

    public function getStatus()
    {
        return array_get($this->status, $this->s_status, 'N\A');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 's_user_id');
    }

    public function spa()
    {
        return $this->belongsTo(Spa::class, 's_spa_id');
    }

    protected $status = [
        0 => [
            'name' => 'Xu ly',
            'class' => 'label-default'
        ],
        1 => [
            'name' => 'Da tiep nhan',
            'class' => 'label-primary'
        ],
        2 => [
            'name' => 'da huy',
            'class' => 'label-danger'
        ]
    ];

}
