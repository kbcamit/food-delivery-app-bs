<?php


namespace App\Services\Interfaces;


interface RiderService
{
    public function create($attributes);

    public function getRiders($restaurant_id);
}