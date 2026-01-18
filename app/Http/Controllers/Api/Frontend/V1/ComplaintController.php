<?php

namespace App\Http\Controllers\Api\Frontend\V1;

use App\Http\Controllers\Controller;
use App\Models\Complaint;
use App\Http\Requests\V1\ComplaintRequest;
use Illuminate\Http\Request;

class ComplaintController extends Controller
{
    public function store(ComplaintRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('complaints', 'public');
            $data['file'] = $path;
        }

        $complaint = Complaint::create($data);

        return response()->json([
            'message' => 'Complaint submitted successfully',
            'data' => $complaint,
            'tracking_number' => 'BNP-' . str_pad($complaint->id, 6, '0', STR_PAD_LEFT)
        ], 201);
    }
}
