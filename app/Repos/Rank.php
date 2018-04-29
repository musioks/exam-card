<?php

namespace App\Repos;

class Rank
{
    public static function students($positions)
    {
        $positions = $positions->sortByDesc('total')
            ->values()
            ->map(function ($value, $key) {
            $value->rank = $key + 1;

            return $value;
        })
        ->groupBy('total')
        ->flatMap(function ($collection) {
            $lowest = $collection->pluck('rank')->min();

            return $collection->map(function ($value) use ($lowest) {
                $value->rank = $lowest;

                return $value;
            });
        });

        return $positions;
    }
}