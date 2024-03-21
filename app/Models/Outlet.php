<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outlet extends Model
{
    use HasFactory;
    protected $fillable = ['custid', 'custname', 'Tipe', 'address', 'latitude', 'longitude', 'status'];
    protected $table = 'master_outletr1';
    public $timestamps = false;
}
