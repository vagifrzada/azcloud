<?php

namespace App\Entities\Post;

use Carbon\Carbon;
use App\Entities\Tag;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Collection;
use Spatie\Image\Exceptions\InvalidManipulation;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection;

/**
 * @property int id
 * @property int author_id
 * @property bool status
 * @property string locale
 * @property string title
 * @property string slug
 * @property string content
 *
 * @property Carbon created_at
 * @property Carbon updated_at
 *
 * @property Collection tags
 *
 * @method static findOrFail(int $id)
 * @method static applyFilters(array $filters = [])
 * @method static whereTranslation(string $string, string $e, string $locale)
 */
class Post extends Model implements TranslatableContract, HasMedia
{
    use Translatable, Filters, InteractsWithMedia;

    public const MEDIA_COVER = 'cover';
    public const MEDIA_GALLERY = 'gallery';

    public $table = 'posts';
    public $translationModel = Translation::class;
    public $translatedAttributes = ['title', 'slug', 'content'];
    public $with = ['media', 'translations'];
    protected $fillable = ['author_id', 'status'];

    public function getId(): int
    {
        return $this->id;
    }

    public function getAuthorId(): int
    {
        return $this->author_id;
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

    public function getSlug(): string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

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

    public function setAuthorId(int $authorId): self
    {
        $this->author_id = $authorId;

        return $this;
    }

    public function isActive(): bool
    {
        return $this->status;
    }

    public function setStatus(bool $status): Post
    {
        $this->status = $status;

        return $this;
    }

    public function getCreatedAt(): Carbon
    {
        return $this->created_at;
    }

    public function getUpdatedAt(): Carbon
    {
        return $this->updated_at;
    }

    public function getCover(): ?Media
    {
        return $this->getFirstMedia('cover');
    }

    public function getGallery(): MediaCollection
    {
        return $this->getMedia('gallery');
    }

    public function getTags(): Collection
    {
        return $this->tags;
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('cover')
            ->singleFile();
    }

    /**
     * @param Media|null $media
     * @throws InvalidManipulation
     */
    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('gallery-thumb')
            ->nonQueued()
            ->width(500)
            ->height(300)
            ->performOnCollections('gallery');
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }
}