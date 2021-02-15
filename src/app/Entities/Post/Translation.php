<?php

namespace App\Entities\Post;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string slug
 * @property string meta
 */
class Translation extends Model
{
    public $timestamps = false;
    public $table = 'post_translations';
    protected $fillable = ['title', 'slug', 'content', 'meta'];

    public function getSlug(): string
    {
        return $this->slug;
    }

    public function getMeta(string $key): ?string
    {
        $meta = json_decode($this->meta, true);
        return $meta[$key] ?? null;
    }
}