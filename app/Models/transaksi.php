<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'transaksi';

    public function users(){
    	return $this->belongsTo('App\Models\User');
    }

    public function pelanggan(){
    	return $this->belongsTo('App\Models\Pelanggan');
    }

    public function kendaraan(){
    	return $this->belongsTo('App\Models\Kendaraan');
    }
}
