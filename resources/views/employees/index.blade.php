@extends('layouts.app') 

@section('content')
    <h1>Empleados</h1>

    <a href="{{ route('employees.create') }}" class="btn btn-primary mb-3">Nuevo Empleado</a>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Tipo</th>
                <th>Teléfono</th>
                <th>Dirección</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employees as $employee)
                <tr>
                    <td>{{ $employee->id }}</td>
                    <td>{{ $employee->name }}</td>
                    <td>{{ $employee->type }}</td>
                    <td>{{ $employee->phone }}</td> 
                    <td>{{ $employee->address }}</td> 
                    <td>
                        <a href="{{ route('employees.edit', $employee) }}" class="btn btn-sm btn-primary">Editar</a>
                        <form action="{{ route('employees.destroy', $employee) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de que quieres eliminar este empleado?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection