<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pesananModel extends Model
{
    use HasFactory;
    
    protected $primaryKey = 'id_pesanan';
    //deklarasikan nama tabel di db
    protected $table = 'pesanan';
    //deklarasi field yang bisa diisi pada table
    protected $fillable = [
        'id_user',
        'id_product',
        'jumlah'];
        
        public function produkPesanan(){
            return $this->belongsTo('App\Models\productModel', 'id_product', 'id_product');
        }
        
        public function userPesanan(){
            return $this->belongsTo('App\Models\User', 'id_user', 'id');
        }

     
}
