<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class productModel extends Model
{
    use HasFactory;
    
    protected $primaryKey = 'id_product';
    //deklarasikan nama tabel di db
    protected $table = 'product';
    //deklarasi field yang bisa diisi pada table
    protected $fillable = [
        'nama',
        'harga',
        'singkat',
        'foto',
        'deskripsi'];

        public function acaraJadwal(){
            return $this->belongsTo('App\pesananModel', 'id_product', 'id_product');
        }
}
