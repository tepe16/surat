<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disposisi extends Model
{
    use HasFactory;
    public $table="disposisi";
    public $timestamps = false ;
    protected $primaryKey='id_disposisi';
    protected $fillable =['no_surat','id_jenis_surat','id_instansi','id_bagian','id_pegawai','tgl_surat','tgl_terima','perihal','sifat','tujuan','rahasia'];
}
