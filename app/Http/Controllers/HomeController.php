<?php

namespace App\Http\Controllers;

use App\Models\package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function user()
    {
        $package = DB::table('users')
                    ->join('packageusers','users.id','=','packageusers.user_id')
                    ->join('packages','packages.id','=','packageusers.package_id')
                    ->get();

        $packageID = DB::table('users')
                    ->join('packageusers','users.id','=','packageusers.user_id')
                    ->value('package_id');

        return view('user.index', compact('package','packageID'));
    }

    public function admin()
    {
        return view('admin.index');
    }
    public function member(){
        $users = DB::table('users')->where('status','=','1')->get();

        return view('admin.member',['users' => $users]);
    }

    public function edit($id){
        $user = DB::table('users')->find($id);
        return view('admin.edit',compact('user'));
    }

    public function update(Request $request , $id){

        DB::table('users')->where('id',$id)->update([
            'email_verified_at'=>$request->verified
        ]);
        
        return redirect()->route('admin.member')->with('success',"อัพเดทข้อมูลเรียบร้อยแล้ว");
    }

    public function memberdelete($id){
        DB::table('users')->where('id',$id)->delete();

        return redirect()->route('admin.member')->with('success','ลบข้อมูลเรียบร้อยแล้ว');
    }
}
