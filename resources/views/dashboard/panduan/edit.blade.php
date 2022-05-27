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
            @foreach ($panduan as $pnd)
                <form method="post" action="/panduan/{{ $pnd->id }}">
                    @method('put')
                    @csrf
                    <input type="hidden" name="id_akun" value="{{ auth()->user()->id }}">
                    <div class="form-group">
                        <label>Judul Panduan</label>
                        <input type="text" value="{{ $pnd->judul_panduan }}" name="judul_panduan" class="form-control"
                            placeholder="Judul Panduan" required>
                    </div>
                    <div class="form-group">
                        <label>isi Panduan</label>
                        <input id="isi_panduan" type="hidden" name="isi_panduan">
                        <trix-editor input="isi_panduan">{!! $pnd->isi_panduan !!}</trix-editor>
                    </div>
                    <button type="submit" class="btn btn-success" name="psimpan">SIMPAN</button>
                </form>
            @endforeach
        </div>
    </div>
@endsection
