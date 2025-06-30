<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    
    public function index()
    {
        $product = Product::select('products.id','products.name','products.slug','products.description','products.price','products.stock', 'categories.name as nama_kategori')
        ->join('categories', 'products.category_id','=', 'categories.id')
        ->orderBy('products.created_at', 'DESC')
        ->get();

        $res = [
            'success' => true,
            'message' => 'List Product',
            'data' => $product,
        ];

        return response()->json($res, 200);
    }

    public function show($id)
    {
        $product = Product::find($id);
        
        if (!$product) {
            $res = [
                'success' => false,
                'message' => 'Product not found',
            ];
            return response()->json($res, 404);

            
        }
         $res = [
            'success' => true,
            'message' => 'List Product',
            'data' => $product,
        ];

            return response()->json($res, 200);

        

    }



}
