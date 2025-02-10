<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $fillable = ['username', 'password', 'email', 'phone', 'avatar', 'gender', 'birthday', 'country', 'province', 'city', 'address', 'zip_code', 'status', 'status', 'role', 'register_ip', 'last_login_ip', 'last_login_time', 'created_at', 'updated_at'];
}
