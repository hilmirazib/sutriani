<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataNSikap extends Model
{
    use HasFactory;

    protected $table = 'data_nilai_sikap';
    protected $primaryKey = 'id_n_sikap';
    protected $guarded = [];
}
