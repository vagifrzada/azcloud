<?php

namespace App\Entities\Product;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use App\Entities\Product\Category\Category;
use App\Entities\Product\Category\Translation;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

/**
 *
 * @property int id
 * @property string title
 * @property string slug
 * @property boolean status
 * @property Category category
 */
class Product extends Model
{
    public $table = 'products';
    //public $translationModel = Translation::class;
    //public $translatedAttributes = ['title', 'description'];
    //public $with = ['translations'];
    protected $fillable = ['category_id', 'title', 'slug', 'status'];

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getSlug(): string
    {
        return $this->slug;
    }

    public function isActive(): bool
    {
        return $this->status;
    }

    public function getCategory(): Category
    {
        return $this->category;
    }

    public function category(): HasOne
    {
        return $this->hasOne(Category::class, 'id');
    }
}