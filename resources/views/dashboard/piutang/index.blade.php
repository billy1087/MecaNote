@extends('../dashboard.component.layouts')

@section('judul')
    Piutang
@endsection

@section('content')
    @if (session()->has('suksesHapHut'))
        <div class="alert alert-success alert-block my-auto">
            <button type="button" class="close" data-dismiss="alert">x</button>
            {{ session('suksesHapHut') }}
        </div>
    @endif
    <div class="card mt-2">
        <div class="card-header bg-warning text-white">
            Data Piutang
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr class="text-center">
                        <th scope="col">NO</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Nama Piutang</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Harga Satuan</th>
                        <th scope="col">Keterangan</th>
                        <th scope="col">Sub Total</th>
                        <th scope="col">Nama Admin</th>
                        @if (auth()->user()->role == 'admin')
                            <th scope="col">Aksi</th>
                        @endif

                    </tr>
                </thead>
                @foreach ($piutang as $no => $piu)
                    <tbody>
                        <tr class="text-center">
                            <td>{{ ++$no }}</td>
                            <td>{{ $piu->updated_at }}</td>
                            <td>{{ $piu->nama_piutang }}</td>
                            <td>{{ $piu->jumlah }}</td>
                            <td>{{ $piu->harga_satuan }}</td>
                            <td>{{ $piu->keterangan }}</td>
                            <td>{{ $piu->jumlah * $piu->harga_satuan }}</td>
                            <td>{{ $piu->user->nama }}</td>
                            @if (auth()->user()->role == 'admin')
                                <td>
                                    <div class="row my-2 px-3">
                                        <a href="/piutang/{{ $piu->id }}/edit" class="col-6"><i
                                                class="bi bi-pencil-square text-warning" style="font-size: 18px"></i></a>
                                        <form action="/piutang/{{ $piu->id }}" method="post" class="col-6">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="border border-none"><i
                                                    class="bi bi-trash text-danger" style="font-size: 18px"></i></button>
                                        </form>
                                    </div>
                                </td>
                            @endif
                        <tr>
                    </tbody>
                @endforeach
            </table>

        </div>
    </div>
@endsection
