<?php
namespace App\Repos;

class denseRank
{
    public static function students($positions)
    {
        $positions = $positions->sortByDesc('tmark')//->sortByDesc('tpoints')
            ->values()
            ->map(function ($value, $key) {
                $value->rank = $key + 1;
                return $value;
            })
            ->groupBy('tmark')
            //->groupBy('tpoints')
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
