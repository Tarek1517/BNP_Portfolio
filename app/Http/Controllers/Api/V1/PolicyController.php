<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\PolicyRequest;
use App\Http\Resources\V1\PolicyResource;
use App\Models\Policy;
use Illuminate\Http\Request;

class PolicyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $policies = Policy::query()->orderBy('order_number', 'asc')->get();
        return PolicyResource::collection($policies);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PolicyRequest $request)
    {
        $data = $request->validated();
        $policy = Policy::create($data);
        return PolicyResource::make($policy);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $policy = Policy::findOrFail($id);
        return PolicyResource::make($policy);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PolicyRequest $request, string $id)
    {
        $data = $request->validated();
        $policy = Policy::findOrFail($id);
        $policy->update($data);
        return PolicyResource::make($policy);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $policy = Policy::findOrFail($id);
        $policy->delete();
        return PolicyResource::make($policy);
    }

    public function inActiveStatus($id)
    {
        Policy::where('id', $id)->update(['status' => '0']);
        $policy = Policy::find($id);
        return PolicyResource::make($policy);
    }

    public function activeStatus($id)
    {
        Policy::where('id', $id)->update(['status' => '1']);
        $policy = Policy::find($id);
        return PolicyResource::make($policy);
    }
}
