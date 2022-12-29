@extends('layouts.app')

@section('content')
<div class="container" >
    <div class="row justify-content-center align-items-center" style=" height: 70vh;" >
        <div class="col-md-6"  style="background-color:transparent;">

            <div class="card "  style="background-color:transparent;">



                <div class="card-body"  style="background-color:transparent;">
                    <form method="POST" action="{{ route('login') }}" class="py-5" style="background-color:transparent  ;">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-2 col-form-label text-md-right"></label>

                            <div class="col-md-8">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus placeholder="Emailni kiriting">

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-2 col-form-label text-md-right"></label>

                            <div class="col-md-8" style="position: relative;">
                                <input id="paroldur" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="parolni kiriting">
                                <i class="fas fa-eye" id="iconcadur" style=" position: absolute; z-index: 100; top:50%; right: 30px; transform: translateY(-50%);   cursor: pointer;"></i>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



                        <div class="form-group row mb-0">
                            <div class="col-md-10">
                                <button type="submit" class="btn btn-primary px-5 ml-auto d-block">
                                    {{ __('Login') }}
                                </button>


                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
