<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    protected $fillable = [
        'no_pol' ,
        'foto',
        'harga_jual',
        'deskripsi',
        'kilometer',
        'dp',
        'angsuran',
        'bulan'
    ];
    
    protected $table = 'foto_landing';
    
    public function kendaraan(){
    	return $this->belongsTo(Kendaraan::class);
    }
}
