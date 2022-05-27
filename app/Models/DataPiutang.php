<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPiutang extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function user(){
        return $this->belongsTo(User::class, 'id_akun');
    }

    public function rekapTransaksi(){
        return $this->hasMany(DataRekapTransaksi::class, 'id_piutang');
    }
}
