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
                            <input type="month" name="bulan" class="form-control form-control text-start" id="colFormLabelSm"
                                placeholder="col-form-label-sm">
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
                                        <h6 class="my-0">Rp. {{ ($rkpe->pemasukan + $rkpi->piutang) - ($rkpnl->pengeluaran + $rkh->hutang) }}</h6>
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
                        <th scope="col">Pemasukam</th>
                        <th scope="col">Pengeluaran</th>
                        <th scope="col">Hutang</th>
                        <th scope="col">Piutang</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($blnth as $tgl)
                        @foreach ($pemasukan as $no => $pmk)
                            @foreach ($piutang as $piu)
                                @foreach ($pengeluaran as $pnl)
                                    @foreach ($hutang as $htn)
                                        <tr class="text-center">
                                            <td>{{ ++$no }}</td>
                                            <td>{{ $tgl->bulan . ' ' . $tgl->tahun }} </td>
                                            <td>{{ $pmk->pemasukan }}</td>
                                            <td>{{ $pnl->pengeluaran }}</td>
                                            <td>{{ $htn->hutang }}</td>
                                            <td>{{ $piu->piutang }}</td>
                                        <tr>
                                    @endforeach
                                @endforeach
                            @endforeach
                        @endforeach
                    @endforeach
                </tbody>


            </table>

        </div>
    </div>
@endsection
