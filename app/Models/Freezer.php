<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Freezer extends Model
{
    use HasFactory;
    protected $fillable = ['key_number', 'Freezer_Owner', 'Supplier', 'Brand', 'BatchPO', 'Type', 'BarcodeFANumber'];
    protected $table = 'master_freezer_r1';
    public $timestamps = false;
}
