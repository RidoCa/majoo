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
    

<div class="page login-page" >
  <img src="https://lh3.googleusercontent.com/ADWf8fuUA-LSp_OQDXlwu7srJkbZ-4FxneTfkEPUiMmvAnZ8-UqInSDdSNkHy29GtMtv" id="bg">

    <div class="container">
        <div class="form-outer text-center d-flex align-items-center">
            <div class="form-inner">
                <div class="logo text-uppercase"><span>Form</span><strong class="text-primary">Registrasi</strong></div>
                <p>Silahkan isi form dibawah ini dengan data diri anda. Apabila menemukan
                    kesulitan atau permasalahan silahkan hubungi admin</p>
                    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            {{ $error }}
                            @endforeach
                        </ul>
                    </div>
                    @endif
                <form class="text-left form-validate" role="form" action="/postregis" method="POST">
                    {{csrf_field()}}
                    <div class="form-group-material">
                        <input id="name" type="text" name="name" required data-msg="Silahkan masukkan nama anda"
                            class="input-material">
                        <label for="register-name" class="label-material">Nama Lengkap</label>
                    </div>
                    <div class="form-group-material">
                        <input id="email" type="email" name="email" required data-msg="Masukkan alamat email yang valid"
                            class="input-material">
                        <label for="register-email" class="label-material">Alamat Email</label>
                    </div>
                    <div class="form-group-material">
                        <input id="password" type="password" name="password" required data-msg="Masukkan password anda"
                            class="input-material">
                        <label for="register-email" class="label-material">Password</label>
                    </div>
                    <div class="form-group terms-conditions text-center">
                        <input id="register-agree" name="registerAgree" type="checkbox" required value="1"
                            data-msg="Your agreement is required" class="form-control-custom">
                        <label for="register-agree">Saya yakin data yang dimasukkan benar</label>
                        <input type="hidden" name="role" id="role" value="member">
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary">
                            Submit
                        </button>
                    </div>
                </form><small>Sudah mempunyai akun? </small><a href="/login" class="signup">Masuk</a>

            </div>
            <div class="copyrights text-center">
                 <a href="#" class="external"><p>Design by 2020</a></p>
                <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
            </div>
        </div>
    </div>
</div>
@endsection