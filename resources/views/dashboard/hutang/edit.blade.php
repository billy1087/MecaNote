@extends('../dashboard.component.layouts')

@section('judul')
    Hutang
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
            Form Edit Data Hutang
        </div>
        @foreach ($hutang as $htn)
            <div class="card-body">
                <form method="post" action="/hutang/{{ $htn->id }}">
                    @method('put')
                    @csrf
                    <input type="hidden" name="id_akun" value="{{ auth()->user()->id }}">
                    <div class="form-group">
                        <label>Nama Hutang</label>
                        <input type="text" name="nama_hutang" value="{{ $htn->nama_hutang }}" class="form-control"
                            placeholder="Input Nama Hutang" required>
                    </div>
                    <div class="form-group">
                        <label>Jumlah</label>
                        <input type="number" name="jumlah" value="{{ $htn->jumlah }}" class="form-control"
                            placeholder="Input Jumlah" required>
                    </div>
                    <div class="form-group">
                        <label>Harga Satuan</label>
                        <input type="number" name="harga_satuan" value="{{ $htn->harga_satuan }}" class="form-control"
                            placeholder="Input Harga Satuan" required>
                    </div>
                    <div class="form-group">
                        <label>Keterangan</label>
                        <textarea class="form-control" name="keterangan" placeholder="Input Keterangan">{{ $htn->keterangan }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-success" name="psimpan">SIMPAN</button>
                    <button type="reset" class="btn btn-success" name="preset">KOSONGKAN</button>
                </form>
            </div>
        @endforeach
    </div>
@endsection
