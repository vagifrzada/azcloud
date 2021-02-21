<?php

namespace App\Entities\Product\UseCase;

use Illuminate\Database\Eloquent\Model;

class Translation extends Model
{
    public $timestamps = false;
    public $table = 'product_case_translations';
    protected $fillable = ['title'];
}