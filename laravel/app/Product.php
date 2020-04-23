<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    const HOT_ON = 1;
    const HOT_OFF = 0;

    protected $hot = [
        1 => [
            'name' => 'nổi bật',
            'class' => 'lable-success'
        ],
        0 => [
            'name' => 'không',
            'class' => 'lable-default'
        ]
    ];
    public function getHot($value){
        return array_get($this->hot, $value);
    }

    public function category(){
        return $this->belongsTo('App\Category', 'category_id', 'id');
    }
}
