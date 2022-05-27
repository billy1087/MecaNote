@extends('../dashboard.component.layouts')

@section('judul')
    Panduan
@endsection

@section('content')
    @if (session()->has('suksesCreated'))
        <div class="alert alert-success alert-block my-auto">
            <button type="button" class="close" data-dismiss="alert">x</button>
            {{ session('suksesCreated') }}
        </div>
    @endif
    @if (session()->has('suksesUp'))
        <div class="alert alert-success alert-block my-auto">
            <button type="button" class="close" data-dismiss="alert">x</button>
            {{ session('suksesUp') }}
        </div>
    @endif
    <div class="card mt-2">
        <div class="card-header bg-warning text-white">
            Data Panduan
        </div>
        <div class="card-body">
            <div class="row mx-1">
                @foreach ($panduan as $pnd)
                    <div class="col-12 mb-1">
                        <h6>Nama Pemilik</h6>
                    </div>
                    <div class="col-12 border border-dark py-2 rounded mb-3">
                        <p class="my-auto">{{ $pnd->user->nama }}</p>
                    </div>
                    <div class="col-12 mb-1">
                        <h6>Judul Panduan</h6>
                    </div>
                    <div class="col-12 border border-dark py-2 rounded mb-3">
                        <p class="my-auto">{{ $pnd->judul_panduan }}</p>
                    </div>
                    <div class="col-12 mb-1">
                        <h6>Isi Panduan</h6>
                    </div>
                    <div class="col-12 border border-dark py-2 rounded mb-4">
                        <p class="my-auto">{!! $pnd->isi_panduan !!}</p>
                    </div>
                    <a href="/panduan" class="btn btn-success">Kembali</a>
                    @if (auth()->user()->role == 'pemilik')
                        <a href="/panduan/{{ $pnd->id }}/edit" class="btn btn-success mx-3 px-4">Ubah</a>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
@endsection
