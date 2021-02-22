<?php

namespace App\Entities\Product\Feature;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

/**
 * @method static Builder active()
 */
class Feature extends Model implements TranslatableContract, HasMedia
{
    use Translatable, InteractsWithMedia;

    public $table = 'product_features';
    public $translationModel = Translation::class;
    public $translatedAttributes = ['title', 'description'];
    public $with = ['translations'];
    protected $fillable = ['status'];

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('status', true);
    }

    public function getCover(): ?Media
    {
        return $this->getFirstMedia('cover');
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('cover')->singleFile();
    }
}