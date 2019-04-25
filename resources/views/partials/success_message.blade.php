@if(session()->has('message'))
    <div class="container my-5">
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    </div>
@endif