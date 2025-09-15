@extends('layouts.master')
@section('content')
    <div class="container">
        @include('partials.alerts')
        <h3>Edit Data For Employee</h3>

        <form method="POST" action="{{ route('employees.update', $employee->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $employee->name) }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" value="{{ old('email', $employee->email) }}"
                    required>
            </div>

            <div class="mb-3">
                <label class="form-label">Phone</label>
                <input type="text" name="phone" class="form-control" value="{{ old('phone', $employee->phone) }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Address</label>
                <input type="text" name="address" class="form-control" value="{{ old('address', $employee->address) }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Personal Image</label>
                <input type="file" name="personal_image" class="form-control" accept="image/*">

                @error('personal_image')
                    <div class="text-danger small">{{ $message }}</div>
                @enderror

                @if (!empty($employee->personal_image))
                    <div class="mt-2">
                        <p class="mb-1">Current Photo:</p>
                        <img src="{{ asset('storage/' . $employee->personal_image) }}" alt="Employee Personal Image"
                            style="max-width:150px; height:auto;">
                    </div>
                @endif
            </div>


            <div class="mb-3">
                <label class="form-label">National ID</label>
                <input type="text" name="national_id" class="form-control"
                    value="{{ old('national_id', $employee->national_id) }}">
            </div>

            <div class="mb-3">
                <label class="form-label">National ID Image</label>
                <input type="file" name="national_id_image" class="form-control" accept="image/*">

                @error('national_id_image')
                    <div class="text-danger small">{{ $message }}</div>
                @enderror

                @if (!empty($employee->national_id_image))
                    <div class="mt-2">
                        <p class="mb-1">Current Image:</p>
                        <img src="{{ asset('storage/' . $employee->national_id_image) }}" alt="Employee National ID Image"
                            style="max-width:150px; height:auto;">
                    </div>
                @endif
            </div>


            <div class="mb-3">
                <label class="form-label">Birthday</label>
                <input type="text" name="birthday" class="form-control"
                    value="{{ old('birthday', $employee->birthday) }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Position</label>
                <input type="text" name="position" class="form-control"
                    value="{{ old('position', $employee->position) }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Salary</label>
                <input type="number" step="0.01" name="salary" class="form-control"
                    value="{{ old('salary', $employee->salary) }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Start Date</label>
                <input type="date" name="start_date" class="form-control"
                    value="{{ old('start_date', $employee->start_date) }}">
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('employees.show', $employee) }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
