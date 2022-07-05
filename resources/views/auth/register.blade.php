@extends('layouts.layoutregister')

@section('content')
<style>
    .linee {
        /* border: 1px solid red; */
        margin: 60px 100px 100px 100px;
    }

    .topp {
        border: 1px solid red;
    }
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="" align="center">{{ ('ลงทะเบียนกับ CloudSite') }}</h1>
            <div class="card-body linee">
                <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="row mb-3">
                        <div class="col">
                            <label for="firstname" class="">{{ __('ชื่อ') }}</label>
                            <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{ old('firstname') }}" required autocomplete="firstname" autofocus oninvalid="this.setCustomValidity('กรุณากรอก ชื่อ')" oninput="setCustomValidity('')">
                            @error('firstname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>


                        <div class="col">
                            <label for="lastname" class="">{{ __('นามสกุล') }}</label>
                            <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname" autofocus oninvalid="this.setCustomValidity('กรุณากรอก นามสกุล')" oninput="setCustomValidity('')">

                            @error('lastname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col">
                            <label for="email">{{ __('อีเมล์') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" oninvalid="this.setCustomValidity('กรุณากรอก อีเมล์')" oninput="setCustomValidity('')">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col">
                            <label for="username" class="">{{ __('Username') }}</label>
                            <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" oninvalid="this.setCustomValidity('กรุณากรอก Username')" oninput="setCustomValidity('')">
                            @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>



                    <div class="row mb-3">
                        <div class="col">
                            <label for="password">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" oninvalid="this.setCustomValidity('กรุณากรอก Password')" oninput="setCustomValidity('')">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col">
                            <label for="password-confirm">{{ __('Confirm Password') }}</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col" align="center">
                        @error('checkbox')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <input type="checkbox" name="checkbox" id="checkbox" required oninvalid="this.setCustomValidity('กดติ๊กถูก เพื่อยอมรับนโยบาย')" oninput="setCustomValidity('')">{{ ' ยอมรับข้อกำหนดและเงื่อนไข ' }} <a href="#" style="color: black;">{{ 'นโยบายความเป็นส่วนตัว' }}</a>
                        </div>
                    </div>

                    <div class="row mb-0">
                        <div class="col" align="center">
                            <button type="submit" class="btn btn-danger">{{ ('ลงทะเบียน') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection