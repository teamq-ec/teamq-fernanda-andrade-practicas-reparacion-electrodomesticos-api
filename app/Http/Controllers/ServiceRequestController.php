<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceRequestRequest;
use App\Http\Resources\ServiceRequestResource;
use App\Models\ServiceRequest;
use Illuminate\Http\Request;

class ServiceRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ServiceRequestRequest $request)
    {
        $product = ServiceRequest::create($request->validated());
        $product->addMediaFromRequest('damaged_appliance_image')
            ->usingName($product->appliance_type)
            ->toMediaCollection();
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $serviceRequest = ServiceRequest::with('user')->findOrFail($id);
        return new ServiceRequestResource($serviceRequest);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
