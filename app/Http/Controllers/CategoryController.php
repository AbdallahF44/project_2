<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dd(Product::find(1)->images);
        $categories = Category::all();
        return response()->view('a4.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return response()->view('a4.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator($request->all(), [
            'name' => 'required|string|min:3|max:45',
            'description' => 'nullable|string|min:3|max:100',
            'status' => 'required|boolean',
        ]);
        if (!$validator->fails()) {
            $category = new Category();
            $category->name = $request->input('name');
            $category->description = $request->input('description');
            $category->status = $request->input('status');
            $isSaved = $category->save();
            return response()->json(['message' => $isSaved ? 'Created successfully' : 'Created failed'], Response::HTTP_CREATED);
        } else {
            return response()->json(['message' => $validator->getMessageBag()->first()], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return response()->view('a4.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $validator = Validator($request->all(), [
            'name' => 'required|string|min:3|max:45',
            'description' => 'nullable|string|min:3|max:100',
            'status' => 'required|boolean',
        ]);

        if (!$validator->fails()) {
            $category->name = $request->input('name');
            $category->description = $request->input('description');
            $category->status = $request->input('status');
            $isUpdated = $category->save();
            return response()->json(['message' => $isUpdated ? 'Updated successfully' : 'Updated failed'], Response::HTTP_OK);
        } else {
            return response()->json(['message' => $validator->getMessageBag()->first()], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $isDeleted = $category->delete();
        return response()->json([
            'icon' => $isDeleted ? 'success' : 'error',
            'text' => $isDeleted ? 'Delete Successfully' : 'Delete Failed'
        ], $isDeleted ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
    }
}
