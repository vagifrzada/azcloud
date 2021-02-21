<?php

namespace App\Entities\Product;

use Spatie\MediaLibrary\HasMedia;
use App\Entities\Product\Bundle\Bundle;
use Illuminate\Database\Eloquent\Model;
use App\Entities\Product\Benefit\Benefit;
use Astrotomic\Translatable\Translatable;
use App\Entities\Product\Category\Category;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

/**
 *
 * @property int id
 * @property string title
 * @property string slug
 * @property boolean status
 * @property Category category
 */
class Product extends Model implements TranslatableContract, HasMedia
{
    use Translatable, InteractsWithMedia;

    public $table = 'products';
    public $translationModel = Translation::class;
    public $translatedAttributes = ['description', 'use_cases', 'main_features', 'additional_features'];
    public $with = ['translations'];
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

    public function bundles(): BelongsToMany
    {
        return $this->belongsToMany(Bundle::class);
    }

    public function benefits(): BelongsToMany
    {
        return $this->belongsToMany(Benefit::class);
    }
}