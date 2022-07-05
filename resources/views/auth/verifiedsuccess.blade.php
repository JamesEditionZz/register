@extends('layouts.cloudsite')

@section('content')

<div class=" mt-10  " >
            <div class="container">
              <div class="row">
                <div class="master p-5 mx-auto col-md-8 col-10">
                    <div class="logo1 text-center">
                        <a><img src="{{ asset('/img/00200.svg') }}" alt="" width="300"></a>
                    </div>
                  <h3 class=" text-center mt-4">ยืนยันตัวตนสำเร็จ!</h3>
                    <div class=" text-center mt-5 ">
                        <button class="btn btn-danger" style="width: 120px; height:60px; font-size: 18px" onclick="outlog()">เข้าสู่ระบบ</button>
                      </div>
                      <form id="out" action="{{ route('verifiedsuccessout') }}" method="POST" class="d-none">
                              @csrf
                      </form>
                </div>
              </div>
            </div>
        </div>
        <script>
          function outlog() {
            document.getElementById('out').submit();
          }
        </script>
@endsection