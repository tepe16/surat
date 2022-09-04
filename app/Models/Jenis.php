<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenis extends Model
{
    use HasFactory;
    public $table="jenis";
    public $timestamps = false ;
    protected $primaryKey='id_jenis_surat';
    protected $fillable =['nama_jenis'];
}
