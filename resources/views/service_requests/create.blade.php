@extends('layouts.app')

@section('content')
    <h1>Crear Nueva Solicitud de Servicio</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('servicerequests.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="customer_id">Cliente:</label>
            <select class="form-control" id="customer_id" name="customer_id" required>
                @foreach ($customers as $customer)
                    <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="service_id">Servicio:</label>
            <select class="form-control" id="service_id" name="service_id" required>
                @foreach ($services as $service)
                    <option value="{{ $service->id }}">{{ $service->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="date_time">Fecha y Hora:</label>
            <input type="datetime-local" class="form-control" id="date_time" name="date_time" required>
        </div>

        <div class="form-group">
            <label for="address">Dirección:</label>
            <input type="text" class="form-control" id="address" name="address" required>
        </div>
        <div class="form-group">
            <label for="additional_information">Información Adicional:</label>
            <textarea class="form-control" id="additional_information" name="additional_information" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Crear Solicitud</button>
    </form>
@endsection
