<?php

namespace App\Entities\MenuItem;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Illuminate\Support\Facades\Cache;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

/**
 * @property int id
 * @property string url
 * @property string title
 * @property string subtitle
 * @property string description
 * @property int order
 * @property bool status
 *
 * @method static findOrFail(int $id)
 */
class MenuItem extends Model implements TranslatableContract, HasMedia
{
    use Translatable, InteractsWithMedia;

    public $table = 'menu_item';
    public $translationModel = Translation::class;
    public $translatedAttributes = ['title', 'subtitle', 'description'];
    public $with = ['translations'];
    protected $fillable = ['url', 'status', 'order'];

    public function getId(): int
    {
        return $this->id;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getSubtitle(): ?string
    {
        return $this->subtitle;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function getOrder(): int
    {
        return $this->order;
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('cover')->singleFile();
    }

    public function getCover(): ?Media
    {
        return $this->getFirstMedia('cover');
    }

    public function isActive(): bool
    {
        return $this->status;
    }

    public static function boot()
    {
        parent::boot();

        static::saved(function () {
            if (Cache::has('site_menu_items'))
                Cache::forget('site_menu_items');
        });

        static::deleted(function () {
            if (Cache::has('site_menu_items'))
                Cache::forget('site_menu_items');
        });
    }
}