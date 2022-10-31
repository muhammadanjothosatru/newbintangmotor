<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'nik',
        'nomor_hp',
        'alamat',
        'foto_ktp',
        'foto_ktp2',
    ];
    protected $table = 'pelanggan';

    public function transaksi(){
    	return $this->belongsToMany(Transaksi::class);
    }
}
