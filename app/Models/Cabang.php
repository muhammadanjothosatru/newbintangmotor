<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cabang extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
    ];
    protected $table = 'cabang';

    public function users(){
    	return $this->belongsToMany(User::class);
    }
}
