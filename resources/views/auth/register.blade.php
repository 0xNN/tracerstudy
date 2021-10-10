
@extends('tema.log_reg')

@section('konten')
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">REGISTER!</h1>
                  </div>
                  <form class="user" method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="form-group">

                            <input id="name" type="text" placeholder= "nama" class="form-control form-control-user @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                    </div>
                    <div class="form-group">
                        <input id="email" type="email" placeholder= "email" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                      <input type="password" name="password" class="form-control form-control-user @error('password') is-invalid @enderror" id="password"
                      placeholder="Password" required autocomplete="new-password">

                      @error('password')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                        @enderror

                    </div>
                    <div class="form-group">
                        <input type="password" name="password_confirmation" class="form-control form-control-user" id="password-confirm"
                        placeholder="Password Confirmation" required autocomplete="new-password">
                      </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                        {{ __('Register') }}
                    </button>
                    <hr>
                  </form>
                </div>
              </div>

@endsection
