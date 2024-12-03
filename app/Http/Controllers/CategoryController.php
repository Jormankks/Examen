<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::all();
        return view('category', compact('index'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
        ]);

        Category::create($validated);

        return redirect()->route('category')->with('success', 'Categoría creada con éxito.');
    }

    public function edit(Category $category)
    {
        return view('edit', compact('category'));
    }


    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
        ]);

        $category->update($validated);

        return redirect()->route('category')->with('success', 'Categoría actualizada con éxito.');
    }

   
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('category')->with('success', 'Categoría eliminada con éxito.');
    }
}

