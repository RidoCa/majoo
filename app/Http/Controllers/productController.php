<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;


class productController extends Controller
{
    public function index(){
        $now = Carbon::now('Asia/Jakarta');
            $dataProduct = \App\Models\productModel::all();
        // //memanggil view
        return view('admin.produk', ['dataProduct' => $dataProduct, 'now' => $now]);

    }
    
    public function katalog(){
            $dataProduct = \App\Models\productModel::all();
        // //memanggil view
        return view('member.katalog', ['dataProduct' => $dataProduct]);

    }
    
    public function delete($id){
    $data = \App\Models\productModel::find($id);
    $data->delete();
    
    $dataProduct = \App\Models\productModel::all();
    return redirect('/produk')->with('delete', 'Data produk berhasil dihapus');

    }
    
    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required|unique:App\Models\productModel,nama',
            'deskripsi_singkat' => 'required|unique:App\Models\productModel,singkat',
            'foto_produk' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            ]);
            
        $file1 = $request->file('foto_produk');
        $nama_file1 = time()."_".$file1->getClientOriginalName();
        $tujuan_upload = 'data_file';
        
        $file1->move($tujuan_upload,'_produk_'.$request->name.$nama_file1);
        
        $data_jadwal = new \App\Models\productModel;
        $data_jadwal->nama = $request->name;
        $data_jadwal->harga = $request->harga;
        $data_jadwal->singkat = $request->deskripsi_singkat;
        $data_jadwal->foto = '_produk_'.$request->name.$nama_file1;
        $data_jadwal->deskripsi = $request->deskripsi;
        $data_jadwal->save();
            
        // //memanggil view
        return redirect('/produk')->with('sukses', 'Data produk berhasil ditambahkan');
    }
     
    public function update(Request $request){
        $this->validate($request, [
            'name2' => 'required|unique:App\Models\productModel,nama',
            'deskripsi_singkat2' => 'required|unique:App\Models\productModel,singkat',
            'foto_produk2' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            ]);
            
        $file1 = $request->file('foto_produk2');
        $nama_file1 = time()."_".$file1->getClientOriginalName();
        $tujuan_upload = 'data_file';
        
        $file1->move($tujuan_upload,'_produk_'.$request->name2.$nama_file1);
        
        $data_jadwal = \App\Models\productModel::find($request->id_produk);
        $data_jadwal->nama = $request->name2;
        $data_jadwal->harga = $request->harga2;
        $data_jadwal->singkat = $request->deskripsi_singkat2;
        $data_jadwal->foto = '_produk_'.$request->name2.$nama_file1;
        $data_jadwal->deskripsi = $request->deskripsi2;
        $data_jadwal->save();
            
        $dataProduct = \App\Models\productModel::all();
        // //memanggil view
        return redirect('/produk')->with('update', 'Data produk berhasil dirubah');
    }
}
