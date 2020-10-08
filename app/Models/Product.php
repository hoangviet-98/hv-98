<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'hv_product';
    protected $guarded = [''];

    const STATUS_PUBLIC = 1;
    const STATUS_PRIVATE = 0;

    const HOT_ON = 1;
    const HOT_OFF = 0;

    protected $hot = [
        1 => [
            'name' => 'HOT',
            'class' => 'label-danger'
        ],
        0 => [
            'name' => 'NO',
            'class' => 'label-primary'
        ]
    ];

    protected $status = [
        1 => [
            'name' => 'Public',
            'class' => 'label-primary'
        ],
        0 => [
            'name' => 'Private',
            'class' => 'label-danger'
        ]
    ];
    public function getHot()
    {
        return array_get($this->hot, $this->pro_hot, 'N\A');
    }
    public function getStatus()
    {
        return array_get($this->status, $this->pro_active, 'N\A');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'pro_category_id');
    }
}
