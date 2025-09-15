@extends('layouts.master')
@section('content')
    <div class="container">
        @include('partials.alerts')
        <a href="{{ route('employees.create') }}" class="btn btn-primary mb-3">Create
            Employee</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Personal Image</th>
                    <th>National ID</th>
                    <th>National ID Image</th>
                    <th>Birthday</th>
                    <th>Position</th>
                    <th>Salary</th>
                    <th>Start Date</th>
                    <th>Operations</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employees as $employee)
                    <tr>
                        <td>
                            <a href="{{ route('employees.show', $employee->id) }}">
                                {{ $employee->name }}
                            </a>
                        </td>
                        <td>{{ $employee->email }}</td>
                        <td>{{ $employee->phone }}</td>
                        <td>{{ $employee->address }}</td>
                        <td>
                            @if ($employee->personal_image)
                                <img src="{{ asset('storage/' . $employee->personal_image) }}" alt="Personal Image"
                                    style="max-width:80px; height:auto;">
                            @else
                                <span class="text-muted">No Image</span>
                            @endif
                        </td>
                        <td>{{ $employee->national_id }}</td>
                        <td>
                            @if ($employee->national_id_image)
                                <img src="{{ asset('storage/' . $employee->national_id_image) }}" alt="National ID Image"
                                    style="max-width:80px; height:auto;">
                            @else
                                <span class="text-muted">No Image</span>
                            @endif
                        </td>
                        <td>{{ $employee->birthday }}</td>
                        <td>{{ $employee->position }}</td>
                        <td>{{ $employee->salary }}</td>
                        <td>{{ $employee->start_date }}</td>
                        <td>
                        <td>
                            <div class="d-flex flex-column align-items-start">
                                <a href="{{ route('employees.edit', $employee) }}" class="btn btn-primary btn-sm mb-2">
                                    Edit
                                </a>
                                <form action="{{ route('employees.destroy', $employee->id) }}" method="POST"
                                    class="d-inline delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-sm btn-danger btn-delete">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                        </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
