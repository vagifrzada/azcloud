<?php

namespace App\Entities\Product\Benefit;

use Illuminate\Database\Eloquent\Model;

class Translation extends Model
{
    public $timestamps = false;
    public $table = 'product_benefit_translations';
    protected $fillable = ['title', 'description'];
}