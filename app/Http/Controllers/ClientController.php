<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClientModel;
use DB;
use Auth;
class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::select("SELECT
        *
            FROM
                clients
            WHERE
                is_deleted = 0
            ORDER BY
                id
            DESC
                ");
    return view('clients.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $data = new ClientModel();
        if ($id > 0) {
            $data = ClientModel::find($id);
        }
        return view('clients.forms',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ClientModel::create([
            'name' => $request->name,
            'cnic' => $request->cnic,
            'contact' => $request->contact,
            'address' => $request->address,
            'client_type' => $request->client_type,
            'created_by' => Auth::user()->id
        ]);
        return redirect('client');
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
        ClientModel::where('id','=',$id)->update([
            'name' => $request->name,
            'cnic' => $request->cnic,
            'contact' => $request->contact,
            'address' => $request->address,
            'client_type' => $request->client_type,
            'updated_by' => Auth::user()->id,
            'updated_at' => date('Y-d-m H:i:s')
        ]);
        return redirect('client');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = ClientModel::where('id','=',$id)->update([
           'is_deleted' =>1
        ]);
        if ($delete) {
            return 1;
        }
    }
}
