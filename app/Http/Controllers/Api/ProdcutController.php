<?php

namespace App\Http\Controllers\Api;
use App\Models\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProdcutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::all();
        return response()->json([
            'success' => true,
            'message' => 'Data product berhasil dimuat',
            'products' => $product
        ]);
    }
    private function productData(Request $request): array
    {
        return $request->only([
            'name',
            'image',
            'price',
            'stock',
            'is_active',
            'category_id'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $this->prodcutData($request);

        $validator = Validator::make($data,[
            'name' => 'required|string|max:100',
            'image'=> 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'price' => 'required|integer|min:1000|max:10000000',
            'stock' => 'required|integer|min:1',
            'is_active' => 'sometime|boolean',
            'category_id' => 'required|exists:categories,id'
        ]);

        if ($validator->fails()){
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $product->create($validator->validated());
        return response()->json([
            'success' => true,
            'message' => 'Product berhasil dibuat',
            'data' => $product
        ]);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
