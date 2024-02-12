<?php


namespace App\Repositories;


use App\Models\Restaurant;

class RestaurantRepository
{
    public function create($attributes)
    {
        return Restaurant::query()->create($attributes);
    }

    public function getRestaurantById($id)
    {
        return Restaurant::query()->where(['id' => $id])->get()->first();
    }
}