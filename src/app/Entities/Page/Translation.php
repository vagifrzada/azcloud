<?php

namespace App\Entities\Page;

use Illuminate\Database\Eloquent\Model;

class Translation extends Model
{
    public $timestamps = false;
    public $table = 'page_translations';
    protected $fillable = ['title', 'description', 'content', 'meta'];

    public function getMeta(string $key): ?string
    {
        $meta = json_decode($this->meta, true);
        return $meta[$key] ?? null;
    }
}