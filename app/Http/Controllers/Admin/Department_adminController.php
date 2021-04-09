<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Department\AddDepartmentRequest;
use App\Http\Requests\Department\EditDepartmentRequest;
use Illuminate\Support\Facades\DB;
use App\Models\Department;
use Illuminate\Http\Request;

class Department_adminController extends Controller
{
    public function get_department(Request $request)
    {
        $department = Department::get();
        return view('admin.department.department',['department'=> $department]);
    }

    public function add(Request $request)
    {
        return view('admin.department.add');
    }

    public function postAdd(AddDepartmentRequest $request)
    {
        $department = new Department();
        $department->name_pb          = $request->name_pb;
        $department->status           = $request->status;
        $department->save();
        return redirect()->route('phong-ban');
    }

    public function edit(Request $request, $id)
    {;
        $info = DB::table('department')
            ->where('id', '=', $id)
            ->first();
        return view('admin.department.edit', compact('info'));
    }

    public function postEdit(EditDepartmentRequest $request,$id)
    {
        $department = Department::find($id);
        $department->name_pb= $request->name_pb;
        $department->status= $request->status;
        $department->save();
        return redirect()->route('phong-ban');
    }

    public function delete($id)
    {
        // User::find($id)->delete();
        $data = Department::find($id);
        $stt = 'delete';
        $data->status = $stt;
        $data->save();
        return redirect()->route('phong-ban');
    }
}
