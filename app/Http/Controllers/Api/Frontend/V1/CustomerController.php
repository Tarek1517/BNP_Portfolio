<?php

namespace App\Http\Controllers\Api\Frontend\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\V1\CustomerShowResource;
use App\Http\Resources\V1\OrderListResource;
use App\Http\Resources\V1\customerMailResource;
use App\Models\User;
use App\Models\Order;
use App\Models\CustomerMail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\V1\CustomerMailRequest;
use Illuminate\Support\Facades\Mail;
use \App\Mail\CustomQuoteMail;


class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */



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
    public function store(CustomerMailRequest $request)
    {
        $data = $request->validated();
        $Maildatas = CustomerMail::query()->create($data);

        return customerMailResource::make($Maildatas);

    }

    public function storeQuote(CustomerMailRequest $request)
    {
        $mailData = $request->validated();
        $mailDatas = CustomerMail::query()->create($mailData);
        Mail::to('tarek.hasan041517@gmail.com')->send(new CustomQuoteMail($mailData));
        return customerMailResource::make($mailDatas);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $customer = User::query()
            ->where('id', $id)
            ->first();

        return new CustomerShowResource($customer);
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
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }



}
