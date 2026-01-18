<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\V1\CounterRequest;
use App\Http\Resources\V1\CounterResource;
use App\Models\Counter;
use Illuminate\Support\Str;

class CounterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $counter = Counter::latest()->paginate(10);
        return CounterResource::collection($counter);
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
    public function store(CounterRequest $request)
    {
        $data = $request->validated();
        $counter = Counter::query()->create($data);
        return CounterResource::make($counter);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $counter = Counter::query()->findOrFail($id);
        return CounterResource::make($counter);
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
    public function update(CounterRequest $request, string $id)
    {
        $data = $request->validated();
        $counter = Counter::query()->findOrFail($id);
        $counter->update($data);
        return CounterResource::make($counter);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $counter = Counter::query()->findOrFail($id);
        $counter->delete();
        return CounterResource::make($counter);
    }

    public function inActiveStatus($id)
    {
        Counter::where('id', $id)->update(['status' => '0']);
        $heroSection = Counter::find($id); // Retrieve the updated model
        return CounterResource::make($heroSection);
    }

    public function activeStatus($id)
    {
        Counter::where('id', $id)->update(['status' => '1']);
        $heroSection = Counter::find($id); // Retrieve the updated model

        return CounterResource::make($heroSection);
    }
}
