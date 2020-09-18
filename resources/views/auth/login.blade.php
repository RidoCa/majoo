@extends('layout.login')
@section('isilogin')
<style type="text/css">
#bg {
  min-height: 100%;
  min-width: 1024px;

  /* Set up proportionate scaling */
  width: 100%;
  height: auto;

  /* Set up positioning */
  position: fixed;
  top: 0;
  left: 0;
}
</style>

<div class="page login-page" style="background-color: rgb(0, 107, 117)">
  {{-- <img src="img/1.png" id="bg"> --}}
    <div class="container">
        @if(session('sukses'))
        <div class="alert alert-success" role="alert">
            {{session('sukses')}}
        </div>
        @elseif(session('update'))
        <div class="alert alert-warning" role="alert">
            {{session('update')}}
        </div>
        @elseif(session('delete'))
        <div class="alert alert-danger" role="alert">
            {{session('delete')}}
        </div>
        @endif
        <div class="row">
          <div class="col-md-8" style="text-align: center;">
            <!-- <div class="form-outer text-center d-flex align-items-center">  -->
            <img src="https://majoo.id/assets/download/logo_icon/majoo_logo_icon_4.png" style="width: 250px; height: 250px; margin-top: 170px;margin-bottom: 30px">
            <div class="logo text-uppercase" style=" color: white">
              <h3>Sistem Informasi dan Katalog</h3>
              <h3>Majoo</h3>
            </div>
            <!-- </div> -->
          </div>
          <div class="col-lg-4" >
            <div class="form-inner" style="margin-top: 150px; margin-bottom: 150px;">
              <div class="logo" style="text-align: center; color: rgb(0, 107, 117)"><strong>Selamat Datang</strong></div>
              <p style="text-align: center; color: black">Silahkan lakukan proses login terlebih dahulu menggunakkan username email dan password terdaftar. Apabila menemukan
                kesulitan atau permasalahan silahkan hubungi Admin</p>
              <form class="text-left form-validate" role="form" action="/postlogin" method="POST">
                {{csrf_field()}}
                <div class="form-group-material">
                    <input id="email" type="email" name="email" required data-msg="Masukkan email anda"
                        class="input-material">
                    <label for="login-email" class="label-material">Email</label>
                </div>
                <div class="form-group-material">
                    <input id="password" type="password" name="password" required data-msg="Masukkan password anda"
                        class="input-material">
                    <label for="login-password" class="label-material">Password</label>
                </div>
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-primary">
                        Masuk
                    </button>
                    <!-- This should be submit button but I replaced it with <a> for demo purposes-->
                </div>
            </form>
            <p style="text-align: center">Belum punya akun? daftar <a href="/regis">disini</a> </p>
            </div>
          </div>
        </div>
      </div>
</div>
@endsection
