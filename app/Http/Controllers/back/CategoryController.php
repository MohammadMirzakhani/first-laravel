<?php

namespace App\Http\Controllers\back;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBY('id','DESC')->paginate('10');
        return view('back.categories.category',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.categories.catecreate');
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
        ];
        $validatedData = $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:categories',

        ], $messages);
        $category = new Category([
                'name' => $request->get('name'),
                'slug' => $request->get('slug'),
        ]);
        $category->save();
        $msg = "ذخیره ی دسته بندی جدید با موفقیت انجام شد";
        return redirect(route('admin.categories'))->with('success', $msg);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('back.categories.cateedit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $messages = [
            'name.required' => 'فیلد نام را وارد نمایید',
            'slug.unique' => 'فیلد نام مستعار تکراری است.عنوان را عوض کنید',
            'slug.required' => 'نام دسته بندی را وارد نمایید',
        ];
        $validatedData = $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:categories,slug,'.$category->id,

        ], $messages);

         $category->update($request->all());

        $msg = "ویرایش با موفقیت انجام شد";
        return redirect(route('admin.categories'))->with('success', $msg);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {

        $category->delete();
        $msg = "آیتم مورد نظر حذف گردید";
        return redirect(route('admin.categories'))->with('success', $msg);
    }
}
