<?php

namespace App\Entities\DataCenter;

use Illuminate\Database\Eloquent\Model;

class Translation  extends Model
{
    public $timestamps = false;
    public $table = 'data_center_translations';
    protected $fillable = ['title', 'description', 'content'];
}