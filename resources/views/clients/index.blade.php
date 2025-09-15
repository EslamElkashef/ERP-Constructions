@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        @include('partials.alerts')
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title mb-0">Clients</h4>
                <a href="{{ route('clients.create') }}" class="btn btn-primary">Create New Client</a>
            </div>

            <table class="table table-bordered table-hover">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Type</th>
                        <th>Notes</th>
                        <th width="180">Operations</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($clients as $client)
                        <tr>
                            <td>{{ $client->id }}</td>
                            <td>
                                <a href="{{ route('clients.show', $client->id) }}">
                                    {{ $client->name }}
                                </a>
                            </td>
                            <td>{{ $client->phone }}</td>
                            <td>{{ $client->address }}</td>
                            <td>
                                @if ($client->type === 'company')
                                    Company
                                @elseif($client->type === 'personal')
                                    Personal
                                @else
                                    -
                                @endif
                            </td>
                            <td>{{ \Illuminate\Support\Str::limit($client->notes, 50) }}</td>
                            <td>
                                <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('clients.destroy', $client->id) }}" method="POST"
                                    class="d-inline delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-sm btn-danger btn-delete">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">There are no clients.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>


            {{-- عرض pagination فقط لو موجود --}}
            @if (method_exists($clients, 'links'))
                <div class="d-flex justify-content-center">
                    {{ $clients->links() }}
                </div>
            @endif
        </div>
    </div>
    </div>
@endsection
