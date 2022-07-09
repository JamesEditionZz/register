<link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">

@section('content')

<style>
    .linee{
        border: 1px solid red;
    }
</style>

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
                        <a href="{{ Route('user.admin') }}" class="nav-link align-middle px-0" style="color: white;">
                            <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="#submenu1" data-bs-toggle="collapse" class="nav-link px-0 align-middle" style="color: white;">
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

        <div class="col py-4">
            <div class="row">
                <h3 class="col-11">Member magnage</h3>
                <div class="col"><button class="btn btn-primary">เพิ่ม User</button></div>
            </div>
            
            
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <strong>{{ $message }}</strong>
                </div>
                @endif
            <table class="table mt-5">
                <thead>
                    <tr align="center" class="table-primary">
                        <th scope="col">ลำดับ</th>
                        <th scope="col">ชื่อ</th>
                        <th scope="col">นามสกุล</th>
                        <th scope="col">Username</th>
                        <th scope="col">Email</th>
                        <th scope="col">สถานะยืนยันอีเมล์</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                @foreach($users as $user)
                <tbody align="center">
                    <tr class="table-Secondary">
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->firstname }}</td>
                        <td>{{ $user->lastname }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->email }}</td>
                        <td width="200">
                            @if($user->email_verified_at != '')
                            <div style="background-color: green;color: white" align="center" class="rounded">{{ 'ยืนยันตัวตนแล้ว' }}</div>
                            @else
                            <div style="background-color: red;color: white" align="center">{{ 'ยังไม่ยืนยันตัวตน' }}</div>
                            @endif
                        </td>
                        <td width="100"><a href="{{ url('/member/edit/'.$user->id) }}"><button class="btn btn-warning">{{ 'Edit' }}</button></a></td>
                        <td width="100"><a href="{{ url('/member/memberdelete/'.$user->id) }}"><button class="btn btn-Danger">{{ 'Delete' }}</button></a></td>
                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>
    </div>
</div>
<script src="{{ asset('/js/bootstrap.bundle.min.js') }}"></script>