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
        // Encuentra la solicitud de servicio con su usuario asociado, o lanza una excepción si no existe.
        $serviceRequest = ServiceRequest::with('user')->findOrFail($id);
        
        // Obtiene todas las solicitudes de servicio que están en estado 'pending'.
        $pendingRequests = ServiceRequest::where('state', 'pending')->get();
        
        // Crea un recurso de la solicitud de servicio actual.
        $serviceRequestResource = new ServiceRequestResource($serviceRequest);
        
        // Crea una colección de recursos para las solicitudes de servicio pendientes.
        $pendingRequestsResource = ServiceRequestResource::collection($pendingRequests);
        
        // Devuelve ambas colecciones de recursos en la respuesta.
        return response()->json([
            'current_request' => $serviceRequestResource,
            'pending_requests' => $pendingRequestsResource
        ]);
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
