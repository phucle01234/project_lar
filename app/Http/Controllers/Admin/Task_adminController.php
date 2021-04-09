<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\Task\AddTaskRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Task;
use App\Models\User;
use App\Models\TaskUser;

class Task_adminController extends Controller
{
    public function get_task(Request $request){
        $task = DB::table('task')
        ->join('task_user', 'task_user.task_id', '=', 'task.id')
        ->join('user', 'user.id', '=', 'task_user.user_id')
        ->select('task.*', 'user.fullname' )
        ->get()->toArray();
// dd($task);   
        return view('admin.task.task', ['task' => $task]);
    }

    public function add(Request $request)
    {
        $user_th = User::all()->where('status', 'active');
        return view('admin.task.add',compact('user_th'));
    }

    public function postAdd(AddTaskRequest $request)
    {
        $task = new Task();
        $task->name_da = $request->name_da;
        $task->status = $request->status;
        $task->save();

        $taskUser = new TaskUser();
        $taskUser->task_id    = $task->id;
        $taskUser->user_id    = $request->nguoi_th;
        $taskUser->save();

        return redirect()->route('cong-viec');
    }

}
