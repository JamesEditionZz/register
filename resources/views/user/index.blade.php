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
        width: 91.5%;
        margin-left: 0px;
    }

    .lineee {
        border: 1px solid red;
        /* width: 91.5%;
        margin-left: 0px; */
    }
</style>

<div class="container-fluid">
    <div class="row flex-nowrap" style="background-color: #F5F5F5;">
        <div class="col-auto col-md-2 col-xl-1 px-sm-0 px-0 bg-danger">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                <div class="dropdown pb-4 mt-3">
                    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
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
        @if($packageID == '0')
        <div class="col py-3 textline mt-5">
            <h3 align="center">{{'กรุณาเลือกซื้อแพ็คเกจ'}}</h3>
            <h4 align="center"><a href="{{ Route('packagemonth') }}" style="color: red;">{{'รายละเอียดแพ็คเกจแบบรายเดือน'}}</a>{{' / '}}<a href="{{ Route('packageyear') }}">{{'รายละเอียดแพ็คเกจแบบรายปี'}}</a></h4>
        </div>
        @else
        <div class="row linee">
            <div class="col-lg-3 col-md-6 col-sm-6 mt-3">
                <div class="card card-stats">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5 col-md-4">
                                <div class="icon-big text-center icon-warning">
                                <i class="fas fa-camera fa-10x"></i>
                                </div>
                            </div>
                            <div class="col-7 col-md-8">
                                <div class="numbers">
                                    <p class="card-category" align="right">เหลือพื้นที่</p>
                                    <p class="card-title" align="right">150GB
                                    </p>
                                    <p>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                            <i class="fa fa-refresh"></i> Update Now
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3 py-5 textline" align="center">
                <h4>แพ็คเกจที่คุณใช้งานอยู่ตอนคือ
                    <table class="table table-striped mt-3">

                        @foreach($package as $pack)
                        @if($pack->price == 'Free')
                        <tr>
                            <td align="center">
                                <h4>{{'แพ็คเกจ '}}{{ $pack->price }}</h4>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>
                                {{ 'มี URL เป็นของตัวเอง ' }} &nbsp;
                            </td>
                            <td align="center">
                                @if($pack->url == 1)
                                <img src="{{ asset('/img/success.png') }}" width="30px">
                                @elseif($pack->url == 0)
                                <img src="{{ asset('/img/danger.png') }}" width="30px">
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>
                                {{ 'มีโดเมนเนมเป็นของตัวเอง ' }} &nbsp;
                            </td>
                            <td align="center">
                                @if($pack->domain == 1)
                                <img src="{{ asset('/img/success.png') }}" width="30px">
                                @elseif($pack->domain == 0)
                                <img src="{{ asset('/img/danger.png') }}" width="30px">
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>{{ "SSL Let's Encrypt " }} &nbsp;</td>
                            <td align="center">
                                @if($pack->ssl == 1)
                                <img src="{{ asset('/img/success.png') }}" width="30px">
                                @elseif($pack->ssl == 0)
                                <img src="{{ asset('/img/danger.png') }}" width="30px">
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>{{ "Web hosting " }} &nbsp;</td>
                            <td align="center">
                                @if($pack->hosting == 1)
                                <img src="{{ asset('/img/success.png') }}" width="30px">
                                @elseif($pack->hosting == 0)
                                <img src="{{ asset('/img/danger.png') }}" width="30px">
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>{{ "Respondsive Website " }} &nbsp;</td>
                            <td align="center">
                                @if($pack->respondsive == 1)
                                <img src="{{ asset('/img/success.png') }}" width="30px">
                                @elseif($pack->respondsive == 0)
                                <img src="{{ asset('/img/danger.png') }}" width="30px">
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>{{ 'จำนวนภาษา' }}</td>
                            <td align="center">{{ $pack->language }}</td>
                        </tr>
                        <tr>
                            <td>{{ "โควต้าในการแก้ไขเว็บไซต์ " }} &nbsp;</td>
                            <td align="center">
                                @if($pack->quota == 1)
                                <img src="{{ asset('/img/success.png') }}" width="30px">
                                @elseif($pack->quota == 0)
                                <img src="{{ asset('/img/danger.png') }}" width="30px">
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>{{ 'จำนวนเมนูทั้งหมดที่มีให้เลือก' }}</td>
                            <td align="center">{{ $pack->menu }}</td>
                        </tr>
                        <tr>
                            <td>{{ "ทำ Artwork/Banner ภาพนิ่งสำหรับใช้เว็บไซต์ " }} &nbsp;</td>
                            <td align="center">
                                @if($pack->artwork == 1)
                                <img src="{{ asset('/img/success.png') }}" width="30px">
                                @elseif($pack->artwork == 0)
                                <img src="{{ asset('/img/danger.png') }}" width="30px">
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>{{ "Re-write Content ในเว็บไซต์ " }} &nbsp;</td>
                            <td align="center">
                                @if($pack->content == 1)
                                <img src="{{ asset('/img/success.png') }}" width="30px">
                                @elseif($pack->content == 0)
                                <img src="{{ asset('/img/danger.png') }}" width="30px">
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>{{ "โควต้าในการเปลี่ยนข้อมูลและรูปภาพในเว็บไซต์ " }} &nbsp;</td>
                            <td align="center">
                                @if($pack->img == 1)
                                <img src="{{ asset('/img/success.png') }}" width="30px">
                                @elseif($pack->img == 0)
                                <img src="{{ asset('/img/danger.png') }}" width="30px">
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>{{ "โค้วต้าติด Tracking Code " }} &nbsp;</td>
                            <td align="center">
                                @if($pack->img == 1)
                                <img src="{{ asset('/img/success.png') }}" width="30px">
                                @elseif($pack->img == 0)
                                <img src="{{ asset('/img/danger.png') }}" width="30px">
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>{{ "ระบบ E-Commerce " }} &nbsp;</td>
                            <td align="center">
                                @if($pack->ecommerce == 1)
                                <img src="{{ asset('/img/success.png') }}" width="30px">
                                @elseif($pack->ecommerce == 0)
                                <img src="{{ asset('/img/danger.png') }}" width="30px">
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>{{ "ลงข้อมูลสินค้าทั้งหมด " }} &nbsp;</td>
                            <td align="center">
                                @if($pack->product == 1)
                                <img src="{{ asset('/img/success.png') }}" width="30px">
                                @elseif($pack->product == 0)
                                <img src="{{ asset('/img/danger.png') }}" width="30px">
                                @endif
                            </td>
                        </tr>

                        <!-- statement James -->
                        @elseif($pack->price != 'Free')
                        <tr>
                            <td align="center">
                                <h4>{{ $pack->price }}{{' บาท'}}{{' / '}} {{$pack->mm}}</h4>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>
                                {{ 'มี URL เป็นของตัวเอง ' }} &nbsp;
                            </td>
                            <td align="center">
                                @if($pack->url == 1)
                                <img src="{{ asset('/img/success.png') }}" width="30px">
                                @elseif($pack->url == 0)
                                <img src="{{ asset('/img/danger.png') }}" width="30px">
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>
                                {{ 'มีโดเมนเนมเป็นของตัวเอง ' }} &nbsp;
                            </td>
                            <td align="center">
                                @if($pack->domain == 1)
                                <img src="{{ asset('/img/success.png') }}" width="30px">
                                @elseif($pack->domain == 0)
                                <img src="{{ asset('/img/danger.png') }}" width="30px">
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>{{ "SSL Let's Encrypt " }} &nbsp;</td>
                            <td align="center">
                                @if($pack->ssl == 1)
                                <img src="{{ asset('/img/success.png') }}" width="30px">
                                @elseif($pack->ssl == 0)
                                <img src="{{ asset('/img/danger.png') }}" width="30px">
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>{{ "Web hosting " }} &nbsp;</td>
                            <td align="center">{{ $pack->hosting }}</td>
                        </tr>
                        <tr>
                            <td>{{ "Respondsive Website " }} &nbsp;</td>
                            <td align="center">
                                @if($pack->respondsive == 1)
                                <img src="{{ asset('/img/success.png') }}" width="30px">
                                @elseif($pack->respondsive == 0)
                                <img src="{{ asset('/img/danger.png') }}" width="30px">
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>{{ 'จำนวนภาษา' }}</td>
                            <td align="center">{{ $pack->language }}</td>
                        </tr>
                        <tr>
                            <td>{{ "โควต้าในการแก้ไขเว็บไซต์ " }} &nbsp;</td>
                            <td align="center">{{ $pack->quota }}</td>
                        </tr>
                        <tr>
                            <td>{{ 'จำนวนเมนูทั้งหมดที่มีให้เลือก' }}</td>
                            <td align="center">{{ $pack->menu }}</td>
                        </tr>
                        <tr>
                            <td>{{ "ทำ Artwork/Banner ภาพนิ่งสำหรับใช้เว็บไซต์ " }} &nbsp;</td>
                            <td align="center">{{ $pack->artwork }}</td>
                        </tr>
                        <tr>
                            <td>{{ "Re-write Content ในเว็บไซต์ " }} &nbsp;</td>
                            <td align="center">{{ $pack->content }}</td>
                        </tr>
                        <tr>
                            <td>{{ "โควต้าในการเปลี่ยนข้อมูลและรูปภาพในเว็บไซต์ " }} &nbsp;</td>
                            <td align="center">{{ $pack->img }}</td>
                        </tr>
                        <tr>
                            <td>{{ "โค้วต้าติด Tracking Code " }} &nbsp;</td>
                            <td align="center">{{ $pack->tracking }}</td>
                        </tr>
                        <tr>
                            <td>{{ "ระบบ E-Commerce " }} &nbsp;</td>
                            <td align="center">
                                @if($pack->ecommerce == 1)
                                <img src="{{ asset('/img/success.png') }}" width="30px">
                                @elseif($pack->ecommerce == 0)
                                <img src="{{ asset('/img/danger.png') }}" width="30px">
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>{{ "ลงข้อมูลสินค้าทั้งหมด " }} &nbsp;</td>
                            @if($pack->product == 0)
                            <td align="center">
                                @if($pack->product == 1)
                                <img src="{{ asset('/img/success.png') }}" width="30px">
                                @elseif($pack->product == 0)
                                <img src="{{ asset('/img/danger.png') }}" width="30px">
                                @endif
                            </td>
                            @elseif($pack->product != 0)
                            <td align="center">{{ $pack->product }}</td>
                            @endif
                        </tr>
                        @endif
                        @endforeach
                    </table>
                </h4>
            </div>
            <div class="col mt-5">
                {{'test'}}
            </div>
        </div>
    </div>
    @endif
</div>
</div>
<script src="{{ asset('/js/bootstrap.bundle.min.js') }}"></script>