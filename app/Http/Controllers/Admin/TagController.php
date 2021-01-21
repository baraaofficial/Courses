<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{

    public function index()
    {
        $tags = Tag::all();
        return view('admin.tags.index',compact('tags'));
    }


    public function create()
    {
        return view('admin.tags.create');
    }


    public function store(Request $request)
    {
        $tags = Tag::create($request->all());

        return redirect()->route('tags.index')
            ->with(['message' => "تم إضافة  $tags->name_ar بنجاح"]);
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $model = Tag::findOrFail($id);
        return view('admin.tags.edit',compact('model'));
    }


    public function update(Request $request, $id)
    {
        $tags = Tag::findOrFail($id);
        $tags->update($request->all());


        return redirect()->route('tags.index')
            ->with(['message' => " تم تعديل $tags->name_ar بنجاح "]);
    }


    public function destroy($id)
    {
        $tags = Tag::findOrFail($id);
        $tags->delete();
        return redirect()->route('tags.index')
            ->with(['delete' => " تم حذف  $tags->name_ar"]);
    }
}
