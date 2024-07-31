<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentRequest;
use App\Http\Resources\PaymentResource;
use App\Models\PaymentRecord;
use App\Models\ServiceRequest;
use App\Models\User;
use Illuminate\Http\Request;

class PaymentRecordController extends Controller
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
    public function store(PaymentRequest $request)
    {
        // Valida los datos del pedido
        $validatedData = $request->validated();
    
        // Crea un nuevo registro de pago con la información validada
        $payment = PaymentRecord::create($validatedData);
    
        // Desactiva el producto (borrado lógico) después del pago
        if (isset($validatedData['product_id'])) {
            $serviceRequest = ServiceRequest::find($validatedData['product_id']);
            if ($serviceRequest) {
                $serviceRequest->update(['state' => 'paid']); // O el estado que definas para indicar que el producto ha sido pagado
            }
        }
    
        // Devuelve una respuesta indicando que el registro se ha creado correctamente
        return new PaymentResource([
            'success' => true,
            'message' => 'Pago registrado correctamente',
            'data' => $payment
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
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
