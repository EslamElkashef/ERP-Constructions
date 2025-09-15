<div>
    <form action="{{ $action }}" method="POST" class="d-inline delete-form">
        @csrf
        @method('DELETE')
        <button type="button" class="btn btn-sm btn-danger btn-delete">
            {{ $slot ?? 'Delete' }}
        </button>
    </form>

</div>
