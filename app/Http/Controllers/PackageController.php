<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\package;

class PackageController extends Controller
{
    public function packagefree()
    {
        $packagefree['packagefree'] = DB::table('packages')->where('id', '1')->get();
        return view('user.packagefree', $packagefree);
    }
    public function packagemonth()
    {
        $packageA = DB::table('packages')->where('id', '2')->get();
        $packageB = DB::table('packages')->where('id', '3')->get();
        $packageC = DB::table('packages')->where('id', '4')->get();
        $packageD = DB::table('packages')->where('id', '5')->get();
        $packageE = DB::table('packages')->where('id', '6')->get();
        $packageF = DB::table('packages')->where('id', '7')->get();
        return view('user.packagemonth', compact('packageA','packageB','packageC','packageD','packageE','packageF'));
    }
    public function packageyear()
    {
        $packageH = DB::table('packages')->where('id', '8')->get();
        $packageI = DB::table('packages')->where('id', '9')->get();
        $packageJ = DB::table('packages')->where('id', '10')->get();
        $packageK = DB::table('packages')->where('id', '11')->get();
        $packageL = DB::table('packages')->where('id', '12')->get();
        $packageM = DB::table('packages')->where('id', '13')->get();
        return view('user.packageyear', compact('packageH', 'packageI', 'packageJ', 'packageK', 'packageL', 'packageM'));
    }
    public function formrequest()
    {
        $package = DB::table('users')
                    ->join('packageusers','users.id','=','packageusers.user_id')
                    ->join('packages','packages.id','=','packageusers.package_id')
                    ->get('price');
        return view('user.formrequest', compact('package'));
    }
    function fetch(Request $request){
        $id = $request->get('select');
        $result = array();
        $query = DB::table('tembusinesses')
        ->join('temwebs','tembusinesses.id','=','temwebs.business_id')
        ->where('tembusinesses.id',$id)
        ->groupBy('temwebs.web_id')
        ->get();

            $output = '<option value="">เลือกประเภทเว็ปไซต์</option>';
        foreach ($query as $row){
            $output.='<option value ="'.$row->web_id.'">'.$row->name_web.'</option>';
            }
            echo $output;
    }
}
