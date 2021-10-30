<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SaleModel;
use App\Models\PaymentModel;
use App\Models\PurchaseModel;
use DB;
use Auth;
class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
            $data = DB::select("SELECT
            s.*,
            p.product_name,
            c.name as client_name,
            c.contact
        FROM
            sales s
        JOIN products p ON
            p.id = s.product_id
        JOIN clients c ON
            c.id = s.client_id
       
        WHERE
            s.is_deleted = 0
        ORDER BY
            s.id
        DESC
            ");
            
        
        return view('sale.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $data = new SaleModel();
        if ($id > 0) {
            $data = SaleModel::find($id);
            return view('sale.forms',compact('data'));
        }
        return view('sale.forms',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image=$request->file('file');
        $base_path = '';
        $file = '';
        if ($image=$request->file('file')) {
            $file = $image->getClientOriginalName();
            $base_path = 'upload/';
            $image->move('upload',$file);
        }
       
       $sale_id =  SaleModel::create([
            'product_id' => $request->product_id,
            'sale_amount' =>$request->sale_amount,
            'client_id' => $request->client_id,
            'no_of_installments' => $request->no_of_installments,
            'rent_rate' => $request->rent_rate,
            'date' => $request->date,
            'frame_num' => $request->frame_num,
            'remaining_asal' => $request->remaining_asal,
            'total_amount' => $request->total_amount,
            'final_installment' => $request->final_installment,
            'serial_num' => $request->serial_num,
            'engine_num' => $request->engine_num,
            'asal_installment' => $request->asal_installment,
            'total_rent'=> $request->total_rent,
            'advance_amount' => $request->advance_amount,
            'installment_amount' => $request->installment_amount,
            'witness_name_1' => $request->witness_name_1,
            'witness_name_2' => $request->witness_name_2,
            'witness_cnic_1' => $request->witness_cnic_1,
            'witness_cnic_2' => $request->witness_cnic_2,
            'file' => $base_path.$file,
            'advocate_name' => $request->advocate_name,
            'paid_amount' => $request->paid_amount,
            'created_by' => Auth::user()->id
        ])->id;
        $purchase_data = PurchaseModel::where('engine_num','=',$request->engine_num)->where('serial_num','=',$request->serial_num)->get();
        PurchaseModel::where('engine_num','=',$request->engine_num)->where('serial_num','=',$request->serial_num)->update([
            'is_sold' => 1
        ]);
        //dD($purchase_data);
        PaymentModel::create([
            'client_id' => $request->client_id,
            'sale_id' => "SL-".$sale_id,
            'debit_card' => $request->sale_amount,
            'credit_card' => 0,
            'type' => 'Sale',
            'date' => date('Y-m-d'),
            'description' => 'Sale Amount',
            'created_by'=> Auth::user()->id,


        ]);
        PaymentModel::create([
            'client_id' => $request->client_id,
            'sale_id' => "SL-".$sale_id,
            'debit_card' => 0,
            'credit_card' =>$request->advance_amount,
            'type' => 'Sale',
            'date' => date('Y-m-d'),
            'description' => 'Advance Amount',
            'created_by'=> Auth::user()->id,


        ]);
        return redirect('sale');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $id = $request->client_id;
        $data = DB::select("SELECT
        s.*,
        p.product_name,
        c.name
    FROM
        sales s
    JOIN products p ON
        p.id = s.product_id
    JOIN clients c ON
        c.id = s.client_id
    WHERE
        s.is_deleted = 0 AND client_id = '".$id."'
    ORDER BY
        s.id
    DESC
        ");
        return view('sale.index',compact('data'));        
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
        if($request->file('file') != NULL){
            $image=$request->file('file');
            $file = $image->getClientOriginalName();
            $base_path = 'upload/';
            $image->move('upload',$file);
            SaleModel::where('id','=',$id)->update([
                'product_id' => $request->product_id,
                'client_id' => $request->client_id,
                'sale_amount' =>$request->sale_amount,
                'client_id' => $request->client_id,
                'frame_num' => $request->frame_num,
                'no_of_installments' => $request->no_of_installments,
                'remaining_asal' => $request->remaining_asal,
                'total_amount' => $request->total_amount,
                'final_installment' => $request->final_intallment,
                'total_rent'=> $request->total_rent,
                'asal_installment' => $request->asal_installment,
                'rent_rate' => $request->rent_rate,
                'advance_amount' => $request->advance_amount,
                'date' => $request->date,
                'installment_amount' => $request->installment_amount,
                'serial_num' => $request->serial_num,
                'engine_num' => $request->engine_num,
                'witness_name_1' => $request->witness_name_1,
                'witness_name_2' => $request->witness_name_2,
                'witness_cnic_1' => $request->witness_cnic_1,
                'witness_cnic_2' => $request->witness_cnic_2,
                'file' => $base_path.$file,
                'paid_amount' => $request->paid_amount,
                'advocate_name' => $request->advocate_name,
                'updated_by' => Auth::user()->id,
                'updated_at' => date("Y-m-d H:s:i")
            ]);
        }else{
            SaleModel::where('id','=',$id)->update([
                'product_id' => $request->product_id,
                'sale_amount' =>$request->sale_amount,
                'client_id' => $request->client_id,
                'frame_num' => $request->frame_num,
                'no_of_installments' => $request->no_of_installments,
                'remaining_asal' => $request->remaining_asal,
                'total_amount' => $request->total_amount,
                'final_installment' => $request->final_intallment,
                'total_rent'=> $request->total_rent,
                'rent_rate' => $request->rent_rate,
                'advance_amount' => $request->advance_amount,
                'date' => $request->date,
                'asal_installment' => $request->asal_installment,
                'installment_amount' => $request->installment_amount,
                'serial_num' => $request->serial_num,
                'engine_num' => $request->engine_num,
                'witness_name_1' => $request->witness_name_1,
                'witness_name_2' => $request->witness_name_2,
                'witness_cnic_1' => $request->witness_cnic_1,
                'witness_cnic_2' => $request->witness_cnic_2,
                'paid_amount' => $request->paid_amount,
                'advocate_name' => $request->advocate_name,
                'updated_by' => Auth::user()->id,
                'updated_at' => date("Y-m-d H:s:i")
            ]);
        }
        PaymentModel::where('sale_id',"SL-".$id)->update([
            'client_id' => $request->client_id,
            'debit_card' => $request->sale_amount,
            'credit_card' => 0,
            'type' => 'Sale',
            'description' => 'Sale Amount',
            'created_by'=> Auth::user()->id,


        ]);
        PaymentModel::where('sale_id',"SL-".$id)->update([
            'client_id' => $request->client_id,
            'debit_card' => 0,
            'credit_card' =>$request->advance_amount,
            'type' => 'Sale',
            'description' => 'Advance Amount',
            'updated_by'=> Auth::user()->id,


        ]);
      
       
        return redirect('sale');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $delete = SaleModel::where('id','=',$id)->update([
            'is_deleted' => 1
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
             s.*,
             p.product_name,
             c.name as client_name,
             c.contact
         FROM
             sales s
         JOIN products p ON
             p.id = s.product_id
         JOIN clients c ON
             c.id = s.client_id
         WHERE
             s.is_deleted = 0 AND s.date = '".$date."'
         ORDER BY
             s.id
         DESC
             
             ");
             //dd($data);
             return view('sale.index',compact('data'));
         }
        
        
     
    }
    public function SearchDates(Request $request)
    {
        if ( $request->to_date != '' && $request->from_date != '') {
           // dd($request->all());
             $data = DB::select("SELECT
             s.*,
             p.product_name,
             c.name
         FROM
             sales s
         JOIN products p ON
             p.id = s.product_id
         JOIN clients c ON
             c.id = s.client_id
         WHERE
             s.is_deleted = 0 AND s.date <= '". $request->from_date."' AND s.date >= '".$request->to_date."'
             ORDER BY
             s.id
         DESC
             
             ");
             //dd($data);
             return view('sale.index',compact('data'));
         }
         if ($request->from_date) {
             $data = DB::select("SELECT
             s.*,
             p.product_name,
             c.name
         FROM
             sales s
         JOIN products p ON
             p.id = s.product_id
         JOIN clients c ON
             c.id = s.client_id
         WHERE
             s.is_deleted = 0 AND s.date = '".$request->from_date."' 
             ORDER BY
             s.id
         DESC
            
             ");
           //  dd($data);
             return view('sale.index',compact('data'));
         }
         if ($request->to_date) {
           // dd($request->all());
             $data = DB::select("SELECT
             s.*,
             p.product_name,
             c.name
         FROM
             sales s
         JOIN products p ON
             p.id = s.product_id
         JOIN clients c ON
             c.id = s.client_id
         WHERE
             s.is_deleted = 0 AND s.date = '".$request->to_date."' 
             ORDER BY
             s.id
         DESC         
             ");
           //  dd($data);
             return view('sale.index',compact('data'));
         }
    }
    public function CheckNumber(Request $request)
    {
        $serial_num = $request->serial_num;
       $count =  PurchaseModel::where('serial_num','=',$serial_num);
        if ($count->count()) {
            return \Response::json(array('msg' => 'true'));
        }else{
            return \Response::json(array('msg' => 'false'));

        }
    }
    public function CheckEngineNumber(Request $request)
    {
        $engine_num = $request->engine_num;
        $count =  PurchaseModel::where('engine_num','=',$engine_num);
         if ($count->count()) {
             return \Response::json(array('msg' => 'true'));
         }else{
             return \Response::json(array('msg' => 'false'));
 
         }
    }
    public function SaleSummary($id)
    {
        $sl = "SL-";
        $data = DB::select("SELECT
            s.*,
            p.product_name,
            c.name as client_name,
            c.id as client_id,
            c.contact
        FROM
            sales s
        JOIN products p ON
            p.id = s.product_id
        JOIN clients c ON c.id = s.client_id
    
        WHERE
            s.is_deleted = 0 AND s.id = ".$id."
        ORDER BY
            s.id
        DESC
            ");
       
        $advance = PaymentModel::where("sale_id",'=',$sl.$id)->where("description",'Advance Amount')->pluck('credit_card');
        if(empty($advance)){
            $received_asal = 0;
            $remaining_asal  = 0;
            $total_received_rent  = 0;
            $remaining_rent  = 0;
        }
        //dd($advance);
        if($advance !== NULL || $advance !== '')
            {
               // dd("if");
                $received_installment = PaymentModel::where("sale_id",'=',$sl.$id)->where("type",'Installment')->sum('credit_card');
                //dd($received_installment);
               
                 $received_asal = $advance[0] + $received_installment;
                 //dd($received_asal);
                 $total_asal_amount = SaleModel::where('id','=',$id)->pluck('sale_amount');
                // dd($total_asal_amount[0]);
                $remaining_asal = $total_asal_amount[0] - $received_asal;
                //dd($remaining_asal);
                $total_rent = SaleModel::where('id','=',$id)->pluck('total_rent');
                //dd($total_rent);
         
                $total_received_rent = PaymentModel::where("sale_id",'=',$sl.$id)->where("type",'Rent Received')->sum('credit_card');
               // dd($total_received);
                $remaining_rent = $total_rent[0] - $total_received_rent;
            }
        $payment = PaymentModel::where("sale_id",'=',$sl.$id)->get();
        return view('sale.sale_summary',compact('data','payment','received_asal','remaining_asal','total_received_rent','remaining_rent'));
    }
    public function ReceiveInstallment(Request $request)
    {
        $sl = "SL-";
        PaymentModel::create([
            'sale_id' => $sl.$request->sale_id,
            'client_id'=> $request->client_id,
            'type' => 'Rent Amount',
            'date' => $request->date,
            'description' => $request->description,
            'debit_card' => $request->rent_rate,
            'credit_card' => 0,
            'created_by'=> Auth::user()->id,
            
        ]);
        PaymentModel::create([
            'sale_id' => $sl.$request->sale_id,
            'client_id'=> $request->client_id,
            'type' => 'Rent Received',
            'date' => $request->date,
            'description' =>$request->description,
            'debit_card' => 0,
            'credit_card' => $request->rent_rate,
            'created_by'=> Auth::user()->id,
            
        ]);
        PaymentModel::create([
            'sale_id' => $sl.$request->sale_id,
            'client_id'=> $request->client_id,
            'type' => 'Installment',
            'date' => $request->date,
            'description' =>$request->description,
            'debit_card' => 0,
            'credit_card' => $request->installment,
            'created_by'=> Auth::user()->id,
            
        ]);
        $data = DB::select("SELECT
                    c.name,
                    c.contact,
                    p.sale_id,
                    p.debit_card,
                    p.credit_card,
                    p.description,
                    p.date
                FROM
                    clients AS c
                JOIN payments p ON

                    p.client_id = c.id
          
                WHERE
                    p.client_id = '".$request->client_id."' ");
                     $sale = DB::select("SELECT
                     s.*
                 FROM
                     clients AS c
                 
                 JOIN sales s ON s.client_id = c.id
                 WHERE
                     s.client_id = '".$request->client_id."' ");
                             $advance = PaymentModel::where("sale_id",'=',$sl.$request->sale_id)->where("description",'Advance Amount')->pluck('credit_card');

                    $received_installment = PaymentModel::where("sale_id",'=',$sl.$request->sale_id)->where("type",'Installment')->sum('credit_card');
                    //dd($received_installment);
                    $installment_amount = SaleModel::where('id','=',$request->sale_id)->pluck('installment_amount');
                     $received_asal = $advance[0] + $received_installment;
                     //dd($received_asal);
                     $total_asal_amount = SaleModel::where('id','=',$request->sale_id)->pluck('sale_amount');
                    // dd($total_asal_amount[0]);
                    $remaining_asal = $total_asal_amount[0] - $received_asal;
                    //dd($remaining_asal);
                    $total_rent = SaleModel::where('id','=',$request->sale_id)->pluck('total_rent');
                    //dd($total_rent);
             
                    $total_received_rent = PaymentModel::where("sale_id",'=',$sl.$request->sale_id)->where("type",'Rent Received')->sum('credit_card');
                   // dd($total_received);
                    $remaining_rent = $total_rent[0] - $total_received_rent;
                  // dd($sale);
        return view('cash_flow.invoice',compact('data','sale','received_asal','remaining_asal','total_received_rent','remaining_rent','total_rent','installment_amount'));
    }
}
