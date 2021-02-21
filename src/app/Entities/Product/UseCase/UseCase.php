<?php

namespace App\Entities\Product\UseCase;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

/**
 *  @method static Builder active()
 */
class UseCase extends Model implements TranslatableContract
{
    use Translatable;

    public $table = 'product_cases';
    public $translationModel = Translation::class;
    public $translatedAttributes = ['title'];
    public $with = ['translations'];
    protected $fillable = ['status'];

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('status', true);
    }
}