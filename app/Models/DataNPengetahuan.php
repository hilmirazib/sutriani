<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataNPengetahuan extends Model
{
    use HasFactory;
    protected $table = 'data_n_pengetahuan';
    protected $primaryKey = 'id_penilaian';
    protected $guarded = [];
}
