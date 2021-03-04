<?php

namespace App\Entities\Product;

use Illuminate\Support\Facades\Cache;
use Spatie\MediaLibrary\HasMedia;
use App\Entities\Product\Bundle\Bundle;
use Illuminate\Database\Eloquent\Model;
use App\Entities\Product\Benefit\Benefit;
use Astrotomic\Translatable\Translatable;
use App\Entities\Product\UseCase\UseCase;
use App\Entities\Product\Feature\Feature;
use App\Entities\Product\Category\Category;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

/**
 *
 * @property int id
 * @property int parent_id
 * @property int category_id
 * @property string title
 * @property string subtitle
 * @property string description
 * @property string use_cases_description
 * @property string additional_features
 * @property string slug
 * @property boolean status
 * @property string meta
 * @property Category category
 * @property Flavor[] prices
 */
class Product extends Model implements TranslatableContract, HasMedia
{
    use Translatable, InteractsWithMedia;

    public const MEDIA_BENEFITS_COVER = 'benefits_cover';
    public const MEDIA_CASES_COVER = 'cases_cover';
    public const MEDIA_COVER = 'cover';

    public $table = 'products';
    public $translationModel = Translation::class;
    public $translatedAttributes = ['description', 'use_cases_description', 'additional_features', 'meta'];
    public $jsonableAttributes = ['additional_features', 'meta'];
    public $with = ['bundles', 'benefits', 'cases', 'features', 'translations', 'media'];
    protected $fillable = ['parent_id', 'category_id', 'title', 'slug', 'status'];

    public function getId(): int
    {
        return $this->id;
    }

    public function getParent(): int
    {
        return $this->parent_id;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function getUseCasesDescription(): ?string
    {
        return $this->use_cases_description;
    }

    public function getAdditionalFeatures(): array
    {
        return json_decode($this->additional_features, true);
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getMeta(): array
    {
        return ($this->meta !== null) ? json_decode($this->meta, true) : [];
    }

    public function getSubtitle(): ?string
    {
        return $this->subtitle;
    }

    public function getSlug(): string
    {
        return $this->slug;
    }

    public function isActive(): bool
    {
        return $this->status;
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection(self::MEDIA_BENEFITS_COVER)->singleFile();
        $this->addMediaCollection(self::MEDIA_CASES_COVER)->singleFile();
        $this->addMediaCollection(self::MEDIA_COVER)->singleFile();
    }

    public function getCover(): ?Media
    {
        return $this->getFirstMedia(self::MEDIA_COVER);
    }

    public function getBenefitsCover(): ?Media
    {
        return $this->getFirstMedia(self::MEDIA_BENEFITS_COVER);
    }

    public function getCasesCover(): ?Media
    {
        return $this->getFirstMedia(self::MEDIA_CASES_COVER);
    }

    public function getCategory(): Category
    {
        return $this->category;
    }

    public function prices(): HasMany
    {
        return $this->hasMany(Flavor::class)->orderBy('family', 'ASC');
    }

    public function category(): HasOne
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public function bundles(): BelongsToMany
    {
        return $this->belongsToMany(Bundle::class, 'bundle_product')->limit(3);
    }

    public function benefits(): BelongsToMany
    {
        return $this->belongsToMany(Benefit::class, 'benefit_product');
    }

    public function cases(): BelongsToMany
    {
        return $this->belongsToMany(UseCase::class, 'case_product',  'product_id', 'case_id');
    }

    public function features(): BelongsToMany
    {
        return $this->belongsToMany(Feature::class, 'feature_product');
    }

    public function children(): HasMany
    {
        return $this->hasMany(self::class, 'parent_id');
    }

    protected static function boot()
    {
        parent::boot();

        static::saved(function () {
            if (Cache::has('site_footer_products'))
                Cache::forget('site_footer_products');
        });

        static::deleted(function () {
            if (Cache::has('site_footer_products'))
                Cache::forget('site_footer_products');
        });
    }
}