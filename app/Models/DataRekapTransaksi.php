<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DataHutang;
use App\Models\DataPemasukan;
use App\Models\DataPiutang;
use App\Models\DataPengeluaran;

class DataRekapTransaksi extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function pemasukan(){
        return $this->belongsTo(DataPemasukan::class, 'id_pemasukan');
    }
    public function piutang(){
        return $this->belongsTo(DataPiutang::class, 'id_piutang');
    }
    public function pengeluaran(){
        return $this->belongsTo(DataPengeluaran::class, 'id_pengeluaran');
    }
    public function hutang(){
        return $this->belongsTo(DataHutang::class, 'id_hutang');
    }
    
}
