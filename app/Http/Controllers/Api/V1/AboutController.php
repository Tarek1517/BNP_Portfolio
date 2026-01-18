<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;
use App\Http\Requests\V1\AboutRequest;
use App\Http\Resources\V1\AboutResource;
use Illuminate\Support\Facades\File;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $about = About::query()->orderBy('created_at', 'desc')->get();
        return AboutResource::collection($about);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AboutRequest $request)
    {
        $data = $request->validated();
        if ($request->hasFile('image')) {
            $data['image'] = '/storage/' . $request->file('image')->store('uploads', 'public');
        }
        $about = About::query()->create($data);
        return AboutResource::make($about);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $about = About::query()->findOrFail($id);
        return AboutResource::make($about);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AboutRequest $request, string $id)
    {
        $data = $request->validated();
        $about = About::query()->findOrFail($id);
        if ($request->hasFile('image')) {
            $data['image'] = '/storage/' . $request->file('image')->store('uploads', 'public');
        }
        $about->update($data);
        return AboutResource::make($about);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $about = About::query()->findOrFail($id);
        if ($about->image) {
            if (File::exists(public_path($about->image))) {
                File::delete(public_path($about->image));
            }
        }
        $about->delete();
        return AboutResource::make($about);
    }
    public function inActiveStatus($id)
    {
        About::where('id', $id)->update(['status' => 0]);
        $about = About::find($id);
        return AboutResource::make($about);
    }

    public function activeStatus($id)
    {
        About::where('status', 1)->update(['status' => 0]);
        About::where('id', $id)->update(['status' => 1]);
        $about = About::find($id);

        return AboutResource::make($about);
    }
}
