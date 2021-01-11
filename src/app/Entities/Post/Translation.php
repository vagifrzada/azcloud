<?php

namespace App\Entities\Post;

use Illuminate\Database\Eloquent\Model;

class Translation extends Model
{
    public $timestamps = false;
    public $table = 'post_translations';
    protected $fillable = ['title', 'slug', 'content'];
}