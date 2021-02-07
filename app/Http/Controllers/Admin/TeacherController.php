<?php

namespace App\Http\Controllers\Admin;

use App\Attachment;
use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{

    public function index(Request $request)
    {
        $teachers = Teacher::where(function ($q) use($request){
            if($request->keyword){
                $q->where('name' , 'LIKE' , '%'.$request->keyword.'%')
                    ->orWhere('nick_name' , 'LIKE' , '%'.$request->keyword.'%')
                    ->orWhere('email' , 'LIKE' , '%'.$request->keyword.'%')
                    ->orWhere('phone' , 'LIKE' , '%'.$request->keyword.'%')
                    ->orWhere('followers' , 'LIKE' , '%'.$request->keyword.'%')
                    ->orWhere('location' , 'LIKE' , '%'.$request->keyword.'%')
                    ->orWhere('bio' , 'LIKE' , '%'.$request->keyword.'%')
                    ->orWhere('situation' , 'LIKE' , '%'.$request->keyword.'%')
                    ->orWhere('facebook' , 'LIKE' , '%'.$request->keyword.'%')
                    ->orWhere('twitter' , 'LIKE' , '%'.$request->keyword.'%')
                    ->orWhere('github' , 'LIKE' , '%'.$request->keyword.'%')
                    ->orWhere('linkedin' , 'LIKE' , '%'.$request->keyword.'%');
            }})->paginate(10);
        return view('admin.teachers.index',compact('teachers'));
    }


    public function create()
    {
        return view('admin.teachers.create');
    }

    public function store(Request $request)
    {
        $teachers = Teacher::create($request->all());
        if ($request->hasFile('image')) {
            Attachment::addAttachment($request->file('image'), $teachers, 'teachers',['size'=> 600]);
        }
        return redirect()->route('teachers.index')
            ->with(['message' => "تم إضافة  $teachers->name بنجاح"]);
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $model = Teacher::findOrFail($id);
        return view('admin.teachers.edit',compact('model'));
    }


    public function update(Request $request, $id)
    {
        $teachers = Teacher::findOrFail($id);
        $teachers->update($request->all());
        if ($request->hasFile('image')) {
            Attachment::updateAttachment($request->file('image'),$teachers->attachment,$teachers,'teachers');
        }
        return redirect()->route('teachers.index')
            ->with(['message' => "تم تعديل $teachers->name بنجاح"]);
    }


    public function destroy($id)
    {
        $teachers = Teacher::findOrFail($id);
        $teachers->delete();
        return redirect()->route('teachers.index')
            ->with(['delete' => "تم حذف المدرس $teachers->name"]);
    }


    public function delete(Request $request) {
        $teachers = Teacher::onlyTrashed()->where(function ($q) use($request){
            if($request->keyword){
                $q->where('name' , 'LIKE' , '%'.$request->keyword.'%')
                    ->orWhere('nick_name' , 'LIKE' , '%'.$request->keyword.'%')
                    ->orWhere('email' , 'LIKE' , '%'.$request->keyword.'%')
                    ->orWhere('phone' , 'LIKE' , '%'.$request->keyword.'%')
                    ->orWhere('followers' , 'LIKE' , '%'.$request->keyword.'%')
                    ->orWhere('location' , 'LIKE' , '%'.$request->keyword.'%')
                    ->orWhere('bio' , 'LIKE' , '%'.$request->keyword.'%')
                    ->orWhere('situation' , 'LIKE' , '%'.$request->keyword.'%')
                    ->orWhere('facebook' , 'LIKE' , '%'.$request->keyword.'%')
                    ->orWhere('twitter' , 'LIKE' , '%'.$request->keyword.'%')
                    ->orWhere('github' , 'LIKE' , '%'.$request->keyword.'%')
                    ->orWhere('linkedin' , 'LIKE' , '%'.$request->keyword.'%');
            }})->paginate(10);
        return view('admin.teachers.delete', compact('teachers'));
    }


    public function recovery($id)
    {
        $teachers = Teacher::where('id', $id)->withTrashed()->first();
        $teachers->restore();
        return redirect()->route('teachers.index')
            ->with('message', "  لقد نجحت في استعادة المدرس $teachers->name ");
    }


    public function forcedelete(Request $request, $id)
    {
        $teachers = Teacher::where('id', $id)->forceDelete();
        return redirect()->route('teachers.index')
            ->with(['delete' => "تم حذف المدرس نهائياً"]);
    }


    public function stopped(Request $request)
    {
        $teachers = Teacher::status()->where(function ($q) use($request){
            if($request->keyword){
                $q->where('name' , 'LIKE' , '%'.$request->keyword.'%')
                    ->orWhere('nick_name' , 'LIKE' , '%'.$request->keyword.'%')
                    ->orWhere('email' , 'LIKE' , '%'.$request->keyword.'%')
                    ->orWhere('phone' , 'LIKE' , '%'.$request->keyword.'%')
                    ->orWhere('followers' , 'LIKE' , '%'.$request->keyword.'%')
                    ->orWhere('location' , 'LIKE' , '%'.$request->keyword.'%')
                    ->orWhere('bio' , 'LIKE' , '%'.$request->keyword.'%')
                    ->orWhere('situation' , 'LIKE' , '%'.$request->keyword.'%')
                    ->orWhere('facebook' , 'LIKE' , '%'.$request->keyword.'%')
                    ->orWhere('twitter' , 'LIKE' , '%'.$request->keyword.'%')
                    ->orWhere('github' , 'LIKE' , '%'.$request->keyword.'%')
                    ->orWhere('linkedin' , 'LIKE' , '%'.$request->keyword.'%');
            }})->paginate(10);
        return view('admin.teachers.stopped',compact('teachers'));
    }


}
