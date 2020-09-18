@extends('layout.dashboard')
@section('konten')

<div class="breadcrumb-holder">
  <div class="container-fluid">
    <ul class="breadcrumb">
      <li class="breadcrumb-item"><a href="/dashboard">Beranda</a></li>
      <li class="breadcrumb-item active">Data PTPP</li>
    </ul>
  </div>
</div>
<section>
  <div class="container">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header">
          <h4>Halaman Beranda Website</h4><br>
          <p>Halaman ini akan menampilkan rekap data penjualan dan produk pada katalog.</p>  
        </div>
      </div>
    </div>
    <div class="row">
          <div class="col-md-4">
              <div class="card" style="text-align: center">
                  <div class="card-header">
                      <h4>Jumlah Produk di Katalog <br><br>{{$total}} Item</h4>
                  </div>
              </div>
          </div>
          
          <div class="col-md-4">
            <div class="card" style="text-align: center">
                <div class="card-header">
                  <h4>Jumlah Pesanan Sudah di Konfirmasi <br><br>{{$sudah}} Item</h4>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
          <div class="card" style="text-align: center">
              <div class="card-header">
                <h4>Jumlah Pesanan Belum di Konfirmasi <br><br>
                {{$belum}} Item</h4>
              </div>
          </div>
      </div>
  </div>
  </div>
  


  @endsection