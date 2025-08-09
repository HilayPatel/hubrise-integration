<?php

namespace App\Http\Controllers;

use App\Services\HubRiseService;
use Illuminate\Http\Request;

class HubRiseController extends Controller
{
    public function index(HubRiseService $hubRise)
    {
        $products = $hubRise->getProducts();
        return response()->json($products);
    }
}
