<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instansi extends Model
{
    use HasFactory;
    public $table="instansi";
    public $timestamps = false ;
    protected $primaryKey='id_instansi';
    protected $fillable =['nama_instansi'];
}
