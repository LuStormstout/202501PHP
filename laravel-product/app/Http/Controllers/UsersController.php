<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * @throws Exception
     */
    public function index(): void
    {
        // 我们为了方便请求测试直接在这里写了创建用户的代码，实际开发中不要这样做

        // 创建并保存一个新用户
//        $user = new User();
//        $user->username = request('username') ?? 'LuStormstout';
//        $user->password = bcrypt(request('password') ?? '123456');
//        $user->email = request('email') ?? 'lu@example.com';
//        try {
//            $user->save();
//            echo 'User created successfully!';
//        } catch (Exception $e) {
//            throw new Exception($e->getMessage());
//        }

        // 使用 create 方法创建并保存用户
//        $user = User::create([
//            'username' => 'LuStormstout1',
//            'password' => bcrypt('123456'),
//            'email' => 'lu1@example.com'
//        ]);
//        var_dump($user);

        // 获取所有用户
//        $users = User::all();
//        foreach ($users as $user) {
//            echo $user->username . '<br>';
//        }

        // 获取第一个用户
//        $user = User::first();
//        echo $user->username;

        // 获取指定用户
//        $user = User::find(2);
//        echo $user->username;

        // 使用查询构造器查找用户
//        $users = User::where('gender', 2)
//            ->orderBy('id', 'desc')
//            ->get();
//        foreach ($users as $user) {
//            echo $user->username . '<br>';
//        }

        // 更新用户
//        $user = User::find(9);
//        $user->phone = '13400567001';
//        $user->save();

        // 删除用户
//        $user = User::find(9);
//        $user->delete();
    }

    public function show()
    {

    }

    public function create()
    {

    }

    public function store()
    {

    }

    public function edit()
    {

    }

    public function update()
    {

    }
}
