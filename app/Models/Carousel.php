<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carousel extends Model
{
    use HasFactory;
    
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    protected $fillable = [
        'namapromo' ,
        'linkpromo',
        'foto',
    ];
    
    protected $table = 'carousel';
}
