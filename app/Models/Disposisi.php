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
    protected $fillable =['id_surat_masuk','id_pegawai_camat','tgl_penyelesaian','tgl_kembali','kembali_kepada','intruksi','sifat','tujuan'];
}
