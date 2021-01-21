<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Level;
use Illuminate\Http\Request;

class LevelController extends Controller
{

    public function index()
    {
        $levels = Level::all();
        return view('admin.levels.index',compact('levels'));
    }

    public function create()
    {
        return view('admin.levels.create');
    }


    public function store(Request $request)
    {
        $levels = Level::create($request->all());

        return redirect()->route('levels.index')
            ->with(['message' => "تم إضافة  $levels->level_ar بنجاح"]);
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $model = Level::findOrFail($id);
        return view('admin.levels.edit',compact('model'));
    }


    public function update(Request $request, $id)
    {
        $levels = Level::findOrFail($id);
        $levels->update($request->all());


        return redirect()->route('levels.index')
            ->with(['message' => " تم تعديل $levels->level_ar بنجاح "]);
    }


    public function destroy($id)
    {
        $levels = Level::findOrFail($id);
        $levels->delete();
        return redirect()->route('levels.index')
            ->with(['delete' => " تم حذف  $levels->level_ar"]);
    }
}
