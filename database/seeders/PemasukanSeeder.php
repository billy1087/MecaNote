<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PemasukanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('data_pemasukans')->insert([
            'id_akun' => 2,
            'nama_pemasukan' => 'Penjualan Madu',
            'jumlah' => 10,
            'harga_satuan' => 95000,
            'keterangan' => 'Biaya Pemasukan april minggu ke-1',
            'updated_at' => Carbon::now()
        ]);
    }
}
