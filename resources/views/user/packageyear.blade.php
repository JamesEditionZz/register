<link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">
@section('content')

<?php
$packageA = $packageH;
$packageB = $packageI;
$packageC = $packageJ;
$packageD = $packageK;
$packageE = $packageL;
$packageF = $packageM;
?>

<style>
    .linee {
        /* border: 1px solid red; */
        width: 90%;
        justify-content: center;
    }
    .linee2{
        justify-content: center;
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
                        <!-- <li><a class="dropdown-item" href="#">New project...</a></li>
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li> -->
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
                        <a href="{{ Route('user.index') }}" class="nav-link align-middle px-0" style="color: white;">
                            <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('formrequest') }}" class="nav-link px-0 align-middle" style="color: white;">
                            <i class="fs-4 bi-speedometer2"></i><span class="ms-1 d-none d-sm-inline">Formrequest</span></a>
                    </li>
                    <li>
                        <div class="dropdown pb-4 mt-2">
                            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
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
        <div class="row mt-5 linee">
            <h3 align="center">แพ็คเกจรายเดือน</h3>
            <div class="col-30 py-5 textline">
                <table class="table table-striped">
                    @foreach($packageA as $rowA)
                    <tr align="center">
                        <td align="center" colspan="1">
                            <h2>{{ $rowA->price}}{{' / '}}{{ $rowA->mm }}</h2>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>
                            {{ 'มี URL เป็นของตัวเอง ' }} &nbsp;
                        </td>
                        <td>
                            @if($rowA->url == 1)
                            <img src="{{ asset('/img/success.png') }}" width="30px">
                            @elseif($rowA->url == 0)
                            <img src="{{ asset('/img/danger.png') }}" width="30px">
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>
                            {{ 'มีโดเมนเนมเป็นของตัวเอง ' }} &nbsp;
                        </td>
                        <td>
                            @if($rowA->domain == 1)
                            <img src="{{ asset('/img/success.png') }}" width="30px">
                            @elseif($rowA->domain == 0)
                            <img src="{{ asset('/img/danger.png') }}" width="30px">
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>{{ "SSL Let's Encrypt " }} &nbsp;</td>
                        <td>
                            @if($rowA->ssl == 1)
                            <img src="{{ asset('/img/success.png') }}" width="30px">
                            @elseif($rowA->ssl == 0)
                            <img src="{{ asset('/img/danger.png') }}" width="30px">
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>{{ "Web hosting " }}</td>
                        <td>{{ "$rowA->hosting " }}</td>
                    </tr>
                    <tr>
                        <td>{{ "Respondsive Website " }} &nbsp;</td>
                        <td>
                            @if($rowA->respondsive == 1)
                            <img src="{{ asset('/img/success.png') }}" width="30px">
                            @elseif($rowA->respondsive == 0)
                            <img src="{{ asset('/img/danger.png') }}" width="30px">
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>{{ 'จำนวนภาษา' }}</td>
                        <td>{{ $rowA->language }}</td>
                    </tr>
                    <tr>
                        <td>{{ "โควต้าในการแก้ไขเว็บไซต์ " }} &nbsp;</td>
                        <td>{{ "$rowA->quota" }}</td>
                    </tr>
                    <tr>
                        <td>{{ 'จำนวนเมนูทั้งหมดที่มีให้เลือก' }}</td>
                        <td>{{ $rowA->menu }}</td>
                    </tr>
                    <tr>
                        <td>{{ "ทำ Artwork/Banner ภาพนิ่งสำหรับใช้เว็บไซต์ " }} &nbsp;</td>
                        <td>{{ $rowA->artwork }}</td>
                    </tr>
                    <tr>
                        <td>{{ "Re-write Content ในเว็บไซต์ " }} &nbsp;</td>
                        <td>{{ $rowA->content }}</td>
                    </tr>
                    <tr>
                        <td>{{ "โควต้าในการเปลี่ยนข้อมูลและรูปภาพในเว็บไซต์ " }} &nbsp;</td>
                        <td>{{ $rowA->img }}</td>
                    </tr>
                    <tr>
                        <td>{{ "โค้วต้าติด Tracking Code " }} &nbsp;</td>
                        <td>{{ $rowA->tracking }}</td>
                    </tr>
                    <tr>
                        <td>{{ "ระบบ E-Commerce " }} &nbsp;</td>
                        <td>
                            @if($rowA->ecommerce == 1)
                            <img src="{{ asset('/img/success.png') }}" width="30px">
                            @elseif($rowA->ecommerce == 0)
                            <img src="{{ asset('/img/danger.png') }}" width="30px">
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>{{ "ลงข้อมูลสินค้าทั้งหมด " }} &nbsp;</td>
                        <td>
                            @if($rowA->product == 1)
                            <img src="{{ asset('/img/success.png') }}" width="30px">
                            @elseif($rowA->product == 0)
                            <img src="{{ asset('/img/danger.png') }}" width="30px">
                            @endif
                        </td>
                    </tr>
                    @endforeach
                    <tr>
                        <td colspan="2" align="center"><button class="btn btn-danger">เลือกแพ็คเกจนี้และชำระเงิน</button></td>
                    </tr>
                </table>
            </div>
            <div class="col-30 py-5 textline">
                <table class="table table-striped">
                    @foreach($packageB as $rowB)
                    <tr align="center">
                        <td colspan="">
                            <h2>{{ $rowB->price}}{{' / '}}{{ $rowB->mm }}</h2>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>
                            {{ 'มี URL เป็นของตัวเอง ' }} &nbsp;
                        </td>
                        <td>
                            @if($rowB->url == 1)
                            <img src="{{ asset('/img/success.png') }}" width="30px">
                            @elseif($rowB->url == 0)
                            <img src="{{ asset('/img/danger.png') }}" width="30px">
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>
                            {{ 'มีโดเมนเนมเป็นของตัวเอง ' }} &nbsp;
                        </td>
                        <td>
                            @if($rowB->domain == 1)
                            <img src="{{ asset('/img/success.png') }}" width="30px">
                            @elseif($rowB->domain == 0)
                            <img src="{{ asset('/img/danger.png') }}" width="30px">
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>{{ "SSL Let's Encrypt " }} &nbsp;</td>
                        <td>
                            @if($rowB->ssl == 1)
                            <img src="{{ asset('/img/success.png') }}" width="30px">
                            @elseif($rowB->ssl == 0)
                            <img src="{{ asset('/img/danger.png') }}" width="30px">
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>{{ "Web hosting " }}</td>
                        <td>{{ "$rowB->hosting " }}</td>
                    </tr>
                    <tr>
                        <td>{{ "Respondsive Website " }} &nbsp;</td>
                        <td>
                            @if($rowB->respondsive == 1)
                            <img src="{{ asset('/img/success.png') }}" width="30px">
                            @elseif($rowB->respondsive == 0)
                            <img src="{{ asset('/img/danger.png') }}" width="30px">
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>{{ 'จำนวนภาษา' }}</td>
                        <td>{{ $rowB->language }}</td>
                    </tr>
                    <tr>
                        <td>{{ "โควต้าในการแก้ไขเว็บไซต์ " }} &nbsp;</td>
                        <td>{{ "$rowB->quota" }}</td>
                    </tr>
                    <tr>
                        <td>{{ 'จำนวนเมนูทั้งหมดที่มีให้เลือก' }}</td>
                        <td>{{ $rowB->menu }}</td>
                    </tr>
                    <tr>
                        <td>{{ "ทำ Artwork/Banner ภาพนิ่งสำหรับใช้เว็บไซต์ " }} &nbsp;</td>
                        <td>{{ $rowB->artwork }}</td>
                    </tr>
                    <tr>
                        <td>{{ "Re-write Content ในเว็บไซต์ " }} &nbsp;</td>
                        <td>{{ $rowB->content }}</td>
                    </tr>
                    <tr>
                        <td>{{ "โควต้าในการเปลี่ยนข้อมูลและรูปภาพในเว็บไซต์ " }} &nbsp;</td>
                        <td>{{ $rowB->img }}</td>
                    </tr>
                    <tr>
                        <td>{{ "โค้วต้าติด Tracking Code " }} &nbsp;</td>
                        <td>{{ $rowB->tracking }}</td>
                    </tr>
                    <tr>
                        <td>{{ "ระบบ E-Commerce " }} &nbsp;</td>
                        <td>
                            @if($rowB->ecommerce == 1)
                            <img src="{{ asset('/img/success.png') }}" width="30px">
                            @elseif($rowB->ecommerce == 0)
                            <img src="{{ asset('/img/danger.png') }}" width="30px">
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>{{ "ลงข้อมูลสินค้าทั้งหมด " }} &nbsp;</td>
                        <td>
                            @if($rowB->product == 1)
                            <img src="{{ asset('/img/success.png') }}" width="30px">
                            @elseif($rowB->product == 0)
                            <img src="{{ asset('/img/danger.png') }}" width="30px">
                            @endif
                        </td>
                    </tr>
                    @endforeach
                    <tr>
                        <td colspan="2" align="center"><button class="btn btn-danger">เลือกแพ็คเกจนี้และชำระเงิน</button></td>
                    </tr>
                </table>
            </div>
            <div class="col-30 py-5 textline">
                <table class="table table-striped">
                    @foreach($packageC as $rowC)
                    <tr align="center">
                        <td colspan="">
                            <h2>{{ $rowC->price}}{{' / '}}{{ $rowC->mm }}</h2>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>
                            {{ 'มี URL เป็นของตัวเอง ' }} &nbsp;
                        </td>
                        <td>
                            @if($rowC->url == 1)
                            <img src="{{ asset('/img/success.png') }}" width="30px">
                            @elseif($rowC->url == 0)
                            <img src="{{ asset('/img/danger.png') }}" width="30px">
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>
                            {{ 'มีโดเมนเนมเป็นของตัวเอง ' }} &nbsp;
                        </td>
                        <td>
                            @if($rowC->domain == 1)
                            <img src="{{ asset('/img/success.png') }}" width="30px">
                            @elseif($rowC->domain == 0)
                            <img src="{{ asset('/img/danger.png') }}" width="30px">
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>{{ "SSL Let's Encrypt " }} &nbsp;</td>
                        <td>
                            @if($rowC->ssl == 1)
                            <img src="{{ asset('/img/success.png') }}" width="30px">
                            @elseif($rowC->ssl == 0)
                            <img src="{{ asset('/img/danger.png') }}" width="30px">
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>{{ "Web hosting " }}</td>
                        <td>{{ "$rowC->hosting " }}</td>
                    </tr>
                    <tr>
                        <td>{{ "Respondsive Website " }} &nbsp;</td>
                        <td>
                            @if($rowC->respondsive == 1)
                            <img src="{{ asset('/img/success.png') }}" width="30px">
                            @elseif($rowC->respondsive == 0)
                            <img src="{{ asset('/img/danger.png') }}" width="30px">
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>{{ 'จำนวนภาษา' }}</td>
                        <td>{{ $rowC->language }}</td>
                    </tr>
                    <tr>
                        <td>{{ "โควต้าในการแก้ไขเว็บไซต์ " }} &nbsp;</td>
                        <td>{{ "$rowC->quota" }}</td>
                    </tr>
                    <tr>
                        <td>{{ 'จำนวนเมนูทั้งหมดที่มีให้เลือก' }}</td>
                        <td>{{ $rowC->menu }}</td>
                    </tr>
                    <tr>
                        <td>{{ "ทำ Artwork/Banner ภาพนิ่งสำหรับใช้เว็บไซต์ " }} &nbsp;</td>
                        <td>{{ $rowC->artwork }}</td>
                    </tr>
                    <tr>
                        <td>{{ "Re-write Content ในเว็บไซต์ " }} &nbsp;</td>
                        <td>{{ $rowC->content }}</td>
                    </tr>
                    <tr>
                        <td>{{ "โควต้าในการเปลี่ยนข้อมูลและรูปภาพในเว็บไซต์ " }} &nbsp;</td>
                        <td>{{ $rowC->img }}</td>
                    </tr>
                    <tr>
                        <td>{{ "โค้วต้าติด Tracking Code " }} &nbsp;</td>
                        <td>{{ $rowC->tracking }}</td>
                    </tr>
                    <tr>
                        <td>{{ "ระบบ E-Commerce " }} &nbsp;</td>
                        <td>
                            @if($rowC->ecommerce == 1)
                            <img src="{{ asset('/img/success.png') }}" width="30px">
                            @elseif($rowC->ecommerce == 0)
                            <img src="{{ asset('/img/danger.png') }}" width="30px">
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>{{ "ลงข้อมูลสินค้าทั้งหมด " }} &nbsp;</td>
                        <td>
                            @if($rowC->product == 1)
                            <img src="{{ asset('/img/success.png') }}" width="30px">
                            @elseif($rowC->product == 0)
                            <img src="{{ asset('/img/danger.png') }}" width="30px">
                            @endif
                        </td>
                    </tr>
                    @endforeach
                    <tr>
                        <td colspan="2" align="center"><button class="btn btn-danger">เลือกแพ็คเกจนี้และชำระเงิน</button></td>
                    </tr>
                </table>
            </div>
            <div class="row linee2">
                <div class="col-30 py-5 textline">
                    <table class="table table-striped">
                        @foreach($packageD as $rowD)
                        <tr align="center">
                            <td colspan="">
                                <h2>{{ $rowD->price}}{{' / '}}{{ $rowD->mm }}</h2>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>
                                {{ 'มี URL เป็นของตัวเอง ' }} &nbsp;
                            </td>
                            <td>
                                @if($rowD->url == 1)
                                <img src="{{ asset('/img/success.png') }}" width="30px">
                                @elseif($rowD->url == 0)
                                <img src="{{ asset('/img/danger.png') }}" width="30px">
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>
                                {{ 'มีโดเมนเนมเป็นของตัวเอง ' }} &nbsp;
                            </td>
                            <td>
                                @if($rowD->domain == 1)
                                <img src="{{ asset('/img/success.png') }}" width="30px">
                                @elseif($rowD->domain == 0)
                                <img src="{{ asset('/img/danger.png') }}" width="30px">
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>{{ "SSL Let's Encrypt " }} &nbsp;</td>
                            <td>
                                @if($rowD->ssl == 1)
                                <img src="{{ asset('/img/success.png') }}" width="30px">
                                @elseif($rowD->ssl == 0)
                                <img src="{{ asset('/img/danger.png') }}" width="30px">
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>{{ "Web hosting " }}</td>
                            <td>{{ "$rowD->hosting " }}</td>
                        </tr>
                        <tr>
                            <td>{{ "Respondsive Website " }} &nbsp;</td>
                            <td>
                                @if($rowD->respondsive == 1)
                                <img src="{{ asset('/img/success.png') }}" width="30px">
                                @elseif($rowD->respondsive == 0)
                                <img src="{{ asset('/img/danger.png') }}" width="30px">
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>{{ 'จำนวนภาษา' }}</td>
                            <td>{{ $rowD->language }}</td>
                        </tr>
                        <tr>
                            <td>{{ "โควต้าในการแก้ไขเว็บไซต์ " }} &nbsp;</td>
                            <td>{{ "$rowD->quota" }}</td>
                        </tr>
                        <tr>
                            <td>{{ 'จำนวนเมนูทั้งหมดที่มีให้เลือก' }}</td>
                            <td>{{ $rowD->menu }}</td>
                        </tr>
                        <tr>
                            <td>{{ "ทำ Artwork/Banner ภาพนิ่งสำหรับใช้เว็บไซต์ " }} &nbsp;</td>
                            <td>{{ $rowD->artwork }}</td>
                        </tr>
                        <tr>
                            <td>{{ "Re-write Content ในเว็บไซต์ " }} &nbsp;</td>
                            <td>{{ $rowD->content }}</td>
                        </tr>
                        <tr>
                            <td>{{ "โควต้าในการเปลี่ยนข้อมูลและรูปภาพในเว็บไซต์ " }} &nbsp;</td>
                            <td>{{ $rowD->img }}</td>
                        </tr>
                        <tr>
                            <td>{{ "โค้วต้าติด Tracking Code " }} &nbsp;</td>
                            <td>{{ $rowD->tracking }}</td>
                        </tr>
                        <tr>
                            <td>{{ "ระบบ E-Commerce " }} &nbsp;</td>
                            <td>
                                @if($rowD->ecommerce == 1)
                                <img src="{{ asset('/img/success.png') }}" width="30px">
                                @elseif($rowD->ecommerce == 0)
                                <img src="{{ asset('/img/danger.png') }}" width="30px">
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>{{ "ลงข้อมูลสินค้าทั้งหมด " }} &nbsp;</td>
                            <td>{{ $rowD->product }}</td>
                        </tr>
                        @endforeach
                        <tr>
                            <td colspan="2" align="center"><button class="btn btn-danger">เลือกแพ็คเกจนี้และชำระเงิน</button></td>
                        </tr>
                    </table>
                </div>
                <div class="col-30 py-5 textline">
                    <table class="table table-striped">
                        @foreach($packageE as $rowE)
                        <tr align="center">
                            <td colspan="">
                                <h2>{{ $rowE->price}}{{' / '}}{{ $rowE->mm }}</h2>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>
                                {{ 'มี URL เป็นของตัวเอง ' }} &nbsp;
                            </td>
                            <td>
                                @if($rowE->url == 1)
                                <img src="{{ asset('/img/success.png') }}" width="30px">
                                @elseif($rowE->url == 0)
                                <img src="{{ asset('/img/danger.png') }}" width="30px">
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>
                                {{ 'มีโดเมนเนมเป็นของตัวเอง ' }} &nbsp;
                            </td>
                            <td>
                                @if($rowE->domain == 1)
                                <img src="{{ asset('/img/success.png') }}" width="30px">
                                @elseif($rowE->domain == 0)
                                <img src="{{ asset('/img/danger.png') }}" width="30px">
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>{{ "SSL Let's Encrypt " }} &nbsp;</td>
                            <td>
                                @if($rowE->ssl == 1)
                                <img src="{{ asset('/img/success.png') }}" width="30px">
                                @elseif($rowE->ssl == 0)
                                <img src="{{ asset('/img/danger.png') }}" width="30px">
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>{{ "Web hosting " }}</td>
                            <td>{{ "$rowE->hosting " }}</td>
                        </tr>
                        <tr>
                            <td>{{ "Respondsive Website " }} &nbsp;</td>
                            <td>
                                @if($rowE->respondsive == 1)
                                <img src="{{ asset('/img/success.png') }}" width="30px">
                                @elseif($rowE->respondsive == 0)
                                <img src="{{ asset('/img/danger.png') }}" width="30px">
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>{{ 'จำนวนภาษา' }}</td>
                            <td>{{ $rowE->language }}</td>
                        </tr>
                        <tr>
                            <td>{{ "โควต้าในการแก้ไขเว็บไซต์ " }} &nbsp;</td>
                            <td>{{ "$rowE->quota" }}</td>
                        </tr>
                        <tr>
                            <td>{{ 'จำนวนเมนูทั้งหมดที่มีให้เลือก' }}</td>
                            <td>{{ $rowE->menu }}</td>
                        </tr>
                        <tr>
                            <td>{{ "ทำ Artwork/Banner ภาพนิ่งสำหรับใช้เว็บไซต์ " }} &nbsp;</td>
                            <td>{{ $rowE->artwork }}</td>
                        </tr>
                        <tr>
                            <td>{{ "Re-write Content ในเว็บไซต์ " }} &nbsp;</td>
                            <td>{{ $rowE->content }}</td>
                        </tr>
                        <tr>
                            <td>{{ "โควต้าในการเปลี่ยนข้อมูลและรูปภาพในเว็บไซต์ " }} &nbsp;</td>
                            <td>{{ $rowE->img }}</td>
                        </tr>
                        <tr>
                            <td>{{ "โค้วต้าติด Tracking Code " }} &nbsp;</td>
                            <td>{{ $rowE->tracking }}</td>
                        </tr>
                        <tr>
                            <td>{{ "ระบบ E-Commerce " }} &nbsp;</td>
                            <td>
                                @if($rowE->ecommerce == 1)
                                <img src="{{ asset('/img/success.png') }}" width="30px">
                                @elseif($rowE->ecommerce == 0)
                                <img src="{{ asset('/img/danger.png') }}" width="30px">
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>{{ "ลงข้อมูลสินค้าทั้งหมด " }} &nbsp;</td>
                            <td>{{ $rowE->product }}</td>
                        </tr>
                        @endforeach
                        <tr>
                            <td colspan="2" align="center"><button class="btn btn-danger">เลือกแพ็คเกจนี้และชำระเงิน</button></td>
                        </tr>
                    </table>
                </div>
                <div class="col-30 py-5 textline">
                    <table class="table table-striped">
                        @foreach($packageF as $rowF)
                        <tr align="center">
                            <td colspan="">
                                <h2>{{ $rowF->price}}{{' / '}}{{ $rowF->mm }}</h2>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>
                                {{ 'มี URL เป็นของตัวเอง ' }} &nbsp;
                            </td>
                            <td>
                                @if($rowF->url == 1)
                                <img src="{{ asset('/img/success.png') }}" width="30px">
                                @elseif($rowF->url == 0)
                                <img src="{{ asset('/img/danger.png') }}" width="30px">
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>
                                {{ 'มีโดเมนเนมเป็นของตัวเอง ' }} &nbsp;
                            </td>
                            <td>
                                @if($rowF->domain == 1)
                                <img src="{{ asset('/img/success.png') }}" width="30px">
                                @elseif($rowF->domain == 0)
                                <img src="{{ asset('/img/danger.png') }}" width="30px">
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>{{ "SSL Let's Encrypt " }} &nbsp;</td>
                            <td>
                                @if($rowF->ssl == 1)
                                <img src="{{ asset('/img/success.png') }}" width="30px">
                                @elseif($rowF->ssl == 0)
                                <img src="{{ asset('/img/danger.png') }}" width="30px">
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>{{ "Web hosting " }}</td>
                            <td>{{ "$rowF->hosting " }}</td>
                        </tr>
                        <tr>
                            <td>{{ "Respondsive Website " }} &nbsp;</td>
                            <td>
                                @if($rowF->respondsive == 1)
                                <img src="{{ asset('/img/success.png') }}" width="30px">
                                @elseif($rowF->respondsive == 0)
                                <img src="{{ asset('/img/danger.png') }}" width="30px">
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>{{ 'จำนวนภาษา' }}</td>
                            <td>{{ $rowF->language }}</td>
                        </tr>
                        <tr>
                            <td>{{ "โควต้าในการแก้ไขเว็บไซต์ " }} &nbsp;</td>
                            <td>{{ "$rowF->quota" }}</td>
                        </tr>
                        <tr>
                            <td>{{ 'จำนวนเมนูทั้งหมดที่มีให้เลือก' }}</td>
                            <td>{{ $rowF->menu }}</td>
                        </tr>
                        <tr>
                            <td>{{ "ทำ Artwork/Banner ภาพนิ่งสำหรับใช้เว็บไซต์ " }} &nbsp;</td>
                            <td>{{ $rowF->artwork }}</td>
                        </tr>
                        <tr>
                            <td>{{ "Re-write Content ในเว็บไซต์ " }} &nbsp;</td>
                            <td>{{ $rowF->content }}</td>
                        </tr>
                        <tr>
                            <td>{{ "โควต้าในการเปลี่ยนข้อมูลและรูปภาพในเว็บไซต์ " }} &nbsp;</td>
                            <td>{{ $rowF->img }}</td>
                        </tr>
                        <tr>
                            <td>{{ "โค้วต้าติด Tracking Code " }} &nbsp;</td>
                            <td>{{ $rowF->tracking }}</td>
                        </tr>
                        <tr>
                            <td>{{ "ระบบ E-Commerce " }} &nbsp;</td>
                            <td>
                                @if($rowF->ecommerce == 1)
                                <img src="{{ asset('/img/success.png') }}" width="30px">
                                @elseif($rowF->ecommerce == 0)
                                <img src="{{ asset('/img/danger.png') }}" width="30px">
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>{{ "ลงข้อมูลสินค้าทั้งหมด " }} &nbsp;</td>
                            <td>{{ $rowF->product }}</td>
                        </tr>
                        @endforeach
                        <tr>
                            <td colspan="2" align="center"><button class="btn btn-danger">เลือกแพ็คเกจนี้และชำระเงิน</button></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('/js/bootstrap.bundle.min.js') }}"></script>