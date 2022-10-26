<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class PegawaiCamat extends Authenticatable
{
    use HasFactory;
    protected $table="pegawai_camat";
    protected $primaryKey="id_pegawai_camat";

    protected $fillable=['nama_pegawai_camat','nip','level','username','password'];
}
