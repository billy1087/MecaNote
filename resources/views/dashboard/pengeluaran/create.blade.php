@extends('../dashboard.component.layouts')

@section('judul')
    Pengeluaran
@endsection

@section('content')
    @if (session()->has('suksesPengeluaran'))
        <div class="alert alert-success alert-block my-auto">
            <button type="button" class="close" data-dismiss="alert">x</button>
            {{ session('suksesPengeluaran') }}
        </div>
    @endif
    <div class="card mt-2">
        <div class="card-header bg-warning text-white">
            Form Input Data Pengeluaran
        </div>
        <div class="card-body">
            <form method="post" action="/pengeluaran">
                @csrf
                <input type="hidden" name="id_akun" value="{{ auth()->user()->id }}">
                <div class="form-group">
                    <label>Nama Pengeluaran</label>
                    <input type="text" name="nama_pengeluaran" class="form-control" placeholder="Input Nama Pengeluaran"
                        required>
                </div>
                <div class="form-group">
                    <label>Jumlah</label>
                    <input type="number" name="jumlah" class="form-control" placeholder="Input Jumlah" required>
                </div>
                <div class="form-group">
                    <label>Harga Satuan</label>
                    <input type="number" name="harga_satuan" class="form-control" placeholder="Input Harga Satuan"
                        required>
                </div>
                <div class="form-group">
                    <label>Keterangan</label>
                    <textarea class="form-control" name="keterangan" placeholder="Input Keterangan"></textarea>
                </div>
                <button type="submit" class="btn btn-success" name="psimpan">SIMPAN</button>
                <button type="reset" class="btn btn-success" name="preset">KOSONGKAN</button>
            </form>
        </div>
    </div>
@endsection
