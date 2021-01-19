<?php

namespace App\Entities\Service;

use Carbon\Carbon;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Spatie\MediaLibrary\InteractsWithMedia;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

/**
 * @property int id
 * @property int price
 * @property boolean status
 * @property string slug
 * @property string title
 * @property string subtitle
 * @property string content
 * @property string locale
 * @property Carbon created_at
 * @property Carbon updated_at
 *
 */
class Service extends Model implements TranslatableContract, HasMedia
{
    use Translatable, InteractsWithMedia;

    public const MEDIA_COVER = 'cover';

    public $table = 'services';
    public $translationModel = Translation::class;
    public $translatedAttributes = ['slug', 'title', 'subtitle', 'content'];
    public $with = ['media', 'translations'];
    protected $fillable = ['status', 'price'];

    public function getId(): int
    {
        return $this->id;
    }

    public function getPrice(): float
    {
        return $this->price / 100;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price * 100;

        return $this;
    }

    public function isActive(): bool
    {
        return $this->status;
    }

    public function setStatus(bool $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getSlug(): string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getSubtitle(): string
    {
        return $this->subtitle;
    }

    public function setSubtitle(string $subtitle): self
    {
        $this->subtitle = $subtitle;

        return $this;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getLocale(): string
    {
        return $this->locale;
    }

    public function getCreatedAt(): Carbon
    {
        return $this->created_at;
    }

    public function getCover(): ?Media
    {
        return $this->getFirstMedia(self::MEDIA_COVER);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection(self::MEDIA_COVER)
            ->singleFile();
    }
}