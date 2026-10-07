<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class jenjang extends Model
{
    protected $table ='jenjang';

     protected $fillable =[
        'nama_jenjang',
        'keterangan',
    ];
}
