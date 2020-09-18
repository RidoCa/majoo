@extends('layout.dashboard')
@section('konten')

<div class="breadcrumb-holder">
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Beranda</a></li>
            <li class="breadcrumb-item active">Data Produk</li>
        </ul>
    </div>
</div>
<section>
    <div class="container">
        <br>
    <div class="row">
        @foreach ($dataProduct as $daduk)
            <div class="col-md-4">
                <div class="card" style="text-align: center">
                    <div class="card-header">
                        <h4>{{$daduk->nama}}</h4><br>
                        <td><img width="200px" height="250px" src="{{ url('data_file/'.$daduk->foto)}}"></td>
                        <p>{{$daduk->singkat}}.</p>
                        <p>
                            <button class="btn btn-primary btn-sm" style="display: inline-block;"
                            data-target="#pesan" data-id="{{$daduk->id_product}}"
                            data-nama="{{$daduk->nama}}" data-harga="{{$daduk->harga}}" 
                            data-sing="{{$daduk->singkat}}" data-foto="{{$daduk->foto}}" 
                            data-desk="{{$daduk->deskripsi}}" data-tgl="{{\Carbon\Carbon::parse($daduk->updated_at)->format('j F, Y')}}" role="button"
                            data-toggle="modal">Selengkapnya »</button>
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    </div>
    <div class="modal fade" id="pesan" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">
                        Detail Informasi Produk
                    </h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{-- <section class="forms"> --}}
                    <div class="">
                        <!-- Page Header-->
                        {{-- <header>
                <h1 class="h3 display">Form Data PTPP</h1>
              </header> --}}
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header d-flex align-items-center">
                                    <h4>Nama Pemesan : {{auth()->user()->name}}</h4>
                                    </div>
                                    <div class="card-body">
                                        <p>barang yang sudah dipesan akan diproses oleh admin</p>
                                        <form role="form" action="/pesan" method="POST"
                                            enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputFile">
                                                            Nama Produk
                                                        </label>
                                                        <input type="text" name="name" id="name" class="form-control"
                                                            id="exampleInputFile" placeholder="masukkan nama produk"
                                                            readonly />
                                                            <input type="hidden" name="id_produk" id="id_produk">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputFile">
                                                            Harga
                                                        </label>
                                                        <input type="number" name="harga" id="harga"
                                                            class="form-control" id="exampleInputFile"
                                                            placeholder="masukkan harga produk" readonly />
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputFile">
                                                            Deskripsi
                                                        </label>
                                                        <textarea class="form-control" name="deskripsi" id="deskripsi"
                                                            required cols="30" rows="10"
                                                            placeholder="Hasil Rapat"></textarea>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="form-group" style="text-align: center">
							                            <img class="img-responsive" width="200px" height="250px" style="margin:0 auto;" src="" alt="" name="gambar"> <br> <br>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputFile">
                                                            Tanggal Produk Dipasarkan
                                                        </label>
                                                        <input type="text" name="tanggal"
                                                            id="tanggal" class="form-control"
                                                            id="exampleInputFile" readonly />
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputFile">
                                                            Jumlah produk yang pesanan
                                                        </label>
                                                        <input type="number" name="jumlah"
                                                            id="jumlah" class="form-control"
                                                            id="exampleInputFile"
                                                            placeholder="masukkan jumlah produk yang dibeli" required />
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="Pesan" class="btn btn-primary">
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            {{-- </section> --}}

        </div>
    </div>

    @endsection