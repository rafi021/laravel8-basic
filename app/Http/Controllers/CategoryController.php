<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::with(['user'])->latest()->paginate(4);
        $trashedCategpries = Category::onlyTrashed()->with(['user'])->paginate(5);
        return view ('admin.category.index', compact('categories', 'trashedCategpries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryStoreRequest $request)
    {
        Category::create([
            'user_id' => Auth::user()->id,
            'category_name' => $request->input('category_name'),
            'category_slug' => Str::slug($request->input('category_name'))
        ]);

        return redirect()->route('category.index')->with([
            'success' => 'Category Created Successfully!!'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryUpdateRequest $request, Category $category)
    {
        $category->update([
            'user_id' => Auth::user()->id,
            'category_name' => $request->input('category_name'),
            'category_slug' => Str::slug($request->input('category_name'))
        ]);

        return redirect()->route('category.index')->with([
            'success' => 'Category updated Successfully!!'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('category.index')->with([
            'success' => 'Category trashed Successfully!!'
        ]);
    }

    public function Restore($id)
    {
        $category = Category::withTrashed()->findOrFail($id);
        if($category){
            $category->restore();
        }
        return redirect()->back()->with([
            'success' => 'Category restore Successfully!!'
        ]);
    }

    public function forceDelete($id)
    {
        Category::onlyTrashed()->findOrFail($id)->forceDelete();
        return redirect()->route('category.index')->with([
            'success' => 'Category deleted Successfully!!'
        ]);
    }
}
