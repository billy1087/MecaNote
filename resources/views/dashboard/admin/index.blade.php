@extends('../dashboard.component.layouts')

@section('judul')
    Profil
@endsection

@section('content')
    <div class="card">
        <div class="card-header bg-warning text-white">
            Data Profil
        </div>
        <div class="card-body">
            <div class="row mx-1">
                @foreach ($admins as $no => $admin)
                    <a href="/admin/{{ $admin->id }}" class="col-12 py-2 mb-3 rounded rounded-3 border border-dark text-decoration-none text-dark">
                        Admin {{ ++$no }}
                    </a>  
                @endforeach
            </div>
        </div>
    </div>
@endsection
