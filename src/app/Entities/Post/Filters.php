<?php

namespace App\Entities\Post;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Builder;

trait Filters
{
    public function scopeApplyFilters(Builder $query, array $filters = []): Builder
    {
        foreach ($filters as $filter => $value) {
            $scope = Str::camel($filter);
            $method = 'scope' . ucfirst($scope);
            if (!method_exists($this, $method)) continue;
            $query->{$scope}($value);
        }

        return $query;
    }

    public function scopeBeforeTimestamp(Builder $query, string $timestamp): Builder
    {
        return $query->where('created_at', '<', $timestamp);
    }

    public function scopeSortBy(Builder $query, array $sort): Builder
    {
        foreach ($sort as $column => $direction)
            $query->orderBy($column, $direction);
        return $query;
    }

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('status', true);
    }

    public function scopeExclude(Builder $query, int $id): Builder
    {
        return $query->where('id', '<>', $id);
    }

    public function scopeRandom(Builder $query): Builder
    {
        return $query->inRandomOrder();
    }
}