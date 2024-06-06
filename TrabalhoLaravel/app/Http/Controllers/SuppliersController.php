<?php

namespace App\Http\Controllers;

use App\Models\Suppliers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class SuppliersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suppliers = DB::table('suppliers')
            ->select([
                'suppliers.id',
                'suppliers.name',
                'suppliers.document_type',
                'suppliers.document',
                'suppliers.phone'
            ])
            ->get()
            ->all();

        return view('suppliers.index', [
            'suppliers' => $suppliers
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        return view('suppliers.add');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Suppliers $suppliers
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $supplier = DB::table('suppliers')
            ->where('id', '=', $id)
            ->select([
                'suppliers.id',
                'suppliers.name',
                'suppliers.phone',
                'suppliers.document',
                'suppliers.document_type',
            ])
            ->get()
            ->first();

        return view('suppliers.edit', [
            'supplier' => $supplier
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Suppliers $suppliers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Suppliers $suppliers)
    {
        try {
            if (!empty($request->request->get('id'))) {
                $supplier = Suppliers::where('id',$request->request->get('id'))->first();
            } else {
                $supplier = new Suppliers();
            }
            $supplier->name = $request->request->get('name');
            $supplier->phone = $request->request->get('phone');
            $supplier->document_type = $request->request->get('document_type');
            $supplier->document = $request->request->get('document');
            $supplier->save();
            return redirect('suppliers');
        } catch (\Exception $e) {

            return Redirect::back()->withErrors($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        try {
            DB::table('suppliers')->where('id', '=', $id)->delete();
            return redirect('suppliers');
        } catch (\Exception $e) {

            return Redirect::back()->withErrors($e->getMessage());
        }
    }
}
