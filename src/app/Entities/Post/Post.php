<?php

namespace App\Entities\Post;

use Carbon\Carbon;
use App\Entities\Tag;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Spatie\MediaLibrary\InteractsWithMedia;
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
 * @method static findOrFail(int $id)
 * @method static whereTranslation(string $column, mixed $value, ?string $locale = null)
 */
class Post extends Model implements TranslatableContract, HasMedia
{
    use Translatable, InteractsWithMedia;

    public $table = 'posts';
    public $translationModel = Translation::class;
    public $translatedAttributes = ['title', 'slug', 'content'];
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

    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(string $content): self
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
        $this->addMediaConversion('cover')
            ->nonQueued()
            ->width(900)
            ->height(580);

        $this->addMediaConversion('thumb-108')
            ->nonQueued()
            ->width(108)
            ->height(108);

        $this->addMediaConversion('thumb-427')
            ->nonQueued()
            ->width(427)
            ->height(427);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }
}