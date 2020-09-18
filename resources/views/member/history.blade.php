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
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4>Data Produk Majoo</h4><br>
                    <p>Halaman ini akan menampilkan data Produk majoo yang telah dipesan oleh customer.</p>
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="table_id" cellspacing="0" width="100%">
                    <thead>
                        <tr style="text-align: center">
                            <th>No</th>
                            <th>Nama Produk</th>
                            <th>Harga Produk</th>
                            <th>Jumlah</th>
                            <th>Total Biaya</th>
                            <th>Nama Pemesan</th>
                            <th>Tanggal Pesan</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataProduct as $key => $daduk)
                        @if($dataProduct!=null)
                        <tr style="text-align: center;">
                            <th scope="row">{{$key+1}}</th>
                            <td>{{$daduk->produkPesanan->nama}}</td>
                            <td>Rp: {{$daduk->produkPesanan->harga}}</td>
                            <td>{{$daduk->jumlah}}</td>
                            <td>Rp: {{($daduk->jumlah)*($daduk->produkPesanan->harga)}}</td>
                            <td>{{$daduk->userPesanan->name}}</td>
                            <td>{{\Carbon\Carbon::parse($daduk->create_at)->format('j F, Y')}}</td>
                                @if($daduk->status==0)
                                <td>Belum Diproses</td>
                                @else
                                <td>Sudah Diproses</td>
                                @endif
                            @endif
                            @endforeach
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>

    </div>
    <div class="modal fade" id="productnew" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">
                        Tambah Data Produk Baru
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
                                        <h4>Form Data Produk Baru</h4>
                                    </div>
                                    <div class="card-body">
                                        <p>Harap isikan data produk yang sesuai dan tepat</p>
                                        <form role="form" action="/produkbaru" method="POST"
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
                                                            required />
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputFile">
                                                            Harga
                                                        </label>
                                                        <input type="number" name="harga" id="harga"
                                                            class="form-control" id="exampleInputFile"
                                                            placeholder="masukkan harga produk" required />
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputFile">
                                                            Narasi Singkat Produk
                                                        </label>
                                                        <input type="text" name="deskripsi_singkat"
                                                            id="deskripsi_singkat" class="form-control"
                                                            id="exampleInputFile"
                                                            placeholder="masukkan narasi singkat produk" required />
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputFile">
                                                            Foto Produk
                                                        </label>
                                                        <input type="file" class="form-control-file" id="foto_produk"
                                                            name="foto_produk" required />
                                                        <p class="help-block">
                                                            Unggah foto produk disini.
                                                        </p>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputFile">
                                                            Deskripsi
                                                        </label>
                                                        <textarea class="form-control" name="deskripsi" id="deskripsi"
                                                            required cols="30" rows="10"
                                                            placeholder="Hasil Rapat"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <input type="submit" value="Simpan" class="btn btn-primary">
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            {{-- </section> --}}

        </div>
        <div class="modal-footer">

            {{-- <button type="button" class="btn btn-primary">
              Save changes
            </button>  --}}
            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                Close
            </button>
        </div>
    </div>
    
    <div class="modal fade" id="editprod" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">
                        Edit Data Produk
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
                                        <h4>Form Data Edit Produk</h4>
                                    </div>
                                    <div class="card-body">
                                        <p>Harap isikan data produk yang sesuai dan tepat</p>
                                        <form role="form" action="/produkupdate" method="POST"
                                            enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputFile">
                                                            Nama Produk
                                                        </label>
                                                        <input type="text" name="name2" id="name2" class="form-control"
                                                            id="exampleInputFile" placeholder="masukkan nama produk"
                                                            required />
                                                            <input type="hidden" name="id_produk" id="id_produk">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputFile">
                                                            Harga
                                                        </label>
                                                        <input type="number" name="harga2" id="harga2"
                                                            class="form-control" id="exampleInputFile"
                                                            placeholder="masukkan harga produk" required />
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputFile">
                                                            Narasi Singkat Produk
                                                        </label>
                                                        <input type="text" name="deskripsi_singkat2"
                                                            id="deskripsi_singkat2" class="form-control"
                                                            id="exampleInputFile"
                                                            placeholder="masukkan narasi singkat produk" required />
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputFile">
                                                            Foto Produk
                                                        </label>
                                                        <input type="file" class="form-control-file" id="foto_produk2"
                                                            name="foto_produk2" required />
                                                        <p class="help-block">
                                                            Unggah foto produk disini.
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputFile">
                                                            Deskripsi
                                                        </label>
                                                        <textarea class="form-control" name="deskripsi2" id="deskripsi2"
                                                            required cols="30" rows="10"
                                                            placeholder="Hasil Rapat"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <input type="submit" value="Simpan" class="btn btn-primary">
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            {{-- </section> --}}

        </div>
        <div class="modal-footer">

            {{-- <button type="button" class="btn btn-primary">
              Save changes
            </button>  --}}
            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                Close
            </button>
        </div>
    </div>

    @endsection