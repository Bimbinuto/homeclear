@extends('layouts.app')

@section('content')
    <h1>Listado de Solicitudes de Servicio</h1>

    <a href="{{ route('servicerequests.create') }}" class="btn btn-success mb-3">Registrar Nueva Solicitud</a>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif



    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Cliente</th>
                <th>Servicio</th>
                <th>Fecha y Hora</th>
                <th>Dirección</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($serviceRequests as $request)
                <tr>
                    <td>{{ $request->id }}</td>
                    <td>{{ $request->customer->name }}</td>
                    <td>{{ $request->service->name }}</td>
                    <td>{{ $request->date_time }}</td>
                    <td>{{ $request->address }}</td>
                    <td>{{ $request->status }}</td>
                    <td>
                        <a href="{{ route('servicerequests.show', $request) }}" class="btn btn-info">Ver</a>
                        <a href="{{ route('servicerequests.edit', $request) }}" class="btn btn-primary">Editar</a>
                        <!-- Agrega el botón para eliminar si lo deseas -->
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
