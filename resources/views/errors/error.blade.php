@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div id="error-message" class="alert alert-danger">{{ $error }}</div>
    @endforeach
@endif