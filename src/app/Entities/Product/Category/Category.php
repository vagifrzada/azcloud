<?php

namespace App\Entities\Product\Category;

use App\Entities\Product\Product;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int id
 * @property string slug
 * @property boolean status
 * @property string title
 * @property string description
 *
 * @method static Category findOrFail(int $id)
 * @method static Builder active()
 */
class Category extends Model implements TranslatableContract
{
    use Translatable;

    public $table = 'product_category';
    public $translationModel = Translation::class;
    public $translatedAttributes = ['title', 'description'];
    public $with = ['translations'];
    protected $fillable = ['status', 'slug'];

    public function getId(): int
    {
        return $this->id;
    }

    public function getSlug(): string
    {
        return $this->slug;
    }

    public function isActive(): bool
    {
        return $this->status;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('status', true);
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}