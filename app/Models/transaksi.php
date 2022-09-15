<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $fillable = [
        'pelanggan_id',
                'kendaraan_no_pol',
                'metode_pembayaran',
                'harga_akhir',
                'no_kontrak',
                'uang_dp',
                'bulan_angsuran',
                'keterangan',
                'users_id',
            ];
    protected $table = 'transaksi';

    public function users(){
    	return $this->belongsTo(User::class, 'users_id','id');
    }

    public function pelanggan(){
    	return $this->belongsTo(Pelanggan::class);
    }

    public function kendaraan(){
    	return $this->belongsTo(Kendaraan::class);
    }
}
