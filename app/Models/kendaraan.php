<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    use HasFactory;

    protected $primaryKey = 'no_pol';
    public $incrementing = false;
    
    protected $table = 'kendaraan';

    public function transaksi(){
    	return $this->belongsToMany('App\Models\Transaksi');
    }
    public function users(){
    	return $this->belongsTo('App\Models\User');
    }
}
