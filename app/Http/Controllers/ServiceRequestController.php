<?php

namespace App\Http\Controllers;

use App\Models\ServiceRequest;
use App\Models\Customer;
use App\Models\Service;
use App\Models\Employee; // Asegúrate de importar el modelo
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Para consultas SQL

use Carbon\Carbon;

class ServiceRequestController extends Controller
{
    public function index()
    {
        $serviceRequests = ServiceRequest::all();
        return view('service_requests.index', compact('serviceRequests'));
    }

    public function create()
    {
        $customers = Customer::all(); 
        $services = Service::all(); 
        return view('service_requests.create', compact('customers', 'services'));
    }

    public function store(Request $request)
{
    // Convertir el formato de fecha y hora
    $request->merge(['date_time' => Carbon::parse($request->date_time)->format('Y-m-d H:i')]);

    $request->validate([
        'customer_id' => 'required|exists:customers,id',
        'service_id' => 'required|exists:services,id',
        'date_time' => 'required|date_format:Y-m-d H:i',
        'address' => 'required|string',
        'additional_information' => 'nullable|string',
    ]);

    $serviceRequest = ServiceRequest::create($request->all());

    // ... Lógica para asignar empleados (si necesitas que sea automático) ...

    return redirect()->route('servicerequests.index')->with('success', 'Solicitud de servicio creada con éxito.');
}

    public function show(ServiceRequest $serviceRequest)
    {
        return view('service_requests.show', compact('serviceRequest'));
    }

    public function edit(ServiceRequest $serviceRequest)
    {
        $customers = Customer::all();
        $services = Service::all();
        return view('service_requests.edit', compact('serviceRequest', 'customers', 'services')); 
    }

    public function update(Request $request, ServiceRequest $serviceRequest)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'service_id' => 'required|exists:services,id',
            'date_time' => 'required|date_format:Y-m-d H:i',
            'address' => 'required|string',
            'additional_information' => 'nullable|string',
            'status' => 'nullable|in:pending,assigned,in_progress,completed,cancelled',
        ]);

        $serviceRequest->update($request->all());

        // ... Lógica para actualizar la asignación de empleados, si es necesario ...

        return redirect()->route('service_requests.index')->with('success', 'Solicitud de servicio actualizada con éxito.');
    }

    public function destroy(ServiceRequest $serviceRequest)
    {
        $serviceRequest->delete();
        return redirect()->route('service_requests.index')->with('success', 'Solicitud de servicio eliminada con éxito.');
    }

    // ... Métodos adicionales para asignación, cancelación y facturación ...

}