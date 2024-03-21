<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MutasiFreezer extends Model
{
    use HasFactory;
    protected $fillable = ['mutation_date', 'mutation_ori', 'mutation_to', 'code_freezer'];
    protected $table = 'mutasi_freezer';
    public $timestamps = false;
}
