@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Create New Client</h4>
            </div>
            <div class="card-body">
                @include('partials.alerts')
                <form action="{{ route('clients.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                        @error('name')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Phone</label>
                        <input type="text" name="phone" class="form-control" value="{{ old('phone') }}">
                        @error('phone')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Address</label>
                        <input type="text" name="address" class="form-control" value="{{ old('address') }}">
                        @error('address')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Type</label>
                        <select name="type" class="form-control">
                            <option value="">Select Type</option>
                            <option value="company" {{ old('type') == 'company' ? 'selected' : '' }}>Company</option>
                            <option value="personal" {{ old('type') == 'personal' ? 'selected' : '' }}>Personal</option>
                        </select>
                        @error('type')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Notes</label>
                        <textarea name="notes" class="form-control" rows="3">{{ old('notes') }}</textarea>
                        @error('notes')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
@endsection
