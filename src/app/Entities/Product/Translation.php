<?php

namespace App\Entities\Product;

use Illuminate\Database\Eloquent\Model;

class Translation extends Model
{
    public $timestamps = false;
    protected $table = 'product_translations';
}