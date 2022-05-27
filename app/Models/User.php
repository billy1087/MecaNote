<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\DataPemasukan;
use App\Models\DataPiutang;
use App\Models\DataPengeluaran;
use App\Models\DataHutang;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = ['id_akun'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function pemasukan(){
        return $this->hasMany(DataPemasukan::class, 'id_akun');
    }

    public function piutang(){
        return $this->hasMany(DataPiutang::class, 'id_akun');
    }

    public function pengeluaran(){
        return $this->hasMany(DataPengeluaran::class, 'id_akun');
    }

    public function hutang(){
        return $this->hasMany(DataHutang::class, 'id_akun');
    }

    public function panduan(){
        return $this->hasMany(DataPanduan::class, 'id_akun');
    }
}
