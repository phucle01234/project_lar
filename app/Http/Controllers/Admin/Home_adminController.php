<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Regency;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class Home_adminController extends Controller
{
    public function index(Request $request)
    {
        $user = User::get();
        $regency = Regency::get();
        $department = Department::get();
        $task = Task::get();

        return view('admin.home.home', compact('user', 'regency', 'department', 'task'));
    }
}
