<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    use HasFactory;

    protected $primaryKey = 'no_pol';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'no_pol' ,
            'users_id' ,
            'nama_pemilik' ,
            'alamat' ,
            'tipe' ,
            'merk',
            'jenis',
            'model',
            'tahun_pembuatan',
            'daya_listrik',
            'no_mesin',
            'no_rangka',
            'warna' ,
            'tahun_registrasi' ,
            'no_bpkb',
            'status_kendaraan' ,
            'harga_beli',
            'tanggal_masuk',
            'supplier' ,
            'keterangan',
    ];
    
    protected $table = 'kendaraan';
    protected $dates = ['tanggal_masuk'];
    public function transaksi(){
    	return $this->belongsToMany(Transaksi::class);
    }
    public function users(){
    	return $this->belongsTo(User::class,'users_id','id');
    }
}
