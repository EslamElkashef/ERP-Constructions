@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        @include('partials.alerts')
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Edit Client Data</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('clients.update', $client->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name', $client->name) }}"
                            required>
                        @error('name')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Phone</label>
                        <input type="text" name="phone" class="form-control"
                            value="{{ old('phone', $client->phone) }}">
                        @error('phone')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Address</label>
                        <input type="text" name="address" class="form-control"
                            value="{{ old('address', $client->address) }}">
                        @error('address')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Type</label>
                        <select name="type" class="form-control">
                            <option value="">Select Type</option>
                            <option value="company" {{ old('type', $client->type) == 'company' ? 'selected' : '' }}>Company
                            </option>
                            <option value="personal" {{ old('type', $client->type) == 'personal' ? 'selected' : '' }}>
                                Personal
                            </option>
                        </select>
                        @error('type')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Notes</label>
                        <textarea name="notes" class="form-control" rows="3">{{ old('notes', $client->notes) }}</textarea>
                        @error('notes')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <button type="button" class="btn btn-secondary" onclick="window.history.back()">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
