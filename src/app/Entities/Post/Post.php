<?php

namespace App\Entities\Post;

use Carbon\Carbon;
use App\Entities\Tag;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Image\Exceptions\InvalidManipulation;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

/**
 * @property int id
 * @property int author_id
 * @property bool status
 * @property Carbon created_at
 * @property Carbon updated_at
 *
 * @method static findOrFail(int $id)
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
        $this->addMediaConversion('thumb')
            ->nonQueued()
            ->width(427)
            ->height(427);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }
}