@extends('../dashboard.component.layouts')

@section('judul')
    Profil
@endsection

@section('content')
    <div class="card">
        <div class="card-header bg-warning text-white">
            Admin
        </div>
        @foreach ($admin as $adm)
            <div class="card-body">
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" value="{{ $adm->nama }}" class="form-control text-capitalize" readonly>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="text"  class="form-control" value="{{ $adm->email }}" readonly>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password"  class="form-control" value="katasandi" readonly>
                </div>
                <div class="form-group">
                    <label>Nomor Telepon</label>
                    <input type="text"  class="form-control" value="{{ $adm->no_telepon }}" readonly>
                </div>
                <a href="/admin" class="btn btn-success">Kembali</a>
            </div>
        @endforeach
    </div>
@endsection
