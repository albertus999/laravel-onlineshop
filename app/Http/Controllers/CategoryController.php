<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    //index
    // public function index()
    // {
    //     // $categories = \App\Models\Category::paginate(5);
    //     $categories = \App\Models\Category::orderBy('created_at', 'desc')->paginate(5);
    //     return view('pages.category.index', compact('categories'));
    // }

    public function index(Request $request)
    {
        $query = Category::orderBy('created_at', 'desc');

        // Filter berdasarkan nama kategori jika parameter 'name' tersedia dalam request
        if ($request->has('name')) {
            $query->where('name', 'like', '%' . $request->input('name') . '%');
        }

        $categories = $query->paginate(5);

        return view('pages.category.index', compact('categories'));
    }

    //create
    public function create()
    {
        return view('pages.category.create');
    }

    //store
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:100',
            'description' => 'required|string',
            // 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10048',
        ]);

        $category = \App\Models\Category::create($validated);

        return redirect()->route('category.index')->with('success', 'Category created successfully');
    }

    //edit
    public function edit($id)
    {
        $category = \App\Models\Category::findOrFail($id);
        return view('pages.category.edit', compact('category'));
    }

    //update
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|max:100',
            'description' => 'required|string',
        ]);

        $category = \App\Models\Category::findOrFail($id);

        $category->update($validated);

        return redirect()->route('category.index')->with('success', 'Category updated successfully');
    }

    //destroy
    public function destroy($id)
    {
        $category = \App\Models\Category::findOrFail($id);
        $category->delete();

        return redirect()->route('category.index')->with('success', 'Category deleted successfully');
    }
}
