<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        $users = User::all();

        return view('admin.users.index',compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(StoreUserRequest $request)
    {
        $request->merge(['password' => bcrypt($request->password)]);
        $users = User::create($request->all());
        $users->attachRole('admin');
        $users->syncPermissions($users->permissions);
        return redirect()->route('users.index')->with(['message' => "تم إضافة $users->name بنجاح"]);
    }


    public function show($id)
    {
        $users = User::findOrFail($id);
        return view('admin.users.show',compact('users'));
    }


    public function edit($id)
    {
        $model = User::findOrFail($id);

        return view('admin.users.edit',compact('model'));
    }


    public function update(UpdateUserRequest $request, $id)
    {

        $request->merge(['password' => bcrypt($request->password)]);
        $users = User::findOrFail($id);
        $users->update($request->all());
        $users->attachRole('admin');
        $users->syncPermissions($users->permissions);
        return redirect()->route('users.index')->with(['message' => "تم تعديل $users->name بنجاح"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
