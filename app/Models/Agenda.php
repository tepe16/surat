<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    use HasFactory;
    public $table ="agenda";
    public $timestamps = false ;
    protected $primaryKey='id_agenda';
    protected $fillable =['id_pegawai','tgl_agenda','isi_acara','peserta','tempat','waktu'];
 
}
