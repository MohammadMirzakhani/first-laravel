<?php

namespace App\Http\Controllers\back;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::orderBy('id','DESC')->paginate(10);
        return view('back.articles.article',compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {
        $categories=Category::orderBy('id','DESC')->get();
        return view('back.articles.artcreate',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'name.required' => 'فیلد نام را وارد نمایید',
            'slug.required' => 'نام مستعار دسته بندی را وارد نمایید',
            'slug.unique' => 'فیلد نام مستعار تکراری است.عنوان را عوض کنید',
             'user_id.unique'=>'فیلد نام را وارد نمایید'
        ];
        $validatedData = $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:articles,slug,',
            'user_id' => 'required',

        ], $messages);
        $article = new Article;

        $article = $article->create($request->all());
        $article->categories()->attach($request->categories);



        $msg = "ذخیره ی دسته بندی جدید با موفقیت انجام شد";
        return redirect(route('admin.articles'))->with('success', $msg);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $categories=Category::orderBy('id','DESC')->get();
        return view('back.articles.artedit',compact('article','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $messages = [
            'name.required' => 'فیلد نام را وارد نمایید',
            'slug.required' => 'نام مستعار دسته بندی را وارد نمایید',
            'slug.unique' => 'فیلد نام مستعار تکراری است.عنوان را عوض کنید',
             'user_id.unique'=>'فیلد نام را وارد نمایید'
        ];
        $validatedData = $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:articles,slug,',
            'user_id' => 'required',

        ], $messages);

        $article->update($request->all());
        $article->categories()->sync($request->categories);

        $msg = "ذخیره ی دسته بندی جدید با موفقیت انجام شد";
        return redirect(route('admin.articles'))->with('success', $msg);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();
        $msg = "آیتم مورد نظر حذف گردید";
        return redirect(route('admin.articles'))->with('success', $msg);
    }
    public function updatestatus(Article $article){
        switch($article->status){
           case 1:
            $article->status=0;
           break;
           case 0:
            $article->status=1;
           break;
        }
        $article->save();
        $msg = "وضعیت با موفقیت تغییر کرد";
        return redirect(route('admin.articles'))->with('success', $msg);
    }
}
