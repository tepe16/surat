<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bagian extends Model
{
    use HasFactory;
    public $table="bagian";
    public $timestamps = false ;
    protected $primaryKey='id_bagian';
    protected $fillable =['nama_bagian'];

}
