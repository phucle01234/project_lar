<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\Login_adminController;
use App\Http\Controllers\Admin\Home_adminController;
use App\Http\Controllers\Admin\User_adminController;
use App\Http\Controllers\Admin\Regency_adminController;
use App\Http\Controllers\Admin\Department_adminController;
use App\Http\Controllers\Admin\Task_adminController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// ************giao dien trang ngoài
Route::get('/trang-chu', [HomeController::class, 'index'])->name('trang-chu');

// ************giao dien admin
Route::get('admin/login', [Login_adminController::class, 'get_login']);
Route::post('admin/login', [Login_adminController::class, 'login'])->name('login');
Route::get('admin/home', [Home_adminController::class, 'index'])->name('home')->middleware("loginmidd")->middleware("checkauth");
Route::get('admin/logout', [Login_adminController::class, 'logout'])->name('logout');

Route::group(['prefix' => 'admin', 'middleware' => 'loginmidd'], function () {
    Route::get('user', [User_adminController::class, 'get_user'])->name('user');
    //add
    Route::get('user/add', [User_adminController::class, 'add'])->name('add');
    Route::post('user/postAdd', [User_adminController::class, 'postAdd'])->name('postAdd');
    //edit
    Route::get('user/edit/{id}', [User_adminController::class, 'edit'])->name('edit')->where('id', '[0-9]+');
    Route::post('user/postEdit', [User_adminController::class, 'postEdit'])->name('postEdit');
    //delete
    Route::get('user/delete/{id}', [User_adminController::class, 'delete'])->name('delete')->where('id', '[0-9]+');

    //***chuc_vu
    Route::get('chuc-vu', [Regency_adminController::class, 'get_regency'])->name('chuc-vu');
    //add
    Route::get('chuc-vu/add', [Regency_adminController::class, 'add'])->name('addChucvu');
    Route::post('chuc-vu/postAdd', [Regency_adminController::class, 'postAdd'])->name('postAddChucvu');
    //edit
    Route::get('chuc-vu/edit/{id}', [Regency_adminController::class, 'edit'])->name('editChucvu')->where('id', '[0-9]+');
    Route::post('chuc-vu/edit/{id}', [Regency_adminController::class, 'postEdit']);
    //delete
    Route::get('chuc-vu/delete/{id}', [Regency_adminController::class, 'delete'])->name('deleteChucvu')->where('id', '[0-9]+');

    //***phong_ban
    Route::get('phong-ban', [Department_adminController::class, 'get_department'])->name('phong-ban');
    //add
    Route::get('phong-ban/add', [Department_adminController::class, 'add'])->name('addPhongban');
    Route::post('phong-ban/postAdd', [Department_adminController::class, 'postAdd'])->name('postAddPhongban');
    //edit
    Route::get('phong-ban/edit/{id}', [Department_adminController::class, 'edit'])->name('editPhongban')->where('id', '[0-9]+');
    Route::post('phong-ban/edit/{id}', [Department_adminController::class, 'postEdit']);
    //delete
    Route::get('phong-ban/delete/{id}', [Department_adminController::class, 'delete'])->name('deletePhongban')->where('id', '[0-9]+');

    //cong_viec
    Route::get('cong-viec', [Task_adminController::class, 'get_task'])->name('cong-viec');
    //add
    Route::get('cong-viec/add', [Task_adminController::class, 'add'])->name('addTask');
    Route::post('cong-viec/postAdd', [Task_adminController::class, 'postAdd'])->name('postAddTask');
    //edit
    Route::get('cong-viec/edit/{id}', [Task_adminController::class, 'edit'])->name('editTack')->where('id', '[0-9]+');
    Route::post('cong-viec/edit/{id}', [Task_adminController::class, 'postEdit']);
    //delete
    Route::get('cong-viec/delete/{id}', [Task_adminController::class, 'delete'])->name('deleteTask')->where('id', '[0-9]+');
});
