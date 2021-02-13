<?php

namespace App\Entities\Page;

use Illuminate\Database\Eloquent\Model;

class Translation extends Model
{
    public $timestamps = false;
    public $table = 'page_translations';
    protected $fillable = ['title', 'description', 'content'];
}