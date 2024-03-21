<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;
    protected $fillable = ['Kode', 'Nama_Area', 'Keterangan'];
    protected $table = 'Master_area';
    public $timestamps = false;
}
