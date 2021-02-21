<?php

namespace App\Entities\Product\Bundle;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string options
 */
class Translation extends Model
{
    public $timestamps = false;
    public $table = 'product_bundle_translations';
    protected $fillable = ['title', 'description', 'options'];

    public function getOptions(): array
    {
        return json_decode($this->options, true);
    }
}