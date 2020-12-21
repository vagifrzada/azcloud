<?php

namespace App\Entities\Post;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

/**
 * @property int id
 * @property int author_id
 * @property bool status
 * @property Carbon created_at
 * @property Carbon updated_at
 */
class Post extends Model implements TranslatableContract
{
    use Translatable;

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
}