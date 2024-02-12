<?php


namespace App\Repositories;


use App\Models\Rider;
use Illuminate\Support\Facades\DB;

class RiderRepository
{

    public function create($attributes)
    {
        return Rider::query()->create($attributes);
    }

    public function getRidersWithDistance($restaurant_lat, $restaurant_long)
    {
        return DB::select(DB::raw("SELECT id, service_name, lat, longitude, capture_name, SQRT(
                POW(69.1 * (lat - :startLat), 2) +
                POW(69.1 * (:startLong - longitude) * COS(lat / 57.3), 2)) AS distance, timestamp
                FROM riders HAVING distance < 40 OR timestamp BETWEEN (DATE_SUB(NOW(),INTERVAL 5 MINUTE)) AND NOW() ORDER BY distance;"
        ), [
            'startLat' => $restaurant_lat,
            'startLong' => $restaurant_long
        ]);
    }

}
