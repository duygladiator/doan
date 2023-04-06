<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUser;
use App\Http\Requests\UpdateUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Expr\FuncCall;

class UserController extends Controller
{
    private $model;

    public function __construct(User $userModel)
    {
        $this->model = $userModel;
    }

    public function index()
    {
        // to show what query you are using
        // DB::enableQueryLog();
        // sql query here
        // dd(DB::getQueryLog());

        // sql raw
        // $users = DB::select('SELECT * FROM users');

        // query builder
        // $users = DB::table('users')->get();

        // get table column(s)
        // $users = DB::table('users')->select('id', 'name')->get();
        // $users = DB::table('users')->where('id', '>', '2')->get();
        // $users = DB::table('users')->where('id', '>', 2)->where('status', 1)->get();
        // $users = DB::table('users')->where([['id', '>', 2], ['status', 1]])->get();
        // $users = DB::table('users')->where('id', '>', 1)->orWhere('status', 1)->get();
        // $users = DB::table('users')
        //     ->where('id', '>', 2)
        //     ->orWhere(function ($query) {
        //         $query->where('name', '2')->orWhere('name', '3');
        //     })->get();
        // $users = DB::table('users')->where('id', '>', 2)->whereNotBetween('id', [1, 7])->get();
        // $users = DB::table('users')->whereNotNull('status')->get();

        $users = $this->model->getAll();

        return view('admin.pages.user.user', ['users' => $users]);
    }

    public function store(CreateUser $request)
    {
        // dd($request->all());
        // $request->validate(
        //     [
        //         'name' => 'required|min:1',
        //         'phone' => 'required',
        //         'email' => 'required|unique:users,email',
        //         // 'password' => 'required|confirmed',
        //         'password' => 'required',
        //         'status' => 'required',
        //     ],
        //     [
        //         'name.required' => 'This field must not be empty!',
        //         'name.min' => 'This field required at least 3 char!',
        //         'email.unique' => 'This email has been taken!',
        //         'status.required' => 'You have to choose!'
        //     ]
        // );
        // $request = $request->all();

        //bo~ field _token
        // $request = $request->except('_token', 'password_confirmation');
        $request = $request->except('_token', 'password_confirmation');

        //factored code
        $request[] = date('Y-m-d H:i:s');
        $request[] = date('Y-m-d H:i:s');
        $request['password'] = Hash::make($request['password']);


        // DB::insert('INSERT INTO users (name, phone, email, password, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?)', [$request['name'],  $request['phone'], $request['email'], $request['password'], date('Y-m-d H:i:s'), date('Y-m-d H:i:s')]);


        //factored code sql raw
        DB::insert('INSERT INTO users (name, phone, email, password, status, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?, ?)', array_values($request));

        // DB::table('users')->insert([
        //     'name' => $request->name,
        //     'phone' => $request->phone,
        //     'email' => $request->email,
        //     'password' => $request->password,
        //     'status' => $request->status,
        //     'created_at' => $request->created_at,
        //     'updated_at' => $request->updated_at,
        //     // array_values($request)
        // ]);

        // dd($request);

        return redirect()->route('admin.user')->with('message', 'USER CREATED!');
    }

    public function edit($id)
    {
        // $user = DB::select('SELECT * FROM users WHERE id = ?', [$id]);
        // $user = DB::table('users')->where('id = ?', [$id]);
        $user = DB::select('SELECT * FROM users WHERE id = :id', ['id' => $id]);

        return view('admin.pages.user.edit', ['user' => $user[0]]);
    }

    public function update(UpdateUser $request)
    {
        $data = $request->except('_token', 'password_confirmation');
        $data['updated_at'] = date('Y-m-d H:i:s');

        // dd($data);

        $bool = DB::update('update users set name = :name, phone = :phone, email = :email, password = :password, status= :status, updated_at = :updated_at where id = :id', $data);

        $message = 'FAILED';
        if ($bool) {
            $message = 'EDITED';
        }

        return redirect()->route('admin.user')->with('message', $message);
    }

    public function delete($id)
    {
        $bool = DB::delete('DELETE FROM users WHERE id = :id', [$id]);

        $message = 'CANCELED';
        if ($bool) {
            $message = 'DELETED';
        }

        return redirect()->route('admin.user')->with('message', $message);
    }
}
