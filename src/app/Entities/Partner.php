<?php

namespace App\Entities;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Partner extends Model implements HasMedia
{
    use InteractsWithMedia;

    public $timestamps = false;
    public $table = 'partners';
    public $with = ['media'];
    protected $fillable = ['title', 'status'];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('cover')
            ->singleFile();
    }

    public function getCover(): ?Media
    {
        return $this->getFirstMedia('cover');
    }
}