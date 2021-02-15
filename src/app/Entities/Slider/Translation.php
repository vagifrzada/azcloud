<?php

namespace App\Entities\Slider;

use Illuminate\Database\Eloquent\Model;

class Translation extends Model
{
    public $timestamps = false;
    public $table = 'slider_translations';
    protected $fillable = ['title', 'description'];
}