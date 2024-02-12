<?php


namespace App\Services;


use App\Repositories\RestaurantRepository;
use App\Services\Interfaces\RestaurantService;

class RestaurantServiceImpl implements RestaurantService
{
    private RestaurantRepository $restaurantRepository;

    public function __construct(RestaurantRepository $restaurantRepository)
    {
        $this->restaurantRepository = $restaurantRepository;
    }


    public function create($attributes)
    {
        $data = [
            'name' => $attributes['name'],
            'lat' => $attributes['lat'],
            'longitude' => $attributes['longitude']
        ];
        return $this->restaurantRepository->create($data);
    }
}