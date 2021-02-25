<?php

namespace App\Entities\Product\UseCase;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Builder;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

/**
 *  @method static Builder active()
 */
class UseCase extends Model implements TranslatableContract, HasMedia
{
    use Translatable, InteractsWithMedia;

    public $table = 'product_cases';
    public $translationModel = Translation::class;
    public $translatedAttributes = ['title'];
    public $with = ['translations'];
    protected $fillable = ['status'];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('cover')->singleFile();
    }

    public function getCover(): ?Media
    {
        return $this->getFirstMedia('cover');
    }

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('status', true);
    }
}