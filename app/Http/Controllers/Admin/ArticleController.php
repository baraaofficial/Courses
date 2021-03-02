<?php

namespace App\Http\Controllers\Admin;

use App\Attachment;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Level;
use Illuminate\Http\Request;

class ArticleController extends Controller
{

    public function index(Request $request)
    {
        $articles = Article::orderBy('id','DESC')->where(function ($q) use($request){
            if($request->keyword){
                $q->where('title_ar' , 'LIKE' , '%'.$request->keyword.'%')
                    ->orWhere('title_en' , 'LIKE' , '%'.$request->keyword.'%')
                    ->orWhere('content_ar' , 'LIKE' , '%'.$request->keyword.'%')
                    ->orWhere('content_en' , 'LIKE' , '%'.$request->keyword.'%')
                    ->orWhere('language_id' , 'LIKE' , '%'.$request->keyword.'%')
                    ->orWhere('framework_id' , 'LIKE' , '%'.$request->keyword.'%')
                    ->orWhere('level_id' , 'LIKE' , '%'.$request->keyword.'%')
                    ->orWhere('by' , 'LIKE' , '%'.$request->keyword.'%');
            }})->paginate(12);
        return view('admin.articles.index',compact('articles'));
    }


    public function create()
    {
        return view('admin.articles.create');
    }


    public function store(Request $request)
    {
        $articles = Article::create($request->all());
        if ($request->hasFile('image')) {
            Attachment::addAttachment($request->file('image'), $articles, 'articles');
        }
        return redirect()->route('articles.index')
            ->with(['message' => "تم إضافة المقال$articles->title_ar بنجاح"]);
    }

    public function show($id)
    {
        $articles = Article::findOrFail($id);
        $levels = Article::where('level_id')->get();
        $languages = Article::where('language_id')->get();
        $recentArticles = Article::orderBy('created_at','DESC')->limit(5)->get();

        return view('admin.articles.show',compact('articles','levels','languages','recentArticles'));
    }

    public function edit($id)
    {
        $model = Article::findOrFail($id);
        return view('admin.articles.edit',compact('model'));
    }


    public function update(Request $request, $id)
    {
        $articles = Article::findOrFail($id);
        $articles->update($request->all());

        if ($request->hasFile('image')) {

            Attachment::updateAttachment($request->file('image'),$articles->attachment,$articles,'articles');
        }

        return redirect()->route('articles.index')
            ->with(['message' => "تم تعديل $articles->title_ar بنجاح"]);
    }


    public function destroy($id)
    {
        $articles = Article::findOrFail($id);
        $articles->delete();
        return redirect()->route('articles.index')
            ->with(['delete' => "تم حذف $articles->title_ar"]);
    }


    public function delete(Request $request) {
        $articles = Article::onlyTrashed()->where(function ($q) use($request){
            if($request->keyword){
                $q->where('name' , 'LIKE' , '%'.$request->keyword.'%')
                    ->orWhere('email' , 'LIKE' , '%'.$request->keyword.'%')
                    ->orWhere('username' , 'LIKE' , '%'.$request->keyword.'%')
                    ->orWhere('bio' , 'LIKE' , '%'.$request->keyword.'%')
                    ->orWhere('phone' , 'LIKE' , '%'.$request->keyword.'%')
                    ->orWhere('location' , 'LIKE' , '%'.$request->keyword.'%')
                    ->orWhere('phone' , 'LIKE' , '%'.$request->keyword.'%');
            }})->paginate(10);
        return view('admin.articles.delete', compact('articles'));

    }

    public function recovery($id)
    {
        $articles = Article::where('id', $id)->withTrashed()->first();
        $articles->restore();

        return redirect()->route('articles.index')
            ->with('message', "لقد نجحت في استعادة المقالة $articles->title_ar");
    }

    public function forcedelete($id)
    {
        $articles = Article::where('id', $id)->forceDelete();

        return redirect()->route('articles.index')
            ->with(['delete' => "تم حذف المقالة نهائياً"]);
    }

    public function stopped(Request $request)
    {
        $articles = Article::status()->orderBy('id','DESC')->where(function ($q) use($request){
            if($request->keyword){
                $q->where('title_ar' , 'LIKE' , '%'.$request->keyword.'%')
                    ->orWhere('title_en' , 'LIKE' , '%'.$request->keyword.'%')
                    ->orWhere('content_ar' , 'LIKE' , '%'.$request->keyword.'%')
                    ->orWhere('content_en' , 'LIKE' , '%'.$request->keyword.'%')
                    ->orWhere('language_id' , 'LIKE' , '%'.$request->keyword.'%')
                    ->orWhere('framework_id' , 'LIKE' , '%'.$request->keyword.'%')
                    ->orWhere('level_id' , 'LIKE' , '%'.$request->keyword.'%')
                    ->orWhere('by' , 'LIKE' , '%'.$request->keyword.'%');
            }})->paginate(12);
        return view('admin.articles.stopped',compact('articles'));
    }
}
