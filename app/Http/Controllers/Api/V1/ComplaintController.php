<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Complaint;
use App\Http\Resources\V1\ComplaintResource;
use Illuminate\Support\Facades\Storage;

class ComplaintController extends Controller
{
    public function index()
    {
        $complaints = Complaint::orderBy('id', 'desc')->get();
        return ComplaintResource::collection($complaints);
    }

    public function show(Complaint $complaint)
    {
        return new ComplaintResource($complaint);
    }

    public function destroy(Complaint $complaint)
    {
        if ($complaint->file) {
            Storage::delete('public/' . $complaint->file);
        }
        $complaint->delete();
        return response()->json(['message' => 'Complaint deleted successfully']);
    }

    public function download($id)
    {
        $complaint = Complaint::findOrFail($id);
        if (!$complaint->file) {
            return response()->json(['message' => 'No file attached'], 404);
        }
        $filePath = public_path('storage/' . $complaint->file);
        if (!file_exists($filePath)) {
            return response()->json(['message' => 'File not found'], 404);
        }
        return response()->download($filePath);
    }
}
