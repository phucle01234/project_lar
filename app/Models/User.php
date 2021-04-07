<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = "user";
    protected $primaryKey  = "id";

    protected $fillable = [
        'email',
        'password',
        'remember_token',
        'permissions',
        'role_id',
        'regency_id',
        'gender',
        'fullname',
        'avatar',
        'super_user',
    ];

    const UPDATED_AT = null;
    const CREATED_AT = null;

    // trong table khong co cot create_at, update_at
    public $timestamp = false;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    // protected $hidden = [
    //     'password',
    //     'remember_token',
    // ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // public function role()
    // {
    //     return $this->hasMany(Role::class, 'role_id', 'id');
    // }
}
