<?php

namespace App\Entities\Certificate;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

/**
 * @property int id
 * @property bool status
 * @property string locale
 * @property string title
 * @property string content
 *
 * @method static findOrFail(int $id)
 */
class Certificate extends Model  implements TranslatableContract, HasMedia
{
    use Translatable, InteractsWithMedia;

    public const MEDIA_COVER = 'cover';
    public const MEDIA_PDF = 'pdf';

    public $table = 'certificates';
    public $translationModel = Translation::class;
    public $translatedAttributes = ['title',  'content'];
    protected $fillable = ['status'];

    public function getId(): int
    {
        return $this->id;
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

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): Certificate
    {
        $this->title = $title;
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

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection(self::MEDIA_COVER)
            ->singleFile();

        $this->addMediaCollection(self::MEDIA_PDF)
            ->singleFile();
    }

    public function getCover(): ?Media
    {
        return $this->getFirstMedia(self::MEDIA_COVER);
    }

    public function getPdf(): ?Media
    {
        return $this->getFirstMedia(self::MEDIA_PDF);
    }
}