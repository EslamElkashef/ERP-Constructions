@extends('layouts.master')
@section('content')
    <div class="container">
        @include('partials.alerts')

        <h3>Data Employee</h3>
        <ul class="list-group mb-3">
            <li class="list-group-item"><strong>Name:</strong> {{ $employee->name }}</li>
            <li class="list-group-item"><strong>Email:</strong> {{ $employee->email }}</li>
            <li class="list-group-item"><strong>Phone:</strong> {{ $employee->phone }}</li>
            <li class="list-group-item"><strong>Address:</strong> {{ $employee->address }}</li>
            <li class="list-group-item">
                <strong>Personal Image:</strong><br>
                @if ($employee->personal_image)
                    <img src="{{ asset('storage/' . $employee->personal_image) }}" alt="Employee Personal Image"
                        style="max-width:150px; height:auto;">
                @else
                    <span>No photo uploaded</span>
                @endif
            </li>
            <li class="list-group-item"><strong>National ID:</strong> {{ $employee->national_id }}</li>
            <li class="list-group-item">
                <strong>National ID Image:</strong><br>
                @if ($employee->national_id_image)
                    <img src="{{ asset('storage/' . $employee->national_id_image) }}" alt="Employee National ID Image"
                        style="max-width:150px; height:auto;">
                @else
                    <span>No image uploaded</span>
                @endif
            </li>
            <li class="list-group-item"><strong>Birthday:</strong> {{ $employee->birthday }}</li>
            <li class="list-group-item"><strong>Position:</strong> {{ $employee->position }}</li>
            <li class="list-group-item"><strong>Salary:</strong> {{ $employee->salary }}</li>
            <li class="list-group-item"><strong>Start Date:</strong> {{ $employee->start_date }}</li>
        </ul>

        <a href="{{ route('employees.edit', $employee) }}" class="btn btn-warning">Edit</a>
        <a href="{{ route('employees.index') }}" class="btn btn-secondary">Back</a>
    </div>
@endsection
