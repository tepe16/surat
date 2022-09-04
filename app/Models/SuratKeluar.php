<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratKeluar extends Model
{
    use HasFactory;
    public $table="surat_keluar";
    public $timestamps = false ;
    protected $primaryKey='id_surat_keluar';
    protected $fillable =['no_surat_keluar','id_jenis_surat','id_instansi','id_pegawai','tgl_surat','perihal','file'];
}
