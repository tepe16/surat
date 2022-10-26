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
    protected $fillable =['id_kode_surat','id_pegawai','tgl_keluar','perihal','tujuan_surat','lembar_surat','lampiran','isi_ringkas','file'];
}
