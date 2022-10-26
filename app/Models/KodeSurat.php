<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KodeSurat extends Model
{
    use HasFactory;
    public $table ="kode_surat";
    public $timestamps = false ;
    protected $primaryKey='id_kode_surat';
    protected $fillable =['id_kode_surat','nama_kode_surat'];
}
