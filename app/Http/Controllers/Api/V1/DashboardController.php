<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Service;
use App\Models\ServiceCategory;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function __invoke(Request $request)
    {
        $data = array();
        $data['totalServices'] = Service::count();
        $data['totalCustomer'] = User::count();
        $data['totalCategory'] = ServiceCategory::count();
        return response()->json([
            'data' => $data
        ]);
    }
}
