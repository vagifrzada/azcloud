<?php

namespace App\Entities\Page;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Spatie\MediaLibrary\InteractsWithMedia;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection;

/**
 * @property int id
 * @property string identity
 * @property bool status
 * @property string locale
 * @property string title
 * @property string description
 * @property string content
 *
 * @method static findOrFail(int $id)
 */
class Page extends Model implements TranslatableContract, HasMedia
{
    use Translatable, InteractsWithMedia;

    public const MEDIA_GALLERY = 'gallery';

    public $table = 'pages';
    public $translationModel = Translation::class;
    public $translatedAttributes = ['title', 'description', 'content'];
    public $with = ['media', 'translations'];
    protected $fillable = ['identity', 'status', 'order'];
    public $timestamps = false;

    public function getId(): int
    {
        return $this->id;
    }

    public function getIdentity(): string
    {
        return $this->identity;
    }

    public function setIdentity(string $identity): self
    {
        $this->identity = $identity;

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

    public function getLocale(): string
    {
        return $this->locale;
    }

    public function setLocale(string $locale): self
    {
        $this->locale = $locale;

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(?string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getGallery(): MediaCollection
    {
        return $this->getMedia('gallery');
    }
}