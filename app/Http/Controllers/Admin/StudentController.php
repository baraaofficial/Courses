<?php

namespace App\Http\Controllers\Admin;

use App\Attachment;
use App\Http\Controllers\Controller;
use App\Http\Requests\Student\StoreRequest;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class StudentController extends Controller
{

    public function index(Request $request)
    {
        $students = Student::where(function ($q) use($request){
            if($request->keyword){
                $q->where('name' , 'LIKE' , '%'.$request->keyword.'%')
                ->orWhere('email' , 'LIKE' , '%'.$request->keyword.'%')
                ->orWhere('username' , 'LIKE' , '%'.$request->keyword.'%')
                ->orWhere('bio' , 'LIKE' , '%'.$request->keyword.'%')
                ->orWhere('phone' , 'LIKE' , '%'.$request->keyword.'%')
                ->orWhere('location' , 'LIKE' , '%'.$request->keyword.'%')
                ->orWhere('phone' , 'LIKE' , '%'.$request->keyword.'%');
            }

        })->paginate(10);
        return view('admin.students.index',compact('students'));
    }


    public function create()
    {
        return view('admin.students.create');
    }


    public function store(StoreRequest $request)
    {
        $request->merge(['password' => bcrypt($request->password)]);
        $students = Student::create($request->all());
        if ($request->hasFile('image')) {
            Attachment::addAttachment($request->file('image'), $students, 'students',['size'=> 600]);
        }
        $students->save();
        return redirect()->route('students.index');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $model = Student::findOrFail($id);
        return view('admin.students.edit',compact('model'));

    }


    public function update(Request $request, $id)
    {
        $request->merge(['password' => bcrypt($request->password)]);
        $students = Student::findOrFail($id);
        $students->update($request->all());
        if ($request->hasFile('image')) {
            Attachment::updateAttachment($request->file('image'),$students->attachment,$students,'students');
        }
        return redirect()->route('students.index')
            ->with(['message' => "تم تعديل $students->name بنجاح"]);
    }


    public function destroy($id)
    {
        $students = Student::findOrFail($id);
        $students->delete();
        return redirect()->route('students.index')
            ->with(['delete' => "تم حذف الطالب $students->name"]);
    }


    public function delete(Request $request) {
        $students = Student::onlyTrashed()->where(function ($q) use($request){
            if($request->keyword){
                $q->where('name' , 'LIKE' , '%'.$request->keyword.'%')
                    ->orWhere('email' , 'LIKE' , '%'.$request->keyword.'%')
                    ->orWhere('username' , 'LIKE' , '%'.$request->keyword.'%')
                    ->orWhere('bio' , 'LIKE' , '%'.$request->keyword.'%')
                    ->orWhere('phone' , 'LIKE' , '%'.$request->keyword.'%')
                    ->orWhere('location' , 'LIKE' , '%'.$request->keyword.'%')
                    ->orWhere('phone' , 'LIKE' , '%'.$request->keyword.'%');
            }})->paginate(10);
        return view('admin.students.delete', compact('students'));
    }


    public function recovery($id)
    {
        $students = Student::where('id', $id)->withTrashed()->first();
        $students->restore();
        return redirect()->route('students.index')
            ->with('message', "  لقد نجحت في استعادة الطالب $students->name ");
    }


    public function forcedelete(Request $request, $id)
    {
        $students = Student::where('id', $id)->forceDelete();
        return redirect()->route('students.index')
            ->with(['delete' => "تم حذف الطالب نهائياً"]);
    }


    public function stopped(Request $request)
    {
        $students = Student::status()->where(function ($q) use($request){
            if($request->keyword){
                $q->where('name' , 'LIKE' , '%'.$request->keyword.'%')
                    ->orWhere('email' , 'LIKE' , '%'.$request->keyword.'%')
                    ->orWhere('username' , 'LIKE' , '%'.$request->keyword.'%')
                    ->orWhere('bio' , 'LIKE' , '%'.$request->keyword.'%')
                    ->orWhere('phone' , 'LIKE' , '%'.$request->keyword.'%')
                    ->orWhere('location' , 'LIKE' , '%'.$request->keyword.'%')
                    ->orWhere('phone' , 'LIKE' , '%'.$request->keyword.'%');
            }})->paginate(10);
        return view('admin.students.stopped',compact('students'));
    }


}
