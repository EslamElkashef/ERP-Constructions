@extends('layouts.master')
@section('content')
    <div class="container">
        @include('partials.alerts')
        <h3>Add Employee</h3>

        <form action="{{ route('employees.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- Name --}}
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                @error('name')
                    <div class="text-danger small">{{ $message }}</div>
                @enderror
            </div>

            {{-- Email --}}
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                @error('email')
                    <div class="text-danger small">{{ $message }}</div>
                @enderror
            </div>

            {{-- Phone --}}
            <div class="mb-3">
                <label class="form-label">Phone</label>
                <input type="text" name="phone" class="form-control" value="{{ old('phone') }}">
                @error('phone')
                    <div class="text-danger small">{{ $message }}</div>
                @enderror
            </div>

            {{-- Address --}}
            <div class="mb-3">
                <label class="form-label">Address</label>
                <input type="text" name="address" class="form-control" value="{{ old('address') }}">
                @error('address')
                    <div class="text-danger small">{{ $message }}</div>
                @enderror
            </div>

            {{-- Personal Image --}}
            <div class="mb-3">
                <label class="form-label">Personal Image</label>
                <input type="file" name="personal_image" class="form-control" accept="image/*">
                @error('personal_image')
                    <div class="text-danger small">{{ $message }}</div>
                @enderror
            </div>

            {{-- National ID --}}
            <div class="mb-3">
                <label class="form-label">National ID</label>
                <input type="text" name="national_id" class="form-control" value="{{ old('national_id') }}">
                @error('national_id')
                    <div class="text-danger small">{{ $message }}</div>
                @enderror
            </div>

            {{-- National ID Image --}}
            <div class="mb-3">
                <label class="form-label">National ID Image</label>
                <input type="file" name="national_id_image" class="form-control" accept="image/*">
                @error('national_id_image')
                    <div class="text-danger small">{{ $message }}</div>
                @enderror
            </div>

            {{-- Birthday --}}
            <div class="mb-3">
                <label class="form-label">Birthday</label>
                <input type="date" name="birthday" class="form-control" value="{{ old('birthday') }}">
                @error('birthday')
                    <div class="text-danger small">{{ $message }}</div>
                @enderror
            </div>

            {{-- Position --}}
            <div class="mb-3">
                <label class="form-label">Position</label>
                <input type="text" name="position" class="form-control" value="{{ old('position') }}">
                @error('position')
                    <div class="text-danger small">{{ $message }}</div>
                @enderror
            </div>

            {{-- Salary --}}
            <div class="mb-3">
                <label class="form-label">Salary</label>
                <input type="number" step="0.01" name="salary" class="form-control" value="{{ old('salary') }}">
                @error('salary')
                    <div class="text-danger small">{{ $message }}</div>
                @enderror
            </div>

            {{-- Start Date --}}
            <div class="mb-3">
                <label class="form-label">Start Date</label>
                <input type="date" name="start_date" class="form-control" value="{{ old('start_date') }}">
                @error('start_date')
                    <div class="text-danger small">{{ $message }}</div>
                @enderror
            </div>

            <button class="btn btn-success">Save</button>
        </form>
    </div>
@endsection
