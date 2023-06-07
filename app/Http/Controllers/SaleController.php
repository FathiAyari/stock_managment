<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Sale;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function index()
    {
        $sales = Sale::with('client', 'product')->get();
        return response([
            'sales' => $sales,

        ], 200);
    }

    public function create(Request  $request)
    {
        $product=Product::find($request->product_id);
        $total=$product->price*$request->quantity+$request->delivery -$request->discount;
        if($product->quantity>$request->quantity){
            $product->update([
                "quantity"=>$product->quantity-$request->quantity
            ]);
            Sale::create([
                "product_id"=>$request->product_id,
                "client_id"=>$request->client_id,
                "quantity"=>$request->quantity,
                "delivery"=>$request->delivery,
                "price"=>$total,
                "discount"=>$request->discount,

            ]);

            return response(['message' => 'Vente est bien ajouter']);
        }else{
            return response(['message' => 'quantité insuffisante']);

        }

    }

    public function update(Request $request,  $id)
    {
        $sale=Sale::find($id);
        $product=Product::find($request->product_id);

        $total=$product->price*$request->quantity+$request->delivery -$request->discount;
        $product->update([
            "quantity"=>$product->quantity+$sale->quantity -$request->quantity
        ]);
        $sale->update(["quantity"=>$request->quantity,
            "delivery"=>$request->delivery,
            "price"=>$total,
            "discount"=>$request->discount,]);
        return response([
            'message' => 'vente est modifier',

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
        $sale=Sale::find($id);

        $sale->delete();
        return response([
            'message' => 'vente est supprimer',

        ], 200);
    }
}
