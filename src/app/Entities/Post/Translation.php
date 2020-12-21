<?php

namespace App\Entities\Post;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int post_id
 * @property string locale
 * @property string title
 * @property string slug
 * @property string content
 */
class Translation extends Model
{
    protected $fillable = ['title', 'slug', 'content'];

    public function usesTimestamps(): bool
    {
        return false;
    }

    public function getPostId(): int
    {
        return $this->post_id;
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
}