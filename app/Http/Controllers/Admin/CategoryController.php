<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryFormRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
$categories = Category::orderBy('id', 'desc')->paginate(10);
        return view('admin.category.index', compact('categories'));
    }
    public function create()
    {
        return view('admin.category.create');
    }
    public function store(CategoryFormRequest $request)
    {
        $validatedData = $request->validated();
        $slug_request = Str::slug($validatedData['name']);
        $code = random_int(1000, 9999);
        $slug = $code . '-' . $slug_request;

	$category = new Category;
        $category->slug = $slug;
        $category->name = $validatedData['name'];
        $category->save();
        return redirect('admin/categories')->with('message', 'Category Has Added');
    }
    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }
    public function update(CategoryFormRequest $request, $category)
    {
$validatedData = $request->validated();
        $category = Category::findOrFail($category);
        $category->name = $validatedData['name'];
        $category->update();
        return redirect('admin/categories')->with('message', 'Category update Succesfully');
    }
    public function destroy(int $category_id)
    {
        $category = Category::findOrFail($category_id);
        $category->delete();
        return redirect()->back()->with('message', 'category has ben Deleted!');
    }
}
