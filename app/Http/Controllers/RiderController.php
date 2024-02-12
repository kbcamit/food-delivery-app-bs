<?php

namespace App\Http\Controllers;

use App\Services\Interfaces\RiderService;
use Illuminate\Http\Request;

class RiderController extends Controller
{
    private RiderService $riderService;

    public function __construct(RiderService $riderService)
    {
        $this->riderService = $riderService;
    }

    public function create(Request $request)
    {
        $rider = $this->riderService->create($request->all());

        if ($rider) {
            return response()->json([
                'message' => 'Rider added successfully'
            ], 201);
        }

        return response()->json([
            'message' => 'Rider add failed'
        ], 400);
    }

    public function getRiders(Request $request, $restaurant_id)
    {
        return response()->json([
            'riders' => $this->riderService->getRiders($restaurant_id)
        ], 200);
    }
}
