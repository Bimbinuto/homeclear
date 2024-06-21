@extends('layouts.app')

@section('content')
    <h1>Editar Empleado</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('employees.update', $employee) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Nombre:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $employee->name) }}" required>
        </div>
        <div class="form-group">
            <label for="type">Tipo:</label>
            <select class="form-control" id="type" name="type"> 
                @foreach ($employeeTypes as $key => $value)
                    <option value="{{ $key }}" {{ old('type', $employee->type) == $key ? 'selected' : '' }}> 
                        {{ $value }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="phone">Teléfono:</label>
            <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $employee->phone) }}"> 
        </div>
        <div class="form-group">
            <label for="address">Dirección:</label>
            <input type="text" class="form-control" id="address" name="address" value="{{ old('address', $employee->address) }}"> 
        </div> 

        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
@endsection