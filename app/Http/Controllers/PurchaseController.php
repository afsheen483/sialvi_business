<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PurchaseModel;
use App\Models\StockModel;
use App\Models\PaymentModel;
use DB;
use Auth;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($filter)
    {
        if ($filter == 'view') {
            $data = DB::select("SELECT
            p.*,
            c.name,
            r.product_name
        FROM
            purchase p
        JOIN products r ON
            p.product_id = r.id
        JOIN clients c ON
            c.id = p.client_id
        WHERE
            p.is_deleted = 0
        ORDER BY
            p.id
        DESC
            ");
            
        }
        if ($filter == 'supplier') {
            $data = DB::select("SELECT
            p.*,
            c.name,
            r.product_name
        FROM
            purchase p
        JOIN products r ON
            p.product_id = r.id
        JOIN clients c ON
            c.id = p.client_id
        WHERE
            p.is_deleted = 0 AND c.client_type = 'supplier'
        ORDER BY
            p.id
        DESC
            ");
        }
        return view('purchase.index',compact('data'));
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $data = new PurchaseModel();
        if ($id > 0) {
           $data = PurchaseModel::find($id);
        }
        return view('purchase.forms',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->is_sold);
        $is_sold = 0;
      
      $purchase_id =  PurchaseModel::create([
            'product_id' => $request->product_id,
            'purchase_amount' => $request->purchase_amount,
            'paid_amount' => $request->paid_amount,
            'date' => $request->date,
            'is_sold' => $is_sold,
            'client_id' => $request->client_id,
            'serial_num' => $request->serial_num,
            'engine_num' => $request->engine_num,
            'created_by'=> Auth::user()->id,
        ])->id;
        
            //dd($request->is_sold);
            StockModel::create([
                'purchase_id' => $purchase_id
            ]);
        
        PaymentModel::create([
            'client_id' => $request->client_id,
            'purchase_id' => $purchase_id,
            'debit_card' => $request->paid_amount,
            'credit_card' =>$request->purchase_amount,
            'created_by'=> Auth::user()->id,


        ]);
        return redirect('purchase/view');
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
        PurchaseModel::where('id','=',$id)->update([
            'product_id' => $request->product_id,
            'purchase_amount' => $request->purchase_amount,
            'paid_amount' => $request->paid_amount,
            'date' => $request->date,
            'is_sold' => $request->is_sold,
            'client_id' => $request->client_id,
            'serial_num' => $request->serial_num,
            'engine_num' => $request->engine_num,
            'updated_by'=> Auth::user()->id,
            'updated_at'=> date("Y-d-m H:i:s"),
        ]);
        PaymentModel::where('purchase_id','=',$id)->update([
            'debit_card' => $request->paid_amount,
            'client_id' => $request->client_id,
            'credit_card' =>$request->purchase_amount,
            'updated_by' => Auth::user()->id,
            'updated_at' => date('Y-m-d H:s:i')
        ]);
        return redirect('purchase/view');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = PurchaseModel::where('id','=',$id)->update([
            'is_deleted' =>1
        ]);
        if ($delete) {
            return 1;
        }
    }
    public function Search(Request $request,$date)
    {
        if ($date) {
            //dd($request->all());
             $data = DB::select("SELECT
             p.*,
             c.name,
             r.product_name
         FROM
             purchase p
         JOIN products r ON
             p.product_id = r.id
         JOIN clients c ON
             c.id = p.client_id
         WHERE
             p.is_deleted = 0 AND p.date  = '".$date."'
         ORDER BY
             p.id
         DESC
             ");
             //dd($data);
             return view('purchase.index',compact('data'));
         }
        
        
     
    }
    public function SearchDates(Request $request)
    {
        if ( $request->to_date != '' && $request->from_date != '') {
            //dd($request->all());
             $data = DB::select("SELECT
             p.*,
             c.name,
             r.product_name
         FROM
             purchase p
         JOIN products r ON
             p.product_id = r.id
         JOIN clients c ON
             c.id = p.client_id
         WHERE
             p.is_deleted = 0 AND p.date <= '". $request->from_date."' AND p.date >= '".$request->to_date."'
         ORDER BY
             p.id
         DESC
             ");
             //dd($data);
             return view('purchase.index',compact('data'));
         }
         if ($request->from_date) {
              //dd($request->all());
             $data = DB::select("SELECT
             p.*,
             c.name,
             r.product_name
         FROM
             purchase p
         JOIN products r ON
             p.product_id = r.id
         JOIN clients c ON
             c.id = p.client_id
         WHERE
             p.is_deleted = 0 AND p.date = '".$request->from_date."' 
         ORDER BY
             p.id
         DESC
             ");
        // dd($data);
             return view('purchase.index',compact('data'));
         }
         if ($request->to_date) {
             $data = DB::select("SELECT
             p.*,
             c.name,
             r.product_name
         FROM
             purchase p
         JOIN products r ON
             p.product_id = r.id
         JOIN clients c ON
             c.id = p.client_id
         WHERE
             p.is_deleted = 0  AND p.date = '".$request->to_date."' 
         ORDER BY
             p.id
         DESC
             ");
           //dd($data);
             return view('purchase.index',compact('data'));
         }
    }
}
