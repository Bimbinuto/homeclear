@extends('layouts.app')

@section('content')
    <h1>Detalles del Servicio</h1>

    <p><strong>Nombre:</strong> {{ $service->name }}</p>
    <p><strong>Descripción:</strong> {{ $service->description }}</p>
    <p><strong>Precio:</strong> {{ $service->price }}</p>

    <a href="{{ route('services.index') }}" class="btn btn-secondary">Volver al listado</a> 
@endsection