<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\V1\VisionRequest;
use App\Http\Resources\V1\VisionResource;
use App\Models\Vision;
use Illuminate\Support\Facades\File;

class VisionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vision = Vision::query()->orderBy('created_at', 'desc')->get();
        return VisionResource::collection($vision);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VisionRequest $request)
    {
        $data = $request->validated();
        if ($request->hasFile('image')) {
            $data['image'] = '/storage/' . $request->file('image')->store('uploads', 'public');
        }
        $vision = Vision::query()->create($data);
        return VisionResource::make($vision);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $vision = Vision::query()->findOrFail($id);
        return VisionResource::make($vision);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VisionRequest $request, string $id)
    {
        $data = $request->validated();
        $vision = Vision::query()->findOrFail($id);
        if ($request->hasFile('image')) {
            $data['image'] = '/storage/' . $request->file('image')->store('uploads', 'public');
        }
        $vision->update($data);
        return VisionResource::make($vision);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $vision = Vision::query()->findOrFail($id);
        if ($vision->image) {
            if (File::exists(public_path($vision->image))) {
                File::delete(public_path($vision->image));
            }
        }
        $vision->delete();
        return VisionResource::make($vision);
    }
    public function inActiveStatus($id)
    {
        Vision::where('id', $id)->update(['status' => '0']);
        $heroSection = Vision::find($id);
        return VisionResource::make($heroSection);
    }

    public function activeStatus($id)
    {
        Vision::where('id', $id)->update(['status' => '1']);
        $heroSection = Vision::find($id);

        return VisionResource::make($heroSection);
    }
}
