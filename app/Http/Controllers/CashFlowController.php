<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaymentModel;
use App\Models\ClientModel;
use DB;
class CashFlowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $id = $request->client_id;
        $data = DB::select("SELECT
                p.*,
                c.name,
                c.client_type AS c_type,
                pr.serial_num AS p_serial_num,
                pr.engine_num AS p_engine_num,
                s.serial_num AS s_serial_num,
                s.engine_num AS s_engine_num
            FROM
                payments p
            JOIN clients c ON
                c.id = p.client_id
           LEFT JOIN purchase pr ON
            pr.id = p.purchase_id
           LEFT JOIN sales s ON s.id = p.sale_id
            WHERE
                p.is_deleted = 0 AND
                p.client_id = '".$id."'
            ORDER BY
                p.id
            DESC");
            return view('cash_flow.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $data =  new PaymentModel();
        $data1 =  new ClientModel();

        if($id > 0){
          $data =  PaymentModel::find($id);
          $client_id = $data->client_id;
          $data1 =  ClientModel::find($client_id);
          return view('cash_flow.forms',compact('data','data1'));
        }
        return view('cash_flow.forms',compact('data','data1'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function view()
    {
        $data =   DB::select("SELECT
        p.*,
        c.name,
        c.client_type AS c_type,
        pr.serial_num AS p_serial_num,
        pr.engine_num AS p_engine_num,
        s.serial_num AS s_serial_num,
        s.engine_num AS s_engine_num
    FROM
        payments p
    JOIN clients c ON
        c.id = p.client_id
   LEFT JOIN purchase pr ON
    pr.id = p.purchase_id
   LEFT JOIN sales s ON s.id = p.sale_id
    WHERE
        p.is_deleted = 0 
    ORDER BY
        p.id
    DESC
        ");
       // dd($data);
        return view('cash_flow.index',compact('data'));
    
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
        if ($request->loan == Null || $request->loan == '') {
            $request->loan = 0;
        }
        if ($request->client_id == '' || $request->client_id == NULL) {
            PaymentModel::where('id','=',$id)->update([
                'created_at' => $request->date,
                'debit_card' => $request->debit,
                'credit_card' => $request->credit,
                'description' => $request->description,
                'is_loan' => $request->loan,
                'updated_at' => date('Y-m-d H:s:i')
                ]);
           //$c_id = DB::table('payments')->latest('updated_at')->first();
           //dd($c_id->client_id);
            // ClientModel::where('id','=',$c_id->client_id)->update([
            //         'open_balance' => $request->open_balance,
            //         'updated_at' => date('Y-m-d')
            //         ]);
        }
        else{
            PaymentModel::where('id','=',$id)->update([
                'created_at' => $request->date,
                'debit_card' => $request->debit,
                'credit_card' => $request->credit,
                'client_id' => $request->client_id,
                'description' => $request->description,
                'is_loan' => $request->loan,
                'updated_at' => date('Y-m-d H:s:i')
                ]);
            // ClientModel::where('id','=',$request->client_id)->update([
            //         'open_balance' => $request->open_balance,
            //         'updated_at' => date('Y-m-d')
            //         ]);
        }
       
            return redirect('ledger');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete1 = PaymentModel::where('id','=',$id)->update([
            'is_deleted' => 1
        ]);
        if ($delete1) {
            return 1;
        }
    }
    public function SaveTransaction(Request $request){
        //dd($request->loan);
     // dd($request->sale_id);
    
     $id = '';
     $data ='';
      if ($request->sale_id > 0) {
          $request->sale_id = "SL-".$request->sale_id;
         // dd($request->sale_id);
      }
      if ($request->purchase_id > 0) {
        $request->purchase_id = "PR-".$request->purchase_id;
      }
        if ($request->ledger_id == 1 ) {
           PaymentModel::create([
                'client_id' => $request->client_id,
                'purchase_id' => $request->purchase_id,
                'sale_id' => $request->sale_id,
                'date' => $request->date,
                'description' => $request->desc,
                'credit_card' => $request->amount,
                'is_loan' => $request->loan,
                'type' => 'Client',
                'debit_card' => 0,
                'created_by' => 1,
            ]);
            
            $id = DB::getPdo()->lastInsertId();
        }
         //dd($id);   
            
            if ($request->ledger_id == 0 ) {
                PaymentModel::create([
                    'client_id' => $request->client_id,
                    'date' => $request->date,
                    'purchase_id' => $request->purchase_id,
                    'sale_id' => $request->sale_id,
                    'description' => $request->desc,
                    'debit_card' => $request->amount,
                    'is_loan' => $request->loan,
                    'credit_card'=>0,
                    'type' => 'Client',
                    'created_by' => 1,
                ]);
        }

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
                    p.id = '".$id."' ");
    //   dd($data);
        return view('cash_flow.invoice', compact('data'));
    }
    public function search(Request $request)
    {
        if ( $request->to_date != '' && $request->from_date != '') {
            // dd($request->all());
              $data = DB::select("SELECT
              p.*,
              c.name,
              c.client_type AS c_type,
              pr.serial_num AS p_serial_num,
              pr.engine_num AS p_engine_num,
              s.serial_num AS s_serial_num,
              s.engine_num AS s_engine_num
          FROM
              payments p
          JOIN clients c ON
              c.id = p.client_id
         LEFT JOIN purchase pr ON
          pr.id = p.purchase_id
         LEFT JOIN sales s ON s.id = p.sale_id
          WHERE
              p.is_deleted = 0 AND p.date <= '". $request->from_date."' AND p.date >= '".$request->to_date."'
              ORDER BY
              p.id
          DESC
              
              ");
             
              //dd($data);
              return view('cash_flow.index',compact('data'));

              
          }   
          if ($request->from_date) {
            $data = DB::select("SELECT
            p.*,
            c.name,
            c.client_type AS c_type,
            pr.serial_num AS p_serial_num,
            pr.engine_num AS p_engine_num,
            s.serial_num AS s_serial_num,
            s.engine_num AS s_engine_num
        FROM
            payments p
        JOIN clients c ON
            c.id = p.client_id
       LEFT JOIN purchase pr ON
        pr.id = p.purchase_id
       LEFT JOIN sales s ON s.id = p.sale_id
        WHERE
            p.is_deleted = 0 AND p.date = '".$request->from_date."' 
            ORDER BY
            p.id
        DESC
           
            ");
          //  dd($data);
            return view('cash_flow.index',compact('data'));
        }
        if ($request->to_date) {
          // dd($request->all());
            $data = DB::select("SELECT
            p.*,
            c.name,
            c.client_type AS c_type,
            pr.serial_num AS p_serial_num,
            pr.engine_num AS p_engine_num,
            s.serial_num AS s_serial_num,
            s.engine_num AS s_engine_num
        FROM
            payments p
        JOIN clients c ON
            c.id = p.client_id
       LEFT JOIN purchase pr ON
        pr.id = p.purchase_id
       LEFT JOIN sales s ON s.id = p.sale_id
        WHERE
            p.is_deleted = 0 AND p.date = '".$request->to_date."' 
            ORDER BY
            p.id
        DESC         
            ");
          //  dd($data);
            return view('cash_flow.index',compact('data'));
        }
    }

}
