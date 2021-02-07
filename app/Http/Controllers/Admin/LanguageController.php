<?php

namespace App\Http\Controllers\Admin;

use App\Attachment;
use App\Http\Controllers\Controller;
use App\Http\Requests\lang\StoreLangReguest;
use App\Models\Language;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

class LanguageController extends Controller
{

    public function index(Request $request)
    {
        $languages = Language::orderBy('id','DESC')->where(function ($q) use($request){
            if($request->keyword){
                $q->where('name_ar' , 'LIKE' , '%'.$request->keyword.'%')
                    ->orWhere('name_en' , 'LIKE' , '%'.$request->keyword.'%')
                    ->orWhere('description_ar' , 'LIKE' , '%'.$request->keyword.'%')
                    ->orWhere('description_en' , 'LIKE' , '%'.$request->keyword.'%')
                    ->orWhere('by' , 'LIKE' , '%'.$request->keyword.'%');
            }})->paginate(10);
        return view('admin.languages.index' , compact('languages'));
    }


    public function create()
    {
        return view('admin.languages.create');
    }


    public function store(StoreLangReguest $request)
    {
        $languages = Language::create($request->all());
        if ($request->hasFile('image')) {
            Attachment::addAttachment($request->file('image'), $languages, 'languages',['size'=> 600]);
        }
        return redirect()->route('languages.index')
            ->with(['message' => "تم إضافة لغة$languages->name_ar بنجاح"]);
    }


    public function show($id)
    {
        $languages = Language::findOrFail($id);
        DB::table('visit_lang')->insert(
            ['visit' => 1,'created_at' => Carbon::now(),'updated_at' => Carbon::now()]
        );
        // Start chart users new
        $Charts_today_lang      = Language::whereDate('created_at', today())->count();

        // End chart users new
        return view('admin.languages.show',compact('languages','Charts_today_lang'));
    }


    public function edit($id)
    {
        $model = Language::findOrFail($id);
        return view('admin.languages.edit',compact('model'));

    }


    public function update(Request $request, $id)
    {
        $languages = Language::findOrFail($id);
        $languages->update($request->all());

        if ($request->hasFile('image')) {

            Attachment::updateAttachment($request->file('image'),$languages->attachment,$languages,'languages');
        }

        return redirect()->route('languages.index')
            ->with(['message' => "تم تعديل $languages->name_ar بنجاح"]);
    }


    public function destroy($id)
    {
        $languages = Language::findOrFail($id);
        $languages->delete();
        return redirect()->route('languages.index')
            ->with(['delete' => "تم حذف لغة $languages->name_ar"]);
    }

}
