<?php

namespace App\Entities\Menu;

use Illuminate\Database\Eloquent\Model;

class Translation extends Model
{
    public $timestamps = false;
    public $table = 'menu_translations';
    protected $fillable = ['title'];
}