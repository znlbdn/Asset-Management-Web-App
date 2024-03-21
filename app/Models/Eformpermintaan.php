<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eformpermintaan extends Model
{
    use HasFactory;
    protected $fillable = ['req_no', 'req_date', 'req_name', 'req_hp', 'req_vendor', 'req_type', 'req_size', 'req_total'];
    protected $table = 'eformpermintaan';
    public $timestamps = false;
}
