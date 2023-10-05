<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Products::all();
        return response()->json($user);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = new Products;
        $data->name = request('name');
        $data->price = request('price');
        $data->stock = request('stock');
        $data->save();
        return response ()->json('datas created', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Products::find($id);
        return response ()->json($data, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
    $product = Products::find($id);

    if (!$product) {
        return response()->json('Products Gak Ada', 404);
    }

    $product->name = $request->input('name');
    $product->price = $request->input('price');
    $product->stock = $request->input('stock');

    $product->save();

    return response()->json('Product updated successfully', 200);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Products::where('id', $id)->delete();
        return response()->json('data deleted', 200);
    }
}
