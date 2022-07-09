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
        margin-top: 4%;
        margin-left: 9%;
        justify-content: center;
    }

    .lineee {
        width: 92%;
        background-color: #DCDCDC;
    }

    .userline {
        margin-right: 6%;
    }

    .packeagefree {
        /* border: 1px solid red; */
        margin-left: 4%;
        margin-top: 6%;
        justify-content: center;
    }
    .shadowtable{
        box-shadow: 2px 2px 5px 2px red
    }
</style>

<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col-auto col-md-2 col-xl-1 px-sm-0 px-0 bg-danger fixed-top">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                <div class="mt-3"><a class="navbar-brand" href="#pablo">
                        <h4>CloudSite</h4>
                    </a></div>
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
        
        <div class="row packeagefree">
            <div class="col-5 py-3 textline shadowtable" align="center">
                <h3>Package Free</h3>
                <table class="table table-Danger table-striped table-bordered mt-3">
                    @foreach($packagefree as $rowfree)
                    <tr>
                        <td>
                            {{ 'มี URL เป็นของตัวเอง ' }} &nbsp;
                        </td>
                        <td align="center">
                            @if($rowfree->url == 1)
                            <img src="{{ asset('/img/success.png') }}" width="30px">
                            @elseif($rowfree->url == 0)
                            <img src="{{ asset('/img/danger.png') }}" width="30px">
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>
                            {{ 'มีโดเมนเนมเป็นของตัวเอง ' }} &nbsp;
                        </td>
                        <td align="center">
                            @if($rowfree->domain == 1)
                            <img src="{{ asset('/img/success.png') }}" width="30px">
                            @elseif($rowfree->domain == 0)
                            <img src="{{ asset('/img/danger.png') }}" width="30px">
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>{{ "SSL Let's Encrypt " }} &nbsp;</td>
                        <td align="center">
                            @if($rowfree->ssl == 1)
                            <img src="{{ asset('/img/success.png') }}" width="30px">
                            @elseif($rowfree->ssl == 0)
                            <img src="{{ asset('/img/danger.png') }}" width="30px">
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>{{ "Web hosting " }} &nbsp;</td>
                        <td align="center">
                            @if($rowfree->hosting == 1)
                            <img src="{{ asset('/img/success.png') }}" width="30px">
                            @elseif($rowfree->hosting == 0)
                            <img src="{{ asset('/img/danger.png') }}" width="30px">
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>{{ "Respondsive Website " }} &nbsp;</td>
                        <td align="center">
                            @if($rowfree->respondsive == 1)
                            <img src="{{ asset('/img/success.png') }}" width="30px">
                            @elseif($rowfree->respondsive == 0)
                            <img src="{{ asset('/img/danger.png') }}" width="30px">
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>{{ 'จำนวนภาษา' }}</td>
                        <td align="center">{{ $rowfree->language }}</td>
                    </tr>
                    <tr>
                        <td>{{ "โควต้าในการแก้ไขเว็บไซต์ " }} &nbsp;</td>
                        <td align="center">
                            @if($rowfree->quota == 1)
                            <img src="{{ asset('/img/success.png') }}" width="30px">
                            @elseif($rowfree->quota == 0)
                            <img src="{{ asset('/img/danger.png') }}" width="30px">
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>{{ 'จำนวนเมนูทั้งหมดที่มีให้เลือก' }}</td>
                        <td align="center">{{ $rowfree->menu }}</td>
                    </tr>
                    <tr>
                        <td>{{ "ทำ Artwork/Banner ภาพนิ่งสำหรับใช้เว็บไซต์ " }} &nbsp;</td>
                        <td align="center">
                            @if($rowfree->artwork == 1)
                            <img src="{{ asset('/img/success.png') }}" width="30px">
                            @elseif($rowfree->artwork == 0)
                            <img src="{{ asset('/img/danger.png') }}" width="30px">
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>{{ "Re-write Content ในเว็บไซต์ " }} &nbsp;</td>
                        <td align="center">
                            @if($rowfree->content == 1)
                            <img src="{{ asset('/img/success.png') }}" width="30px">
                            @elseif($rowfree->content == 0)
                            <img src="{{ asset('/img/danger.png') }}" width="30px">
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>{{ "โควต้าในการเปลี่ยนข้อมูลและรูปภาพในเว็บไซต์ " }} &nbsp;</td>
                        <td align="center">
                            @if($rowfree->img == 1)
                            <img src="{{ asset('/img/success.png') }}" width="30px">
                            @elseif($rowfree->img == 0)
                            <img src="{{ asset('/img/danger.png') }}" width="30px">
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>{{ "โค้วต้าติด Tracking Code " }} &nbsp;</td>
                        <td align="center">
                            @if($rowfree->img == 1)
                            <img src="{{ asset('/img/success.png') }}" width="30px">
                            @elseif($rowfree->img == 0)
                            <img src="{{ asset('/img/danger.png') }}" width="30px">
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>{{ "ระบบ E-Commerce " }} &nbsp;</td>
                        <td align="center">
                            @if($rowfree->ecommerce == 1)
                            <img src="{{ asset('/img/success.png') }}" width="30px">
                            @elseif($rowfree->ecommerce == 0)
                            <img src="{{ asset('/img/danger.png') }}" width="30px">
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>{{ "ลงข้อมูลสินค้าทั้งหมด " }} &nbsp;</td>
                        <td align="center">
                            @if($rowfree->product == 1)
                            <img src="{{ asset('/img/success.png') }}" width="30px">
                            @elseif($rowfree->product == 0)
                            <img src="{{ asset('/img/danger.png') }}" width="30px">
                            @endif
                        </td>
                    </tr>
                    @endforeach
                    <tr>
                        <td colspan="2" align="center"><button class="btn btn-danger">เลือกแพ็คเกจฟรี</button></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('/js/bootstrap.bundle.min.js') }}"></script>