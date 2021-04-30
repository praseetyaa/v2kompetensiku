@extends('template.main')

@section('title', 'Daftar | ')

@section('content')

<section class="my-5">
  <div class="container">
    <div class="row">

      <div class="col-lg-12">
        <div class="info-text">
          	<!--<h4 class="mb-4">Registrasi</h4>-->
			<div class="card rounded-1 shadow-sm border-0">
				<div class="card-header mx-4 bg-transparent text-center py-4 px-0">
                    <img width="200" class="mb-3" src="{{ asset('assets/images/logo/'.setting('site.logo')) }}">
					<h2 class="mb-0">Selamat Datang</h2>
					<p>Untuk dapat menikmati layanan kami<br>Silahkan melakukan pendaftaran dengan mengisi form registrasi di bawah ini 🔔</p>
				</div>
				<div class="card-body">
					<!-- <div class="text-center mb-3">
                    	<a href="{{ asset('assets/docs/TUTORIAL PENDAFTARAN PERSONALITY TALK.pdf') }}" target="_blank" class="btn btn-theme-1 rounded-1"><i class="fa fa-download mr-2"></i> Download Tutorial Pendaftaran Member {{ setting('site.name') }}</a>
                    </div> -->
					<form method="post" action="{{ route('auth.postregister') }}">
						{{ csrf_field() }}
						<input type="hidden" name="ref" value="{{ $_GET['ref'] }}">

						<div class="alert alert-success text-center m-0 mb-3">
							<strong>Biaya Aktivasi:</strong><br>
							<del>Rp. {{ number_format(setting('site.harga_dicoret'),0,'.','.') }}</del><br>
							<h5>Rp {{ number_format(setting('site.biaya_aktivasi'),0,'.','.') }}</h5>
						</div>

						<div class="alert alert-warning text-center m-0 mb-3">
							<strong>Sponsor:</strong> {{ sponsor($_GET['ref']) }}
						</div>

						<p class="h6 text-center font-weight-bold mb-3 mt-5">Identitas Pendaftar</p>

						<div class="form-group row">
							<label class="col-md-2 col-form-label">Nama Lengkap <span class="text-danger">*</span></label>
							<div class="col-md-10">
							  	<input type="text" name="nama_lengkap" class="form-control form-control-sm {{ $errors->has('nama_lengkap') ? 'border-danger' : '' }}" value="{{ old('nama_lengkap') }}">
								@if($errors->has('nama_lengkap'))
								<div class="small text-danger mt-1">{{ ucfirst($errors->first('nama_lengkap')) }}</div>
								@endif
							</div>
						</div>
						<div class="form-group row">
							<label class="col-md-2 col-form-label">Tanggal Lahir <span class="text-danger">*</span></label>
							<div class="col-md-10">
							  	<input type="text" name="tanggal_lahir" class="form-control form-control-sm {{ $errors->has('tanggal_lahir') ? 'border-danger' : '' }}" value="{{ old('tanggal_lahir') }}" placeholder="Contoh: 21/04/1997">
								@if($errors->has('tanggal_lahir'))
								<div class="small text-danger mt-1">{{ ucfirst($errors->first('tanggal_lahir')) }}</div>
								@endif
							</div>
						</div>
						<div class="form-group row">
							<label class="col-md-2 col-form-label">Jenis Kelamin <span class="text-danger">*</span></label>
						  	<div class="col-md-10">
								<div class="form-check">
								  <input class="form-check-input" type="radio" name="jenis_kelamin" id="gender-1" value="L" {{ old('jenis_kelamin') == 'L' ? 'checked' : '' }}>
								  <label class="form-check-label" for="gender-1">
									Laki-Laki
								  </label>
								</div>
								<div class="form-check">
								  <input class="form-check-input" type="radio" name="jenis_kelamin" id="gender-2" value="P" {{ old('jenis_kelamin') == 'P' ? 'checked' : '' }}>
								  <label class="form-check-label" for="gender-2">
									Perempuan
								  </label>
								</div>
								@if($errors->has('jenis_kelamin'))
								<div class="small text-danger mt-1">{{ ucfirst($errors->first('jenis_kelamin')) }}</div>
								@endif
							</div>
						</div>
						<div class="form-group row">
							<label class="col-md-2 col-form-label">Nomor HP <span class="text-danger">*</span></label>
						  	<div class="col-md-10">
							  	<input type="text" name="nomor_hp" class="form-control form-control-sm {{ $errors->has('nomor_hp') ? 'border-danger' : '' }}" value="{{ old('nomor_hp') }}">
								@if($errors->has('nomor_hp'))
								<div class="small text-danger mt-1">{{ ucfirst($errors->first('nomor_hp')) }}</div>
								@endif
							</div>
						</div>


					  	<p class="h6 text-center font-weight-bold mb-3 mt-5">Akun Pendaftar</p>

						<div class="form-group row">
							<label class="col-md-2 col-form-label">Email <span class="text-danger">*</span></label>
						  	<div class="col-md-10">
							  	<input type="email" name="email" class="form-control form-control-sm {{ $errors->has('email') ? 'border-danger' : '' }}" value="{{ old('email') }}">
								@if($errors->has('email'))
								<div class="small text-danger mt-1">{{ ucfirst($errors->first('email')) }}</div>
								@endif
							</div>
						</div>
						<div class="form-group row">
							<label class="col-md-2 col-form-label">Username <span class="text-danger">*</span></label>
						  	<div class="col-md-10">
							  	<input type="text" name="username" class="form-control form-control-sm {{ $errors->has('username') ? 'border-danger' : '' }}" value="{{ old('username') }}">
								@if($errors->has('username'))
								<div class="small text-danger mt-1">{{ ucfirst($errors->first('username')) }}</div>
								@endif
							</div>
						</div>
						<div class="form-group row mt-2">
						  	<label class="col-md-2 col-form-label">Password <span class="text-danger">*</span></label>
						  	<div class="col-md-10">
                                <div class="input-group">
								  	<input type="password" name="password" class="form-control form-control-sm {{ $errors->has('password') ? 'border-danger' : '' }}">
                                    <div class="input-group-append">
                                        <a href="#" class="input-group-text text-dark btn btn-toggle-password {{ $errors->has('password') ? 'border-danger' : 'bg-theme-1 text-white' }}"><i class="fa fa-eye"></i></a>
                                    </div>
                                </div>
								@if($errors->has('password'))
								<div class="small text-danger mt-1">{{ ucfirst($errors->first('password')) }}</div>
								@endif
							</div>
						</div>
						<div class="form-group row mt-2">
						  	<label class="col-md-2 col-form-label">Ulangi Password <span class="text-danger">*</span></label>
						  	<div class="col-md-10">
                                <div class="input-group">
							  		<input type="password" name="password_confirmation" class="form-control form-control-sm {{ $errors->has('password') ? 'border-danger' : '' }}">
                                    <div class="input-group-append">
                                        <a href="#" class="input-group-text text-dark btn btn-toggle-password {{ $errors->has('password') ? 'border-danger' : 'bg-theme-1 text-white' }}"><i class="fa fa-eye"></i></a>
                                    </div>
                                </div>
						  	</div>
						</div>
						<div class="form-group row mt-2">
							<div class="col-md-2"></div>
							<div class="col-md-10">
								<button type="submit" class="btn btn-theme-1 rounded-1"><i class="fa fa-check mr-1"></i> Daftar</button>
							</div>
						</div>
					  </div>
					</form>
				</div>
			</div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection

@section('js-extra')

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous"></script>
<script>
	// Datepicker
	$(document).ready(function(){
		$("input[name=tanggal_lahir]").datepicker({
			format: 'dd/mm/yyyy',
			autoclose: true,
			todayHighlight: true,
		});
	});

    // Button Toggle Password
    $(document).on("click", ".btn-toggle-password", function(e){
        e.preventDefault();
        if(!$(this).hasClass("show")){
            $(this).parents(".form-group").find("input[type=password]").attr("type","text");
            $(this).find(".fa").removeClass("fa-eye").addClass("fa-eye-slash");
            $(this).addClass("show");
        }
        else{
            $(this).parents(".form-group").find("input[type=text]").attr("type","password");
            $(this).find(".fa").removeClass("fa-eye-slash").addClass("fa-eye");
            $(this).removeClass("show");
        }
    });
</script>

@endsection

@section('css-extra')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw==" crossorigin="anonymous" />
<style type="text/css">
  body{background-color: var(--light)}
  form .h6:before, form .h6:after {content: '---';}
  label {font-size: .875rem;}
</style>

@endsection