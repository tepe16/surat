<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratMasuk extends Model
{
    use HasFactory;
    public $table="surat_masuk";
    public $timestamps = false ;
    protected $primaryKey='id_surat_masuk';
    protected $fillable =['id_kode_surat','id_pegawai','tgl_masuk','asal_surat','perihal','lembar_surat','lampiran','file'];
}
