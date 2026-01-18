<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\V1\ServeRequest;
use App\Http\Resources\V1\ServeResource;
use App\Models\Serve;

class ServeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $serve = Serve::query()->orderBy('created_at', 'desc')->get();
        return ServeResource::collection($serve);
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
    public function store(ServeRequest $request)
    {
        $data = $request->validated();
        $serve = Serve::query()->create($data);
        return ServeResource::make($serve);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $serve = Serve::query()->findOrFail($id);
        return ServeResource::make($serve);
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
    public function update(ServeRequest $request, string $id)
    {
        $data = $request->validated();
        $serve = Serve::query()->findOrFail($id);
        $serve->update($data);
        return ServeResource::make($serve);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $serve = Serve::query()->findOrFail($id);
        $serve->delete();
        return ServeResource::make($serve);
    }

    public function inActiveStatus($id)
    {
        Serve::where('id', $id)->update(['status' => '0']);
        $heroSection = Serve::find($id); 
        return ServeResource::make($heroSection);
    }

    public function activeStatus($id)
    {
        Serve::where('id', $id)->update(['status' => '1']);
        $heroSection = Serve::find($id); 

        return ServeResource::make($heroSection);
    }
}
