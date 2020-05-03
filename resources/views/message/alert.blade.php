@if (session('message'))
    <div class="alert alert-{{session('alertType')}} alert-dismissible fade show text-center" role="alert">
        {{ session('message') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    {{session()->forget('alertType')}}
    {{session()->forget('message')}}
@endif