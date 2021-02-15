<?php

namespace App\Entities\Slider;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Slider extends Model implements TranslatableContract, HasMedia
{
    use Translatable, InteractsWithMedia;

    public $table = 'slider';
    public $translationModel = Translation::class;
    public $translatedAttributes = ['title', 'description'];
    public $with = ['media', 'translations'];
    protected $fillable = ['status', 'buy_link', 'prices_link', 'order'];
    public $timestamps = false;

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('cover')
            ->singleFile();
    }

    public function getCover(): ?Media
    {
        return $this->getFirstMedia('cover');
    }
}