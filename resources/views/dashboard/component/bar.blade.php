<div class="col-md-2 bg-dark mt-2 pr-3 pt-4 sidebar">
    <ul class="nav flex-column ml-3 mb-2">
        <li class="nav-item">
            <a class="nav-link active text-white" href="/dashboard">Dashboard</a>
            <hr class="bg-secondary">
        </li>
    </ul>
    <div class="dropdown ml-2 text-center mb-3">
        <a class="btn btn-secondary dropdown-toggle px-5" type="a" id="dropdownMenu2" data-toggle="dropdown"
            aria-expanded="false">
            Pecatatan
        </a>
        <div class="dropdown-menu mx-5" aria-labelledby="dropdownMenu2">
            <a class="dropdown-item " href="/pemasukan">Pemasukan</a>
            <a class="dropdown-item " href="/pengeluaran">Pengeluaran</a>
            <a class="dropdown-item " href="/hutang">Hutang</a>
            <a class="dropdown-item " href="/piutang">Piutang</a>
        </div>
    </div>
    @if (auth()->user()->role == 'admin')
        <div class="dropdown ml-2 mb-3 text-center">
            <a class="btn btn-secondary dropdown-toggle px-5" type="a" id="dropdownMenu3" data-toggle="dropdown"
                aria-expanded="false">
                Keuangan
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenu3">
                <a class="dropdown-item " href="/pemasukan/create">Pemasukan</a>
                <a class="dropdown-item " href="/pengeluaran/create">Pengeluaran</a>
                <a class="dropdown-item " href="/hutang/create">Hutang</a>
                <a class="dropdown-item " href="/piutang/create">Piutang</a>
            </div>
        </div>
    @endif

    <div class="dropdown ml-2 text-center mb-3 ">
        <a class="btn btn-secondary dropdown-toggle px-4" type="a" id="dropdownMenu4" data-toggle="dropdown"
            aria-expanded="false">
            Rekap Transaksi
        </a>
        <div class="dropdown-menu" aria-labelledby="dropdownMenu4">
            <a class="dropdown-item " href="/rekaptransaksi">Rekap Transaksi</a>
        </div>
    </div>

    @if (auth()->user()->role == 'pemilik')
        <div class="dropdown ml-2 text-center mb-3 ">
            <a class="btn btn-secondary dropdown-toggle" type="a" style="padding-left: 55px; padding-right: 55px"
                id="dropdownMenu4" data-toggle="dropdown" aria-expanded="false">
                Admin
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenu4">
                <a class="dropdown-item " href="/admin">Admin</a>
            </div>
        </div>
    @endif
    <div class="dropdown ml-2 text-center mb-3">
        <a class="btn btn-secondary dropdown-toggle" style="padding-left: 30px; padding-right: 30px;" type="a"
            id="dropdownMenu2" data-toggle="dropdown" aria-expanded="false">
            Data Panduan
        </a>
        <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
            <a class="dropdown-item " href="/panduan">Melihat Data Panduan</a>
            @if (auth()->user()->role == 'pemilik')
                <a class="dropdown-item " href="/panduan/create">Membuat Data Panduan</a>  
            @endif
        </div>
    </div>
</div>
