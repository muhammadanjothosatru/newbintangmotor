<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $guarded = ['id','no_kontrak','uang_dp','bulan_angsuran'];
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
