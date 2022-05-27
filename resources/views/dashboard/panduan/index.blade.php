@extends('../dashboard.component.layouts')

@section('judul')
    Panduan
@endsection

@section('content')
    <div class="card">
        <div class="card-header bg-warning text-white">
            Data Panduan
        </div>
        <div class="card-body">
            <div class="row mx-1">
                @foreach ($panduan as $pnd)
                    <a href="/panduan/{{ $pnd->id }}"
                        class="col-12 py-2 mb-3 rounded rounded-3 border border-dark text-decoration-none text-dark">
                        {{ $pnd->judul_panduan }}
                    </a>
                @endforeach
            </div>
        </div>
    </div>
@endsection
