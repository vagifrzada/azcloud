<?php

namespace App\Entities\MenuItem;

use Illuminate\Database\Eloquent\Model;

class Translation extends Model
{
    public $timestamps = false;
    public $table = 'menu_item_translations';
    protected $fillable = ['title', 'subtitle', 'description'];
}