<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;

class ProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        $Products = Products::all();
        return response()->json([
            'status' => 'success',
            'Products' => $Products,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'productname' => 'required|string|max:255',
            'productdescription' => 'required|string|max:255',
            'productimage' => 'required|string|max:255',
        ]);

        $Products = Products::create([
            'productname' => $request->productname,
            'productdescription' => $request->productdescription,
            'productimage' => $request->productimage,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Products created successfully',
            'Products' => $Products,
        ]);
    }

    public function show($id)
    {
        $Products = Products::find($id);
        return response()->json([
            'status' => 'success',
            'Products' => $Products,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'productname' => 'required|string|max:255',
            'productdescription' => 'required|string|max:255',
            'productimage' => 'required|string|max:255',
        ]);

        $Products = Products::find($id);
        $Products->productname = $request->productname;
        $Products->productdescription = $request->productdescription;
        $Products->productimage = $request->productimage;
        $Products->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Products updated successfully',
            'Products' => $Products,
        ]);
    }

    public function destroy($id)
    {
        $Products = Products::find($id);
        $Products->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Products deleted successfully',
            'Products' => $Products,
        ]);
    }
}
