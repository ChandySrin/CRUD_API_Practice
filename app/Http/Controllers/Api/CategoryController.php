<?php

namespace App\Http\Controllers\Api;
use App\Models\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categoies = Category::all();
        return response()->json([
            'success' => true,
            'data' => $categoies
        ], Response::HTTP_OK);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $this->categoryData($request);

        $validator = Validator::make($data, [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'is_active' => 'sometimes|boolean'
        ]);

        if ($validator->fails()){
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], Response::HTTP_UNPROCESSABLE_ENTITY);

        }

        $categoies = Category::create($validator->validated());

        return response()->json([
            'success' => true,
            'message' => 'Category created successfully',
            'data' => $categoies
        ], Response::HTTP_CREATED);
    }

    private function categoryData(Request $request): array
    {
        return $request->only([
            'name',
            'description',
            'is_active',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $categoris = Category::findOrfail($id);
        return response()->json([
            'success' => true,
            'data' => $categoris
        ], Response::HTTP_OK);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $categories= category::findOrfail($id);
        $data = $this->categoryData($request);

        $validator = Validator::make($data, [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'is_active' => 'sometimes|boolean'
        ]);

        if ($validator->fails()){
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], Response::HTTP_UNPROCESSABLE_ENTITY);

        }

        $categories->update($validator->validated());
        return response()->json([
            'success' => true,
            'message' => 'Category updated successfully',
            'data' => $categories
        ], Response::HTTP_OK);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categories = Category::findOrfail($id);
        if(!$categories){
            return response()->json([
                'message' => 'This category not found'
            ], Response::HTTP_NOT_FOUND);
        }

        $categories->delete();
        return response()->json([
            'success' => true,
            'message' => 'Category deleted successfully'
        ], Response::HTTP_OK);
    }
}
