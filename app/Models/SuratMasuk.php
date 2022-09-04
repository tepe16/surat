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
    protected $fillable =['no_surat_masuk','id_jenis_surat','id_instansi','id_bagian','id_pegawai','tgl_surat','tgl_masuk','perihal','file'];
}
