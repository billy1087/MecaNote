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
    <div class="card mt-2">
        <div class="card-header bg-warning text-white">
            Data Panduan
        </div>
        <div class="card-body">
            <form method="post" action="/panduan">
                @csrf
                <input type="hidden" name="id_akun" value="{{ auth()->user()->id }}">
                <div class="form-group">
                    <label>Judul Panduan</label>
                    <input type="text" name="judul_panduan" class="form-control" placeholder="Judul Panduan" required>
                </div>
                <div class="form-group">
                    <label>isi Panduan</label>
                    <input id="isi_panduan" type="hidden" name="isi_panduan">
                    <trix-editor input="isi_panduan"></trix-editor>
                </div>
                <button type="submit" class="btn btn-success" name="psimpan">SIMPAN</button>
            </form>
        </div>
    </div>
@endsection
