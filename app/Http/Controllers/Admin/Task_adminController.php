<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\Task\AddTaskRequest;
use App\Http\Requests\Task\EditTaskRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Task;
use App\Models\User;
use App\Models\TaskUser;

class Task_adminController extends Controller
{
    public function get_task(Request $request)
    {
        $task = DB::table('task')
            ->join('task_user', 'task_user.task_id', '=', 'task.id')
            ->join('user', 'user.id', '=', 'task_user.user_id')
            ->select('task.*', 'user.fullname')
            ->get()->toArray();
        return view('admin.task.task', ['task' => $task]);
    }

    public function add(Request $request)
    {
        $user_th = User::all()->where('status', 'active');
        return view('admin.task.add', compact('user_th'));
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

    public function edit(Request $request, $id)
    {
        $user_th = User::all()->where('status', 'active');
        $info = DB::table('task')
            ->join('task_user', 'task_user.task_id', '=', 'task.id')
            ->where('task.id', '=', $id)
            ->select('task.id', 'task.name_da', 'task.status', 'task_user.user_id')
            // ->select('task.id', 'task.name_da', 'task.status', 'task_user.id as task_user_id') Vi du neu goi ra 2 id o 2 bang khac nhau dung "as"
            ->first();
        return view('admin.task.edit', compact('user_th', 'info'));
    }

    public function postEdit(EditTaskRequest $request, $id)
    {
        $task = Task::find($id);
        $task->name_da = $request->name_da;
        $task->status = $request->status;
        $task->save();

        $taskUser = new TaskUser();
        $taskUser->task_id    = $task->id;
        $taskUser->user_id    = $request->nguoi_th;
        $taskUser->save();

        return redirect()->route('cong-viec');
    }

    public function delete($id)
    {
        Task::find($id)->delete();
        TaskUser::where('task_id', $id)->delete();
        return redirect()->route('cong-viec');
    }
}
