<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    protected $employeeTypes = [
        'Personal de limpieza' => 'Personal de Limpieza',
        'Cajero(a) Recepcionista' => 'Cajero(a) Recepcionista',
        'supervisor' => 'Supervisor de Servicios',
        'Administrador' => 'Administrador(a) General',
        'Gerente' => 'Gerente Propietario',
    ];

    public function index()
    {
        $employees = Employee::all(); 
        return view('employees.index', compact('employees')); 
    }

    public function create()
    {
        return view('employees.create', ['employeeTypes' => $this->employeeTypes]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            // Agrega aquí las reglas de validación para 'phone' y 'address' si son obligatorios
        ]);

        Employee::create($request->all());

        return redirect()->route('employees.index')->with('success', 'Empleado creado con éxito.');
    }

    public function edit(Employee $employee) 
    {
        //return view('employees.edit', compact('employee'));
        return view('employees.edit', ['employeeTypes' => $this->employeeTypes, 'employee' => $employee]); 
    }

    public function update(Request $request, Employee $employee) 
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            // ... Reglas de validación ... 
        ]);

        $employee->update($request->all()); 

        return redirect()->route('employees.index')->with('success', 'Empleado actualizado con éxito.');
    }

    public function destroy(Employee $employee) 
    {
        $employee->delete();
        return redirect()->route('employees.index')->with('success', 'Empleado eliminado con éxito.');
    }

}
