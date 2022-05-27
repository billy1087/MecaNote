@extends('../dashboard.component.layouts')

@section('judul')
    Piutang
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
            Form Edit Data Piutang
        </div>
        @foreach ($piutang as $piu)
            <div class="card-body">
                <form method="post" action="/piutang/{{ $piu->id }}">
                    @method('put')
                    @csrf
                    <input type="hidden" name="id_akun" value="{{ auth()->user()->id }}">
                    <div class="form-group">
                        <label>Nama Piutang</label>
                        <input type="text" name="nama_piutang" value="{{ $piu->nama_piutang }}" class="form-control"
                            placeholder="Input Nama Piutang" required>
                    </div>
                    <div class="form-group">
                        <label>Jumlah</label>
                        <input type="number" name="jumlah" value="{{ $piu->jumlah }}" class="form-control"
                            placeholder="Input Jumlah" required>
                    </div>
                    <div class="form-group">
                        <label>Harga Satuan</label>
                        <input type="number" name="harga_satuan" value="{{ $piu->harga_satuan }}" class="form-control"
                            placeholder="Input Harga Satuan" required>
                    </div>
                    <div class="form-group">
                        <label>Keterangan</label>
                        <textarea class="form-control" name="keterangan" placeholder="Input Keterangan">{{ $piu->keterangan }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-success" name="psimpan">SIMPAN</button>
                    <button type="reset" class="btn btn-success" name="preset">KOSONGKAN</button>
                </form>
            </div>
        @endforeach
    </div>
@endsection
