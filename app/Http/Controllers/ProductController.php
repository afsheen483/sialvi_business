<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductModel;
use DB;
use Auth;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::select("SELECT * FROM products");
        return view('Product.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $data = new ProductModel();
    
        if ($id > 0) {
            $data = ProductModel::find($id);
            return view('Product.forms',compact('data'));
        }
        else{
            return view('Product.forms',compact('data'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        ProductModel::create([
        'product_name' => $request->product_name,
        'brand' => $request->brand,
        'sale_rate' => $request->sale_rate,
        'purchase_rate' => $request->purchase_rate,
        'created_by' => Auth::user()->id,
        ]);
        return redirect('/product');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        ProductModel::where('id','=',$id)->update([
            'product_name' => $request->product_name,
            'brand' => $request->brand,
            'sale_rate' => $request->sale_rate,
            'purchase_rate' => $request->purchase_rate,
            'updated_by' => Auth::user()->id,
            'update_at'=>date('Y-m-d H:s:i')
            ]);
            return redirect('/product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete =  ProductModel::where('id','=',$id)->update([
            'is_deleted'=>1
            ]);
            if($delete){
                return 1;
            }
    }
}
