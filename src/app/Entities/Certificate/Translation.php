<?php

namespace App\Entities\Certificate;

use Illuminate\Database\Eloquent\Model;

class Translation extends Model
{
    public $timestamps = false;
    public $table = 'certificate_translations';
    protected $fillable = ['title',  'content'];
}