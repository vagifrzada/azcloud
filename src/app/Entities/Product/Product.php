<?php

namespace App\Entities\Product;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use App\Entities\Product\Category\Translation;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

class Product extends Model
{
    public $table = 'products';
    //public $translationModel = Translation::class;
    //public $translatedAttributes = ['title', 'description'];
    //public $with = ['translations'];
    protected $fillable = ['category_id', 'title', 'slug', 'status'];
}