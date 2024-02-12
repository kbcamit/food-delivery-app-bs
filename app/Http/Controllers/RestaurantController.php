<?php

namespace App\Http\Controllers;

use App\Services\Interfaces\RestaurantService;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    private RestaurantService $restaurantService;

    public function __construct(RestaurantService $restaurantService)
    {
        $this->restaurantService = $restaurantService;
    }

    public function create(Request $request)
    {
        $restaurant = $this->restaurantService->create($request->all());

        if ($restaurant) {
            return response()->json([
                'message' => 'Restaurant created successfully'
            ], 201);
        }

        return response()->json([
            'message' => 'Restaurant create failed'
        ], 400);
    }
}
