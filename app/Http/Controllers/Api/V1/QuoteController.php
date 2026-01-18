<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\V1\QuoteRequest;
use App\Http\Resources\V1\QuoteResource;
use App\Models\Quote;
use Illuminate\Support\Facades\File;

class QuoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $quote = Quote::query()->orderBy('created_at', 'desc')->get();
        return QuoteResource::collection($quote);
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
    public function store(QuoteRequest $request)
    {
        $data = $request->validated();
        if ($request->hasFile('image')) {
            $data['image'] = '/storage/' . $request->file('image')->store('uploads', 'public');
        }
        $quote = Quote::query()->create($data);
        return QuoteResource::make($quote);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $quote = Quote::query()->findOrFail($id);
        return QuoteResource::make($quote);
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
    public function update(QuoteRequest $request, string $id)
    {
        $data = $request->validated();
        $quote = Quote::query()->findOrFail($id);
        if ($request->hasFile('image')) {
            $data['image'] = '/storage/' . $request->file('image')->store('uploads', 'public');
        }
        $quote->update($data);
        return QuoteResource::make($quote);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $quote = Quote::query()->findOrFail($id);
        if ($quote->image) {
            if (File::exists(public_path($quote->image))) {
                File::delete(public_path($quote->image));
            }
        }
        $quote->delete();
        return QuoteResource::make($quote);
    }
    public function inActiveStatus($id)
    {
        Quote::where('id', $id)->update(['status' => '0']);
        $heroSection = Quote::find($id);
        return QuoteResource::make($heroSection);
    }

    public function activeStatus($id)
    {
        Quote::where('status', '1')->update(['status' => '0']);
        Quote::where('id', $id)->update(['status' => '1']);
        $heroSection = Quote::find($id);

        return QuoteResource::make($heroSection);
    }
}
