<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Regency\AddRegencyRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Regency;
use App\Models\Department;

class Regency_adminController extends Controller
{
    public function get_regency(Request $request)
    {
        $regency = DB::table('regency')
            ->join('department', 'department.regency_id', '=', 'regency.id')
            ->join('user', 'user.regency_id', '=', 'regency.id')
            ->select('regency.*', 'department.name_pb', 'user.fullname' )
            ->get()->toArray();
        return view('admin.regency.regency', ['regency' => $regency]);
    }

    public function add(Request $request)
    {
        $pb = department::all()->where('status', 'active');
        return view('admin.regency.add', compact('pb'));
    }
    
    public function postAdd(AddRegencyRequest $request)
    {
        $regency = new Regency();
        $regency->name_cv     = $request->name_cv;
        $regency->department_id      = $request->pb;
        $regency->status      = $request->status;
        $regency->save();

        $pb = DB::table('department')
        ->where('regency_id', '=', $request->name_cv)
        ->first();
        if (empty($pb)) {
            $pbRegency = new Department();
            $pbRegency->regency_id = $request->regency_id;
            $pbRegency->name_pb = $request->pb;
            $pbRegency->save();
        }
        return redirect()->route('chuc-vu');
    }
}
