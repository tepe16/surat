<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\Pegawai as Authenticatable ;

class Pegawai extends Authenticatable
{
    use HasFactory;
    protected $table="pegawai";
    protected $primaryKey="id_pegawai";

    protected $fillable=['nama_pegawai','nip','username','password'];

}
