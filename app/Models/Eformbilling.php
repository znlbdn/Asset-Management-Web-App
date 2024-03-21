<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eformbilling extends Model
{
    use HasFactory;
    protected $fillable = ['bil_no', 'bil_date', 'bil_code', 'bil_vendor', 'bil_type', 'bil_size', 'bil_brand', 'bil_total'];
    protected $table = 'eformbilling';
    public $timestamps = false;
}
