<?php

namespace App\Entities\Product\Category;

use Illuminate\Database\Eloquent\Model;

class Translation extends Model
{
    public $timestamps = false;
    public $table = 'product_category_translations';
    protected $fillable = ['title', 'description'];
}