<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

/**
 * @property string key
 * @property string value
 * @property int id
 */
class Setting extends Model
{
    public $timestamps = false;
    protected $table = 'settings';

    protected $fillable = [
        'key', 'value',
    ];

    public function getKey(): string
    {
        return $this->key;
    }

    public function setKey(string $key): self
    {
        $this->key = $key;

        return $this;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function setValue(string $value): self
    {
        $this->value = $value;

        return $this;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public static function boot()
    {
        parent::boot();

        static::saved(function () {
            if (Cache::has('settings'))
                Cache::forget('settings');
        });
    }
}