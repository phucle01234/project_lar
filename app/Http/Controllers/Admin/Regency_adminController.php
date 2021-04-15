<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Regency\AddRegencyRequest;
use App\Http\Requests\Regency\EditRegencyRequest;
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
        ->join('department', 'department.id', '=', 'regency.department_id')
        ->select('regency.*', 'department.name_pb',)   
        ->paginate(1);
        return view('admin.regency.regency',  compact('regency'));
    }

    public function add(Request $request)
    {
        $pb = department::all()->where('status', 'active');
        return view('admin.regency.add', compact('pb'));
    }
    
    public function postAdd(AddRegencyRequest $request)
    {
        $regency = new Regency();
        $regency->name_cv          = $request->name_cv;
        $regency->department_id    = $request->pb;
        $regency->status           = $request->status;
        $regency->save();
        return redirect()->route('chuc-vu');
    }

    public function edit(Request $request, $id)
    {
        $pb = department::all()->where('status', 'active');
        $info = DB::table('regency')
            ->where('id', '=', $id)
            ->first();
        return view('admin.regency.edit', compact('pb','info'));
    }

    public function postEdit(EditRegencyRequest $request,$id)
    {
        // $regency = Regency::find($request->id);
        $regency = Regency::find($id);
        $regency->name_cv= $request->name_cv;
        $regency->department_id= $request->pb;
        $regency->status= $request->status;
        $regency->save();
        return redirect()->route('chuc-vu');
    }

    public function delete($id)
    {
        $data = Regency::find($id);
        $stt = 'delete';
        $data->status = $stt;
        $data->save();
        return redirect()->route('chuc-vu');
    }
}
