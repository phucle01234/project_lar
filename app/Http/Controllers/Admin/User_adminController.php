<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\AddUserRequest;
use App\Http\Requests\User\EditUserRequest;
use App\Models\Role;
use App\Models\User;
use App\Mail\EmailSenduser;
use App\Models\ListAvatar;
use App\Models\Regency;
use App\Models\Task;
use App\Models\TaskUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class User_adminController extends Controller
{
    public function get_user(Request $request)
    {
        $user = DB::table('user')
            ->join('roles', 'roles.id', '=', 'user.role_id')
            ->join('regency', 'regency.id', '=', 'user.regency_id')       
            ->select('user.*', 'roles.name', 'regency.name_cv')
            ->get();
        //lấy ds các user
        //* cách 1 $user = DB::select('select * from user');
        //$user = User::get();
        
        return view('admin.user.user', ['user' => $user]);
    }

    public function add(Request $request)
    {
        $role = Role::all()->where('status', 'active');
        $cv   = Regency::all()->where('status', 'active');

        return view('admin.user.add', compact('role', 'cv'));
    }

    public function postAdd(AddUserRequest $request)
    {
        $user = new User();
        $user->email       = $request->email;
        $user->fullname    = $request->fullname;
        $user->password    = Hash::make($request->password);
        $user->role_id     = $request->role;
        $user->regency_id  = $request->cv;
        $user->gender      = $request->gender;
        $user->status      = $request->status;
        // $user->avatar = 'null';
        if ($request->hasFile('upload')) {
            $file = $request->upload->getClientOriginalName();
            $day = date('Y-m-d');
            $file_custom = $day . '_' . $file;
            $user->avatar = $file_custom;
            $request->upload->move('upload', $file_custom);
        }      
        $user->save();

        // ****upload list image
        // for($i=0;$i<count($request->upload);$i++){
        //     $file = $request->upload[$i]->getClientOriginalName();
        //     $avarta=new ListAvatar();
        //     $day = date('Y-m-d');
        //     $file_custom = $day . '_' . $file;
        //     $avarta->images = $file_custom;
        //     $avarta->id_user = $user->id;
        //     $request->upload[$i]->move('upload', $file_custom);
        //     $avarta->save();
        // }

        //gửi mail
        $user=Auth::user();
        $emailAmin=$user->email;
        $data_info_mail = $request->email;
        Mail::to($data_info_mail)->send(new EmailSenduser());
        Mail::to($emailAmin)->send(new EmailSenduser());
        
        return redirect()->route('user');
    }

    public function edit(Request $request, $id)
    {
        $role = Role::all()->where('status', 'active');
        $cv   = Regency::all()->where('status', 'active');
        $task   = Task::all()->where('status', 'active');
        $info = DB::table('user')
            ->where('id', '=', $id)
            ->first();
        return view('admin.user.edit', compact('role', 'cv', 'task', 'info'));
    }

    public function postEdit(EditUserRequest $request)
    {
        
        $user = User::find($request->id);
        $user->email       = $request->email;
        $user->fullname    = $request->fullname;
        $user->role_id     = $request->role;
        $user->regency_id  = $request->cv;
        $user->gender      = $request->gender;
        $user->status      = $request->status;
        // $user->avatar = 'null';

        if ($request->hasFile('upload')) {
            $file = $request->upload->getClientOriginalName();
            $day = date('Y-m-d');
            $file_custom = $day . '_' . $file;
            $user->avatar = $file_custom;
            $request->upload->move('upload', $file_custom);
        }

        // ****upload list image
        // for($i=0;$i<count($request->upload);$i++){
        //     $file = $request->upload[$i]->getClientOriginalName();
        //     $avarta=new ListAvatar();
        //     $day = date('Y-m-d');
        //         $file_custom = $day . '_' . $file;
        //         $avarta->images = $file_custom;
        //         $avarta->id_user = $user->id;
        //         $request->upload[$i]->move('upload', $file_custom);
        //         $avarta->save();
        // }

        if ($request->password != null) {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        //task
        if( $request->task_id){ 
            $infoTask = DB::table('task_user')
            ->where('user_id', '=', $request->id)
            ->where('task_id', '=', $request->task_id)
            ->first();
            if (empty($infoTask)) {
                $taskUser = new TaskUser();
                $taskUser->task_id    = $request->task_id;
                $taskUser->user_id    = $request->id;
                $taskUser->save();
            }
        }  
        return redirect()->route('user');
    }

    public function delete($id)
    {
        $data = User::find($id);
        $stt = 'delete';
        $data->status = $stt;
        $data->save();
        return redirect()->route('user');
    }
}
