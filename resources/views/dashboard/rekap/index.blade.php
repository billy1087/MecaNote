@extends('../dashboard.component.layouts')

@section('judul')
    Rekap Transaksi
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8 my-auto">
                <form action="/rekaptransaksi" method="get">
                    <div class="row">
                        <div class="col-2">
                            <p>Pilih Bulan:</p>
                        </div>
                        <div class="col-5">
                            <input type="month" name="bulan" class="form-control form-control text-start"
                                id="colFormLabelSm" placeholder="col-form-label-sm">
                        </div>
                        <div class="col-4">
                            <button type="submit" name="search"
                                class="btn btn-warning px-4 border border-dark border-5">Cari</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-4">
                <div class="card border border-dark">
                    <div class="card-header text-center border border-dark py-2 bg-warning" \>
                        <h6 class="fw-bolder my-0">Keuntungan</h6>
                    </div>
                    <div class="card-body text-center my-0 py-3">
                        @foreach ($rekapPemasukan as $rkpe)
                            @foreach ($rekapPiutang as $rkpi)
                                @foreach ($rekapPengeluaran as $rkpnl)
                                    @foreach ($rekapHutang as $rkh)
                                        <h6 class="my-0">Rp.
                                            {{ $rkpe->pemasukan + $rkpi->piutang - ($rkpnl->pengeluaran + $rkh->hutang) }}
                                        </h6>
                                    @endforeach
                                @endforeach
                            @endforeach
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Data transaksi -->
    <div class="card mt-5">
        <div class="card-header bg-warning text-white">
            Data Rekap
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr class="text-center">
                        <th scope="col">NO</th>
                        <th scope="col">Bulan</th>
                        <th scope="col">Pemasukan</th>
                        <th scope="col">Pengeluaran</th>
                        <th scope="col">Hutang</th>
                        <th scope="col">Piutang</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transaksi as $no => $trans)
                        <tr class="text-center">
                            <td>{{ ++$no }}</td>
                            <td>{{ $trans->bulan . ' ' . $trans->tahun }} </td>
                            {{-- data pemasukan --}}
                            @if ($trans->pemasukan == null)
                                <td>0</td>
                            @else
                                <td>{{ $trans->pemasukan }}</td>
                            @endif

                            {{-- data pengeluaran --}}
                            @if ($trans->pengeluaran == null)
                                <td>0</td>
                            @else
                                <td>{{ $trans->pengeluaran }}</td>
                            @endif

                            {{-- data hutang --}}
                            @if ($trans->hutang == null)
                                <td>0</td>
                            @else
                                <td>{{ $trans->hutang }}</td>
                            @endif

                            {{-- data piutang --}}
                            @if ($trans->piutang == null)
                                <td>0</td>
                            @else
                                <td>{{ $trans->piutang }}</td>
                            @endif
                        <tr>
                    @endforeach
                </tbody>



            </table>

        </div>
    </div>
@endsection
