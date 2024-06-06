<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Ramsey\Uuid\Type\Integer;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = DB::table('products')
            ->join('suppliers', 'suppliers.id', '=', 'products.supplier_id')
            ->select([
                'products.id',
                'products.name',
                'products.price',
                'suppliers.name as supplier_name',
            ])
            ->get();

        return view('products.index', [
            'products' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        $suppliers = DB::table('suppliers')
            ->select([
                'suppliers.id',
                'suppliers.name',
            ])
            ->get()
            ->all();

        return view('products.add', [
            'suppliers' => $suppliers
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Products $products
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = DB::table('products')
            ->select([
                'products.id',
                'products.name',
                'products.price',
                'products.description',
                'products.supplier_id'
            ])
            ->where('id', '=', $id)
            ->get()
            ->first();

        $suppliers = DB::table('suppliers')
            ->select([
                'suppliers.id',
                'suppliers.name',
            ])
            ->get()
            ->all();

        return view('products.edit', [
            'product' => $product,
            'suppliers' => $suppliers
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Products $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Products $products)
    {

        try {
            if(!empty($request->request->get('id'))){
                $product = Products::where('id',$request->request->get('id'))->first();
            }else{
                $product = new Products();
            }
            $product->name = $request->request->get('name');
            $product->price = $request->request->get('price');
            $product->description = $request->request->get('description');
            $product->supplier_id = $request->request->get('supplier_id');
            $product->save();
            return redirect('products');
        } catch (\Exception $e) {

            return Redirect::back()->withErrors($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Products $products
     * @return \Illuminate\Http\Response
     */
    public function delete(Products $products)
    {

    }
}
