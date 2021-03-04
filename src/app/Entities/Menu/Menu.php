<?php

namespace App\Entities\Menu;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Illuminate\Support\Facades\Cache;

/**
 * @property int id
 * @property string url
 * @property string title
 * @property int order
 * @property bool status
 *
 * @method static findOrFail(int $id)
 */
class Menu extends Model implements TranslatableContract
{
    use Translatable;

    public $table = 'menu';
    public $translationModel = Translation::class;
    public $translatedAttributes = ['title'];
    public $with = ['translations'];
    protected $fillable = ['url', 'status', 'order'];

    public function getId(): int
    {
        return $this->id;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getOrder(): int
    {
        return $this->order;
    }

    public function isActive(): bool
    {
        return $this->status;
    }

    public static function boot()
    {
        parent::boot();

        static::saved(function () {
            if (Cache::has('site_menu'))
                Cache::forget('site_menu');
        });

        static::deleted(function () {
            if (Cache::has('site_menu'))
                Cache::forget('site_menu');
        });
    }
}