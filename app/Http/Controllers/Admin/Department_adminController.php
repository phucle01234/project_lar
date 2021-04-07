<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;

class Department_adminController extends Controller
{
    public function get_department(Request $request)
    {
        $department = Department::get();
        return view('admin.department.department',['department'=> $department]);
    }
}
