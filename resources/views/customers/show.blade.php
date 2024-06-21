@extends('layouts.app')

@section('content')
    <h1>Detalles del Cliente</h1>

    <p><strong>Nombre:</strong> {{ $customer->name }}</p>
    <p><strong>Teléfono:</strong> {{ $customer->phone }}</p>
    <p><strong>Dirección:</strong> {{ $customer->address }}</p>
    <p><strong>Email:</strong> {{ $customer->email }}</p>

    <a href="{{ route('customers.index') }}" class="btn btn-secondary">Volver al Listado</a>
@endsection