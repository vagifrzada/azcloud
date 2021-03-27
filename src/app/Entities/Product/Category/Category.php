<?php

namespace App\Entities\Product\Category;

use App\Entities\Product\Product;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

/**
 * @property int id
 * @property string slug
 * @property boolean status
 * @property string title
 * @property string|null description
 *
 * @method static Category findOrFail(int $id)
 * @method static Builder active()
 */
class Category extends Model implements TranslatableContract, HasMedia
{
    use Translatable, InteractsWithMedia;

    public const MEDIA_COVER = 'cover';

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function getCover(): ?Media
    {
        return $this->getFirstMedia(self::MEDIA_COVER);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection(self::MEDIA_COVER)->singleFile();
    }

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('status', true);
    }

    public function scopeParents(Builder $query): Builder
    {
        return $query->where('parent_id', 0);
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'category_id')->where('parent_id', 0);
    }
}