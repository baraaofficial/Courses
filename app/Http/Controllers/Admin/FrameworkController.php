<?php

namespace App\Http\Controllers\Admin;

use App\Attachment;
use App\Http\Controllers\Controller;
use App\Models\Framework;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class FrameworkController extends Controller
{

    public function index(Request $request)
    {
        $frameworks = Framework::orderBy('id','DESC')->where(function ($q) use($request){
            if($request->keyword){
                $q->where('name_ar' , 'LIKE' , '%'.$request->keyword.'%')
                    ->orWhere('name_en' , 'LIKE' , '%'.$request->keyword.'%')
                    ->orWhere('description_ar' , 'LIKE' , '%'.$request->keyword.'%')
                    ->orWhere('description_en' , 'LIKE' , '%'.$request->keyword.'%')
                    ->orWhere('by' , 'LIKE' , '%'.$request->keyword.'%');
            }})->paginate(10);
        return view('admin.frameworks.index',compact('frameworks'));
    }


    public function create()
    {
        return view('admin.frameworks.create');
    }


    public function store(Request $request)
    {

        $frameworks = Framework::create($request->all());

        if ($request->hasFile('image')) {
            Attachment::addAttachment($request->file('image'), $frameworks, 'frameworks',['size'=> 600]);
        }

        return redirect()->route('frameworks.index')
            ->with(['message' => "تم إضافة لغة$frameworks->name_ar بنجاح"]);
    }


    public function show($id)
    {
        $frameworks = Framework::findOrFail($id);
        return view('admin.frameworks.show',compact('frameworks'));
    }


    public function edit($id)
    {
        $model = Framework::findOrFail($id);
        return view('admin.frameworks.edit',compact('model'));
    }


    public function update(Request $request, $id)
    {
        $frameworks = Framework::findOrFail($id);
        $frameworks->update($request->all());

        if ($request->hasFile('image')) {

            Attachment::updateAttachment($request->file('image'),$frameworks->attachment,$frameworks,'frameworks');
        }

        return redirect()->route('frameworks.index')
            ->with(['message' => "تم تعديل $frameworks->name_ar بنجاح"]);
    }


    public function destroy($id)
    {
        $frameworks = Framework::findOrFail($id);
        $frameworks->delete();
        return redirect()->route('frameworks.index')
            ->with(['delete' => "تم حذف $frameworks->name_ar"]);
    }

    public function delete() {
        $frameworks = Framework::onlyTrashed()->paginate(10);
        return view('admin.frameworks.delete', compact('frameworks'));
    }

    public function recovery($id)
    {
        $frameworks = Framework::where('id', $id)->withTrashed()->first();
        $frameworks->restore();

        return redirect()->route('frameworks.index')
            ->with('message', "لقد نجحت في استعادة بيئة العمل $frameworks->name_ar");
    }


}
