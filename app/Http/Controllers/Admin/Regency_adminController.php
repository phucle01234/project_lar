<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Regency;
use Illuminate\Http\Request;

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
}
