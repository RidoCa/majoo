<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pesananController extends Controller
{

    public function index(Request $request){
            
        $dataProduct = \App\Models\pesananModel::where('status','=',0)->get();
        // //memanggil view
      
        return view('admin.pesanan', ['dataProduct' => $dataProduct]);
    }
    
    public function indexacc(Request $request){
            
        $dataProduct = \App\Models\pesananModel::where('status','=',1)->get();
        // //memanggil view
      
        return view('admin.pesananacc', ['dataProduct' => $dataProduct]);
    }
    
    public function his(Request $request){
            
        $dataProduct = \App\Models\pesananModel::where('id_user','=',auth()->user()->id)->orderBy('status')->get();
        // //memanggil view
        return view('member.history', ['dataProduct' => $dataProduct]);
    }

    public function store(Request $request){
      
        $data_pesanan = new \App\Models\pesananModel;
        $data_pesanan->id_user = auth()->user()->id;
        $data_pesanan->id_product = $request->id_produk;
        $data_pesanan->jumlah = $request->jumlah;
        $data_pesanan->status = 0;
        $data_pesanan->save();
            
        $dataProduct = \App\Models\productModel::all();
        // //memanggil view
        return view('member.katalog', ['dataProduct' => $dataProduct]);
    }
    
    public function acc($id){
            
        $data_pesanan =  \App\Models\pesananModel::find($id);
        $data_pesanan->status = 1;
        $data_pesanan->save();
            
        $dataProduct = \App\Models\pesananModel::where('status','=',0)->get();
        // //memanggil view
        return redirect('/pesanan')->with('sukses', 'Data pemesanan berhasil dikonfirmasi');
    }
  
}
