@extends('layouts.cloudsite')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="mt-5">
                <div class="body">
                    @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        {{ __('CloudSite ได้ส่งลิงค์ยืนยันใหม่ไปยังที่อยู่อีเมลของคุณแล้ว.') }}
                    </div>
                    @endif
                    <div class="logo1 text-center">
                        <a><img src="{{ asset('/img/00200.svg') }}" alt="" width="400"></a>
                    </div>
                    <h3 class=" text-center mt-3">ลงทะเบียนสำเร็จ!</h3>
                    <p class="text-center">Cloud Site ได้ทำการส่ง Verification Email ไปที่ : {{'(คุณจะได้รับอีเมลภายใน24 ชั่วโมง)'}}
                        <br> กรุณากด Url ในอีเมลเพื่อยืนยันตัวตน และทำการ log-in เพื่อเข้าสู่ระบบ
                    </p>
                    {{$cof = session()->get('$conf')}}
                    <div class=" text-center mt-5 ">
                    </div>
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <div align="center">
                            <button type="submit" class="btn btn-danger" style="width: 150px; height: 50px; font-size: 17px">{{ ('ส่งอีเมลอีกครั้ง') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection