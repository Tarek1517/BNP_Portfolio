<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\CustomerMail;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use App\Models\Complaint;


class DashboardController extends Controller
{
    public function __invoke(Request $request)
    {
        $data = array();
        $data['totalServices'] = Service::count();
        $data['todaysMail'] = CustomerMail::where('created_at', Carbon::today())->count();
        $data['todaysComplaint'] = Complaint::where('created_at', Carbon::today())->count();
        $data['totalComplaint'] = Complaint::count();
        $data['totalMail'] = CustomerMail::count();
        $data['totalCategory'] = ServiceCategory::count();
        return response()->json([
            'data' => $data
        ]);
    }
}
