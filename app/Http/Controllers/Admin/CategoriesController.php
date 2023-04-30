<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Str;

class CategoriesController extends Controller
{
    public function __construct()
    {
        $this -> middleware('permission: create category', ['only' => ['create','store']]);
        $this -> middleware('permission: edit category', ['only' => ['edit', 'update']]);
        $this -> middleware('permission: delete category',['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::paginate(10);
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this -> validate($request, [
           'name_uz' => 'required',
            'name_ru' => 'required'
        ]);

        $requestData = $request -> all();

        Category::create($requestData);
        return redirect()->route('admin.categories.index')->with('success', 'Category created successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('admin.categories.show' , compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.categories.update', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
         $this -> validate($request, [
           'name_uz' => 'required',
            'name_ru' => 'required'
        ]);

        $requestData = $request -> all();

        $category->update($requestData);

        return redirect()->route('admin.categories.index')->with('success', 'Category updated successfully !');
    }

    /**
     * Remove the specified resource from storage.e
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category -> delete();
        return redirect()->route('admin.categories.index')->with('success', 'Category Deleted successfully !');

    }
}
