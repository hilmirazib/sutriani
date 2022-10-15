<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataNKeterampilan extends Model
{
    use HasFactory;

    protected $table = 'data_n_keterampilan';
    protected $primaryKey = 'id_keterampilan';
    protected $guarded = [];
}
