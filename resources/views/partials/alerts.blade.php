@if ($errors->has('general'))
    <div class="alert alert-danger">
        {{ $errors->first('general') }}
    </div>
@endif

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
