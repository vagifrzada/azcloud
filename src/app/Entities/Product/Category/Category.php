<?php

namespace App\Entities\Product\Category;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

class Category extends Model implements TranslatableContract
{
    use Translatable;

    public $table = 'product_category';
    public $translationModel = Translation::class;
    public $translatedAttributes = ['title', 'description'];
    public $with = ['translations'];
    protected $fillable = ['status', 'slug'];
}