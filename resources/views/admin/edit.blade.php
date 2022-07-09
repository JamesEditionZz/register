<link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">

@section('content')
<?php
date_default_timezone_set("asia/bangkok");
?>

<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col-auto col-md-2 col-xl-1 px-sm-1 px-0 bg-danger">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <img src="{{ asset('/img/White.png') }}" alt="" width="120">
                </a>
                <div class="card" style="width: 7rem;"></div>
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                    <li class="nav-item">
                        <a href="#" class="nav-link align-middle px-0" style="color: white;">
                            <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.member') }}" class="nav-link px-0 align-middle" style="color: white;">
                            <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline">Member</span> </a>
                    </li>
                </ul>
                <hr>
                <div class="dropdown pb-4">
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
            </div>
        </div>

        <div class="col py-3 textline" align="center">
            <h3 class="mb-5">Edit Member</h3>
            <form action="{{ url('/member/update/'.$user->id) }}" method="post">
                @csrf
                <div class="form-group">
                    <div class="col-2">
                        <label for="">firstname</label>
                        <input type="text" class="form-control form-control-sm" disabled value="{{ $user->firstname }}">
                    </div>

                    <div class="col-2 mt-4">
                        <label for="">lastname</label>
                        <input type="text" class="form-control form-control-sm" disabled value="{{ $user->lastname }}">
                    </div>

                    <div class="col-2 mt-4">
                        <label for="">username</label>
                        <input type="text" class="form-control form-control-sm" disabled value="{{ $user->username }}">
                    </div>

                    <div class="col-2 mt-4">
                        <label for="">Email</label>
                        <input type="text" class="form-control form-control-sm" disabled value="{{ $user->email }}">
                    </div>

                    <div class="col-2 mt-4">
                        <label for="">สถานะยืนยันอีเมล์</label>
                        <select name="verified" id="verified" class="form-select">
                            <option value="" disabled selected></option>
                            <option value="<?php echo date("Y-m-d H:i:s") ?>">ยืนยันตัวตน</option>
                            <option value="">ยกเลิกการยืนยัน</option>
                        </select>
                    </div>
                    <div class="col-2 mt-4">
                        <button type="submit" class="btn btn-primary mt-4">แก้ไขข้อมูล</button>
                    </div>
                </div>
            </form>
        </div>


    </div>
</div>
<script src="{{ asset('/js/bootstrap.bundle.min.js') }}"></script>