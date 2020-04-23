<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    public $table = "categorys";

    public function products() {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }
}
