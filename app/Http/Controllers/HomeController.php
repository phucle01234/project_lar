<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAccoutnRequest;
use Illuminate\Http\Request;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        //su ly logic trong file
        // return view('pages.home_page');

        $a = ['demo a', 'demo b', 'demo c'];
        //cach 1
        return view('pages.home_page', ['data' => $a]);

        //cach 2
        // $b = 'Hanh';
        // return view('pages.home_page')->with('data', $a)->with('data2', $b);
    }

    public function detail($id)
    {
        return $id;
    }

    public function accountindex()
    {
        return view('account');
    }

    public function postaccount(Request $request)
    {
        // dd($request->all()); //* neu muon lay het

        // dd($request->except('email'));  //* neu muốn loại bỏ 1 trường nào đó

        // dd($request->only('email', 'password'))    //* lay chi 2
        $inputs = $request->all();
        if ($inputs['password'] != '123') {
            //back ve trang truoc
            //redirect()->back();

            return redirect()->back()->with('errorMessage', 'password không đúng')->withInput();
            //back ve data nhap tu ban phim ->withInput()
        } else {
            return redirect()->route('accountInfo')->with('data', $inputs);
        }
    }

    public function accountInfo()
    {
        $data = !empty(\Session::has('data')) ? \Session::get('data') : '';
        return view('info', ['data' => $data]);
    }

    //dang ky
    public function pager_home()
    {
        return view('pages.home_page');
    }

    public function postdangky(CreateAccoutnRequest $request)
    {
        $data = $request->all();
        User::create($data);
    }

    public function info($id)
    {
        //tìm theo id
        $info = User::find($id);

        // tìm cột name theo id
        // $info =  User::select('name')
        //     ->where([
        //         'id' => $id,
        //         'email' => 'coderit1372000@gmail.com'
        //     ])
        //     ->first();

        return view('update', ['info' => $info]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        User::where('id', $id)->update([
            'name' => $data['name']
        ]);
    }

    public function delect($id)
    {
        User::where('id', $id)->delect();
    }
}
