<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function add()
    {
        return view('admin.user.add');
    }

    public function create(Request $request)
    {
        User::getNewUser($request);
        return redirect()->back()->with('message', 'New User Created Successfully');
    }

    public function edit($id)
    {
        return view('admin.user.edit',[
            'user' => User::find($id),
        ]);
    }

    public function update(Request $request, $id)
    {
       User::updateUser($request, $id);
       return redirect('/manage-user')->with('message', 'User Info Updated Successfully');

    }

    public function delete(Request $request, $id)
    {
        User::deleteUser($id);
        return redirect('/manage-user')->with('message', 'User  Deleted Successfully');
    }

    public function manage()
    {
        return view('admin.user.manage',[
            'users' => User::orderby('id', 'desc')->get(),
        ]);
    }
}
