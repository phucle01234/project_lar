<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Task_adminController extends Controller
{
    public function get_task(Request $request){
        $task = DB::table('task')
        ->join('task_user', 'task_user.task_id', '=', 'task.id')
        ->join('user', 'user.id', '=', 'task_user.user_id')
        ->select('task.*', 'user.fullname', 'user.fullname' )
        ->get()->toArray();

        return view('admin.task.task', ['task' => $task]);
    }
}
