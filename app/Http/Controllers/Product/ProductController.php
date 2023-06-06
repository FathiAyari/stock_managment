<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return response([
            'products' => $products,

        ], 200);
    }

    public function create(Request  $request)
    {
        Product::create($request->all());

        return response(['message' => 'Produit est bien ajouter']);
    }

    public function update(Request $request,  $id)
    {
        $product=Product::find($id);
        $product->update($request->all());
        return response([
            'message' => 'produit est modifier',

        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id )
    {
        $product=Product::find($id);

        $product->delete();
        return response([
            'message' => 'produit est supprimer',

        ], 200);
    }
}
