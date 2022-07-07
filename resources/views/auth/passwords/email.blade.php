@extends('layouts.layoutresetpassword')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="header" style="margin-top: 120px;">
                <h1 align="center">{{ ('กรุณากรอก Email ที่คุณได้ลงทะเบียนไว้') }}</h1>
            </div>

            <div class="body mt-5">
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <div class="row">
                        <label for="email" class="">{{ ('Email') }}</label>
                        <div class="col mt-2">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mt-5">
                        <div class="col" align="center">
                            <button type="submit" class="btn btn-danger" style="width: 150px; height: 40px">
                                {{ ('ส่งอีเมล์') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection