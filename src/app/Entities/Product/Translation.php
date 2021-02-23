<?php

namespace App\Entities\Product;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string meta
 */
class Translation extends Model
{
    public $timestamps = false;
    protected $table = 'product_translations';

    public function getMeta(string $attribute): ?string
    {
        $decodedMeta = json_decode($this->meta, true);
        return $decodedMeta[$attribute] ?? null;
    }
}