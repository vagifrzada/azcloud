<?php

namespace App\Entities\Product\Benefit;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Builder;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

/**
 * @property int id
 * @property boolean status
 * @property string title
 * @property string description
 *
 * @method static Benefit findOrFail(int $id)
 * @method static Builder active()
 */
class Benefit extends Model implements TranslatableContract, HasMedia
{
    use Translatable, InteractsWithMedia;

    public $table = 'product_benefits';
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