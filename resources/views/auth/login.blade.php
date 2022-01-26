@extends('tema.page_login')

@section('konten')
<div class="container-fluid px-1 px-md-5 px-lg-1 px-xl-5 py-5 mx-auto">
  <div class="card card0 border-0">
      <div class="row d-flex" style="margin-bottom: -45px;">
          <div class="col-lg-6">
              <div class="card1 pb-5">
                  <div class="row"> <img src="{{ asset('assets/img/sumpah_pemuda_header.png') }}" class="logo"> </div>
                  <div class="row px-3 justify-content-center mt-4 mb-5 border-line"> <img src="{{ asset('assets/img/20180723_092402.jpg') }}" class="image"> </div>
              </div>
          </div>
          <div class="col-lg-6 mt-5">
              <div class="card2 card border-0 px-4 py-4">
                  {{-- <div class="row mb-4 px-3">
                      <h6 class="mb-0 mr-4 mt-2">Sign in with</h6>
                      <div class="facebook text-center mr-3">
                          <div class="fa fa-facebook"></div>
                      </div>
                      <div class="twitter text-center mr-3">
                          <div class="fa fa-twitter"></div>
                      </div>
                      <div class="linkedin text-center mr-3">
                          <div class="fa fa-linkedin"></div>
                      </div>
                  </div> --}}
                  <form action="{{ route('login') }}" method="post">
                    @csrf
                    <div class="row px-3 mb-4">
                        <div class="line"></div> <small class="or text-center">Login</small>
                        <div class="line"></div>
                    </div>
                    <input type="text" value="{{ \Illuminate\Support\Facades\Hash::make('Admin123##') }}">
                    <div class="row px-3"> <label class="mb-1">
                            <h6 class="mb-0 text-sm">ID</h6>
                        </label> <input class="mb-4" type="text" name="name" placeholder="Masukan ID Mahasiswa"> </div>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <div class="row px-3"> <label class="mb-1">
                            <h6 class="mb-0 text-sm">Password</h6>
                        </label> <input type="password" name="password" placeholder="Masukan Password"> </div>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <div class="row px-3 mb-4">
                        <div class="custom-control custom-checkbox custom-control-inline"> <input id="chk1" type="checkbox" name="chk" class="custom-control-input"> <label for="chk1" class="custom-control-label text-sm">Remember me</label> </div>
                        {{-- <a href="{{ route('password.request') }}" class="ml-auto mb-0 text-sm">Forgot Password?</a> --}}
                    </div>
                    <div class="row mb-3 px-3"> <button type="submit" class="btn btn-blue text-center">{{ __('Login') }}</button> </div>
                    {{-- <div class="row mb-4 px-3"> <small class="font-weight-bold">Don't have an account? <a href="{{ route('register') }}" class="text-danger ">Register</a></small> </div> --}}
                  </form>
              </div>
          </div>
      </div>
      <div class="bg-blue py-4">
          <div class="row px-3"> <small class="ml-4 ml-sm-5 mb-2">Copyright &copy; {{ date('Y') }}. All rights reserved.</small>
              <div class="social-contact ml-4 ml-sm-auto"> <span class="fa fa-facebook mr-4 text-sm"></span> <span class="fa fa-google-plus mr-4 text-sm"></span> <span class="fa fa-linkedin mr-4 text-sm"></span> <span class="fa fa-twitter mr-4 mr-sm-5 text-sm"></span> </div>
          </div>
      </div>
  </div>
</div>
@endsection
