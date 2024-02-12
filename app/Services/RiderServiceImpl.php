<?php


namespace App\Services;


use App\Repositories\RestaurantRepository;
use App\Repositories\RiderRepository;
use App\Services\Interfaces\RiderService;

class RiderServiceImpl implements RiderService
{
    private RiderRepository $riderRepository;
    private RestaurantRepository $restaurantRepository;

    public function __construct(RiderRepository $riderRepository, RestaurantRepository $restaurantRepository)
    {
        $this->riderRepository = $riderRepository;
        $this->restaurantRepository = $restaurantRepository;
    }

    public function create($attributes)
    {
        $data = [
            'service_name' => $attributes['service_name'],
            'lat' => $attributes['lat'],
            'longitude' => $attributes['longitude'],
            'capture_name' => $attributes['capture_name']
        ];
        return $this->riderRepository->create($data);
    }

    public function getRiders($restaurant_id)
    {
        $restaurant = $this->restaurantRepository->getRestaurantById($restaurant_id);
        if ($restaurant) {
            return $this->riderRepository->getRidersWithDistance($restaurant->lat, $restaurant->longitude);
        }
        return [];
    }
}