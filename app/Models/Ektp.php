<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ektp extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $casts = [ 'tanggal'=>'date'];
}
