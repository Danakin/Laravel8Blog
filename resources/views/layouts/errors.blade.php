@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <x-error>{{ $error }}</x-error>
            @endforeach
        </ul>
    </div>
@endif
