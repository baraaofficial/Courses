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
        return redirect()->route('users.index')
            ->with(['message' => "تم إضافة $users->name بنجاح"]);
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
        return redirect()->route('users.index')
            ->with(['message' => "تم تعديل $users->name بنجاح"]);
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('users.index')
            ->with(['delete' => "تم حذف المستخدم $user->name"]);

    }

    public function search(Request $request)
    {
        $users = User::where(function($users) use($request){

            if ($request->input('keyword'))
            {
                $users->where(function($users) use($request){
                    $users->where('name','like','%'.$request->keyword.'%');
                    $users->orWhere('email','like','%'.$request->keyword.'%');
                    $users->orWhere('location','like','%'.$request->keyword.'%');
                    $users->orWhere('phone','like','%'.$request->keyword.'%');
                    $users->orWhere('status','like','%'.$request->keyword.'%');
                    $users->orWhere('is_admin','like','%'.$request->keyword.'%');
                });
            }

        })->latest()->limit(10)->get();
        //   dd($request);
        return view('admin.users.search',compact('users'));
    }

    public function delete() {
        $users = User::onlyTrashed()->paginate(10);
        return view('admin.users.delete', compact('users'));
    }

    public function recovery($id)
    {
        $users = User::where('id', $id)->withTrashed()->first();
        $users->restore();

        return redirect()->route('users.index')
            ->with('message', 'لقد نجحت في استعادة الاتصال');
    }

    public function stopped()
    {
        $users = User::status()->get();
        return view('admin.users.stopped',compact('users'));
    }
}
