<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceRequestRequest;
use App\Models\ServiceRequest;
<<<<<<< Updated upstream
=======
use Illuminate\Contracts\Validation\Validator;
>>>>>>> Stashed changes
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
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ServiceRequestRequest $request)
    {
<<<<<<< Updated upstream
        $product = ServiceRequest::create($request->validated());
        $product->addMediaFromRequest('damaged_appliance_image')
            ->usingName($product->appliance_type)
            ->toMediaCollection();
=======
           // Obtener los datos validados
    $validatedData = $request->validated();

    // Guardar la imagen si se proporciona
    if ($request->hasFile('damaged_appliance_image')) {
        $imagePath = $request->file('damaged_appliance_image')->store('public/images');
        $validatedData['damaged_appliance_image'] = $imagePath;
>>>>>>> Stashed changes
    }

    // Crear el registro en la base de datos
    $serviceRequest = ServiceRequest::create($validatedData);

    // Retornar una respuesta
    return response()->json([
        'message' => 'Registro exitoso',
        'data' => $serviceRequest,
    ], 201);
    }
    
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
