@if ($errors->any())
    <div class="alert alert-danger" role="alert">
        <strong>PERHATIAN!</strong> Kesalahan pengisian data:
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <ul>
            @foreach ($errors->all() as $item)
                <li>
                    {{ $item }}
                </li>
            @endforeach
        </ul>
    </div>    
@endif

@if (Session::get('success'))
    <div class="alert alert-success" role="alert">
        <strong>SUKSES!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        {{ Session::get('success') }}
    </div>
@endif