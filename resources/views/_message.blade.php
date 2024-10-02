@if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show text-sm" role="alert">
        {{ session()->get('success') }}
    </div>
@endif

@if (session()->has('error'))
    <div class="alert alert-danger alert-dismissible fade show text-sm" role="alert">
        {{ session()->get('error') }}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show text-sm" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
