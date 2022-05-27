@extends('../dashboard.component.layouts')

@section('judul')
    Profil
@endsection

@section('content')
    @if (session()->has('suksesUp'))
        <div class="alert alert-success alert-block my-auto">
            <button type="button" class="close" data-dismiss="alert">x</button>
            {{ session('suksesUp') }}
        </div>
    @endif
    <div class="card mt-2">
        <div class="card-header bg-warning text-white">
            Profil
        </div>
        @foreach ($profil as $prf)
            <div class="card-body">
                <form action="/profil/{{ $prf->id }}" method="post">
                    @method('put')
                    @csrf
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="nama" value="{{ $prf->nama }}" class="form-control text-capitalize"
                            required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" name="email" value="{{ $prf->email }}" required>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <div class="form-group">
                        <label>Nomor Telepon</label>
                        <input type="text" class="form-control" name="no_telepon" value="{{ $prf->no_telepon }}"
                            required>
                    </div>
                    <a href="/dashboard" class="btn btn-success">Kembali</a>
                    <button type="submit" class="btn btn-success mx-3 px-4">Ubah</button>
                </form>
            </div>
        @endforeach
    </div>
@endsection
