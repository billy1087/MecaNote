<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RekapTransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('data_rekap_transaksis')->insert([
            'id_pemasukan' => 1,
            'id_piutang' => 1,
            'id_pengeluaran' => 1,
            'id_hutang' => 1,
            'updated_at' => Carbon::now()
        ]);
    }
}
