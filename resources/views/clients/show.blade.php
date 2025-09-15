@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        @include('partials.alerts')
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title mb-0">Client Data</h4>
                <div>
                    <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <a href="{{ route('clients.index') }}" class="btn btn-sm btn-secondary">Back</a>
                </div>
            </div>

            <div class="card-body">
                <dl class="row">
                    <dt class="col-sm-3">Name</dt>
                    <dd class="col-sm-9">{{ $client->name }}</dd>

                    <dt class="col-sm-3">Phone</dt>
                    <dd class="col-sm-9">{{ $client->phone ?? '-' }}</dd>

                    <dt class="col-sm-3">Type</dt>
                    <dd class="col-sm-9">
                        @if ($client->type === 'company')
                            Company
                        @elseif($client->type === 'personal')
                            Personal
                        @else
                            -
                        @endif
                    </dd>


                    <dt class="col-sm-3">Address</dt>
                    <dd class="col-sm-9">{{ $client->address ?? '-' }}</dd>

                    <dt class="col-sm-3">Notes</dt>
                    <dd class="col-sm-9">{{ $client->notes ?? '-' }}</dd>
                </dl>
            </div>
        </div>
    </div>
@endsection
