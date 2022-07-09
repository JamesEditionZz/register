@extends('layouts.login')

@section('content')
<div class="container">
    <div class="row justify-content-center" style="margin: 0px 100px 0px 100px;">
        <div class="col-md-8">
            <div class="header mt-5" align="center">
                <h1>{{ ('เข้าสู่ระบบ Cloud Site') }}</h1>
            </div>

            <div class="card-body mt-5">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    @if ($message = Session::get('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>{{ $message }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    <div class="row mb-5">
                        <label for="username">{{ __('Username') }}</label>

                        <div class="col">
                            <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                            @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-5">
                        <label for="password">{{ __('Password') }}</label>

                        <div class="col">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="">
                        @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}" style="color:black">
                            {{ __('ลืม Password') }}
                        </a>
                        @endif
                    </div>

                    <div class="row mt-5" align="center">
                        <div class="col">
                            <button type="submit" class="btn btn-danger" style="width: 110px; height: 50px; font-size: 17px">
                                {{ __('เข้าสู่ระบบ') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection