<?php

namespace App\Entities\Product\Feature;

use Illuminate\Database\Eloquent\Model;

class Translation extends Model
{
    public $timestamps = false;
    public $table = 'product_feature_translations';
    protected $fillable = ['title', 'description'];
}