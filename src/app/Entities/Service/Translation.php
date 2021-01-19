<?php

namespace App\Entities\Service;

use Illuminate\Database\Eloquent\Model;

class Translation extends Model
{
    public $timestamps = false;
    public $table = 'service_translations';
    protected $fillable = ['title', 'slug', 'subtitle', 'content'];
}