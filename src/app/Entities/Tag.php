<?php

namespace App\Entities;

use App\Entities\Post\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property int $id
 * @property string $name
 *
 * @method static Tag firstOrCreate(array $condition)
 */
class Tag extends Model
{
    public $timestamps = false;
    protected $fillable = ['name'];

    public function getId(): int
    {
        return $this->id;
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