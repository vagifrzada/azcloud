<?php

namespace App\Entities\Product\Bundle;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Builder;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

/**
 * @property int id
 * @property int $price
 * @property boolean status
 * @property string title
 * @property string description
 * @property string options
 *
 * @method static Bundle findOrFail(int $id)
 * @method static Builder active()
 */
class Bundle extends Model implements TranslatableContract
{
    use Translatable;

    public $table = 'product_bundles';
    public $translationModel = Translation::class;
    public $translatedAttributes = ['title', 'description', 'options'];
    public $with = ['translations'];
    protected $fillable = ['price', 'status'];

    public function getPrice(): float
    {
        return ($this->price / 100);
    }

    public function scopeForCompute(Builder $query): Builder
    {
        return $query->where('price', '=', 0)->orWhereNull('price');
    }

    public function scopeForNetwork(Builder $query): Builder
    {
        return $query->where('price', '<>', 0);
    }

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('status', true);
    }
}