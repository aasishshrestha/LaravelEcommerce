<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::all();
        return view('dashboard.admin.category.index', compact('category'));
    }

    public function create()
    {
        return view('dashboard.admin.category.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'category' => 'required',

        ]);


        $category = Category::create([
            'name' => $request->category,
            'slug' => Str::slug($request->category),
        ]);
        $category->save();
        return redirect()->route('category.index')->with('message', ' Category added Successfully');
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('dashboard.admin.category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            "category" => "required",

        ]);
        $category = Category::find($id);
        $category->name = $request->category;

        $category->slug = Str::slug($request->category);
        $category->save();
        return redirect()->route('category.index')->with('message', ' Category updated Successfully');
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->back()->with('message', 'Category Deleted Successfully');;
    }
}
