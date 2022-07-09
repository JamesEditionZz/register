<link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">

@section('content')

<?php
// echo '<pre>';
// echo print_r($packageID);
// echo '</pre>';
?>

<style>
    .linee {
        /* border: 1px solid red; */
        width: 90%;
        margin-top: 5.5%;
        margin-left: 1%;
    }

    .lineee {
        /* border: 1px solid red; */
        width: 92%;
        background-color: #DCDCDC;
        /* margin-left: 0px; */
    }
    .userline{
        /* border: 1px solid red; */
        margin-right: 6%;
    }
</style>

<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col-auto col-md-2 col-xl-1 px-sm-0 px-0 bg-danger">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
            <div class="mt-3"><a class="navbar-brand" href="#pablo"><h4>CloudSite</h4></a></div>
            <p></p>
                <div class="card" style="width: 7rem;"></div>
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                    <li class="nav-item">
                        <a href="{{ Route('user.index') }}" class="nav-link align-middle px-0 mt-1" style="color: white;">
                            <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('formrequest') }}" class="nav-link px-0 align-middle" style="color: white;">
                            <i class="fs-4 bi-speedometer2"></i><span class="ms-1 d-none d-sm-inline">Formrequest</span></a>
                    </li>
                    <li>
                        <div class="dropdown pb-4">
                            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle mt-2" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                                <span class="d-none d-sm-inline mx-1">Package</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                                <li><a class="dropdown-item" href="{{ Route('packagefree') }}">แพ็คเกจฟรี</a></li>
                                <li><a class="dropdown-item" href="{{ Route('packagemonth') }}">แพ็คเกจรายเดือน</a></li>
                                <li><a class="dropdown-item" href="{{ Route('packageyear') }}">แพ็คเกจรายปี</a></li>
                            </ul>
                        </div>
                    </li>


                </ul>
                <hr>
            </div>
        </div>
        <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent lineee" style="margin: 0px 160px;">
            <div class="container-fluid">
                <div class="navbar-wrapper">
                    <div class="navbar-toggle">
                        <button type="button" class="navbar-toggler">
                            <span class="navbar-toggler-bar bar1"></span>
                            <span class="navbar-toggler-bar bar2"></span>
                            <span class="navbar-toggler-bar bar3"></span>
                        </button>
                    </div>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar navbar-kebab"></span>
                    <span class="navbar-toggler-bar navbar-kebab"></span>
                    <span class="navbar-toggler-bar navbar-kebab"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end userline" id="navigation">
                    <div class="dropdown pb-4 mt-3">
                        <a href="#" class="d-flex align-items-center text-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="https://github.com/mdo.png" alt="hugenerd" width="30" height="30" class="rounded-circle">
                            <span class="d-none d-sm-inline mx-1">{{ Auth::user()->username }}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                            <li><a class="dropdown-item" href="#">New project...</a></li>
                            <li><a class="dropdown-item" href="#">Settings</a></li>
                            <li><a class="dropdown-item" href="#">Profile</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="{{  route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">{{ 'ออกจากระบบ' }}</></a></li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>


        @if($package == '')
        <div class="col py-3 textline" style="background-color: #F8F8FF;">
            <h3 align="center">{{'กรุณาเลือกซื้อแพ็คเกจ'}}</h3>
            <h4 align="center"><a href="{{ Route('packagemonth') }}" style="color: red;">{{'รายละเอียดแพ็คเกจแบบรายเดือน'}}</a>{{' / '}}<a href="{{ Route('packageyear') }}">{{'รายละเอียดแพ็คเกจแบบรายปี'}}</a></h4>
        </div>
        @else
        <div class="col py-3 textline" style="background-color: #F8F8FF;">

            <body>
                <div class="py-1" style="margin-top: 6%;">
                    <h4 align="center">{{'คุณกำลังใช้แพ็คเกจ '}} @foreach ($package as $pack) {{ $pack->price }} @endforeach</h4>
                    <div class="container mt-3">
                        <div class="row mb-3">
                            <div class="col-sm-8">
                                {{'ตัวอย่าง Theme ที่ต้องการ'}}
                                <input type="file" class="form-control" name="logo">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                {{'Logo สำหรับใช้ในเว็บไซต์'}}
                                <input type="file" class="form-control" name="logo">
                            </div>
                            <div class="col-sm-4">
                                {{'ไฟล์ CI (สี,ฟ้อน,การจัดวาง)'}}
                                <input type="file" class="form-control" name="CI">
                            </div>
                            <div class="col-sm-4">
                                {{'รายละเอียดเนื้อหา (ไฟล์ Word)'}}
                                <input type="file" class="form-control" name="word">
                            </div>
                        </div>
                        <div class="py-3">
                            <div class="row">
                                <div class="col-sm-4">
                                    {{'เมนูที่ต้องการ (ไฟล์ Word)'}}
                                    <input type="file" class="form-control" name="menu">
                                </div>
                                <div class="col-sm-4">
                                    {{'รูปสินค้า หรือ บริการ (ไฟล์ JPEG,PNG)'}}
                                    <input type="file" class="form-control" name="product">
                                </div>
                                <div class="col-sm-4">
                                    {{'รายละเอียดสินค้าหรือบริการทั้งหมด (ไฟล์ Word)'}}
                                    <input type="file" class="form-control" name="menu">
                                </div>
                            </div>
                        </div>
                        <div class="py-2">
                            <div class="row">
                                <p>
                                <h4 align="center">{{'สีที่อยากได้และสไตล์ของตัวหนังสือ'}}</h4>
                                </p>
                                <div class="col-sm-2">
                                    <p>{{'สีที่ 1 (สีหลัก 70%)'}}</p>
                                    <input type="color" class="form-control" name="color1">
                                </div>
                                <div class="col-sm-2">
                                    <p>{{'สีที่ 2 (สีรอง 20%)'}}</p>
                                    <input type="color" class="form-control" name="color2">
                                </div>
                                <div class="col-sm-2">
                                    <p>{{'สีที่ 3 (สีรอง 10%)'}}</p>
                                    <input type="color" class="form-control" name="color3">
                                </div>
                                <div class="col-sm-1">

                                </div>
                                <div class="col-sm-4">
                                    <p align="center">{{'สไตล์ตัวหนังสือ'}}</p>
                                    <input type="radio" id="Oswald" name="Font" value="Oswald">
                                    <label for="Oswald">Oswald</label><span style="padding: 30px"></span>
                                    <input type="radio" id="Josefin Sans" name="Font" value="Josefin Sans">
                                    <label for="Josefin Sans">Josefin Sans</label><span style="padding: 30px"></span>
                                    <input type="radio" id="Cardo" name="Font" value="Cardo">
                                    <label for="Cardo">Cardo</label>
                                </div>
                            </div>
                        </div>
                        <div class="py-2">
                            <div class="row">
                                <p>
                                <h4 align="center">{{'Arkwork 1'}}</h4>
                                </p>
                                <div class="col-sm-4">
                                    {{'อธิบายสิ่งที่ต้องการให้มีใน Arkwork'}}
                                    <input type="text" class="form-control" name="aboutark1">
                                </div>
                                <div class="col-sm-4">
                                    {{'ข้อความ Arkwork'}}
                                    <input type="text" class="form-control" name="messageark1">
                                </div>
                                <div class="col-sm-4">
                                    {{'Mood & Tone ของ Arkwork (File ตัวอย่าง)'}}
                                    <input type="file" class="form-control" name="arkfile1">
                                </div>
                            </div>
                        </div>
                        <div class="py-0">
                            <div class="row">
                                <p>
                                <h4 align="center">{{'Arkwork 2'}}</h4>
                                </p>
                                <div class="col-sm-4">
                                    {{'อธิบายสิ่งที่ต้องการให้มีใน Arkwork'}}
                                    <input type="text" class="form-control" name="aboutark2">
                                </div>
                                <div class="col-sm-4">
                                    {{'ข้อความ Arkwork'}}
                                    <input type="text" class="form-control" name="messageark2">
                                </div>
                                <div class="col-sm-4">
                                    {{'Mood & Tone ของ Arkwork (File ตัวอย่าง)'}}
                                    <input type="file" class="form-control" name="arkfile2">
                                </div>
                            </div>
                        </div>
                        <div class="mt-4" align="center">
                            <button class="btn btn-danger">เพิ่มข้อมูล</button>
                        </div>

                    </div>
                </div>
                <br>
            </body>
        </div>
        @endif
    </div>
</div>
<script src="{{ asset('/js/bootstrap.bundle.min.js') }}"></script>