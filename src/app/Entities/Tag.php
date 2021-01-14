<?php

namespace App\Entities;

use App\Entities\Post\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property int id
 * @property string slug
 * @property string name
 *
 * @method static Tag firstOrCreate(array $condition)
 */
class Tag extends Model
{
    public $timestamps = false;
    protected $fillable = ['name', 'slug'];

    public function getId(): int
    {
        return $this->id;
    }

    public function getSlug(): string
    {
        return $this->slug;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function posts(): BelongsToMany
    {
        return $this->belongsToMany(Post::class);
    }
}