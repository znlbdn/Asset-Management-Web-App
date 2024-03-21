<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eformpengembalian extends Model
{
    use HasFactory;
    protected $fillable = ['ret_no', 'ret_date', 'ret_kode', 'ret_back', 'ret_type', 'ret_size'];
    protected $table = 'eformpengembalian';
    public $timestamps = false;
}
