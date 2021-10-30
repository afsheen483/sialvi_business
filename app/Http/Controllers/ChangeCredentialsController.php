<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
class ChangeCredentialsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function changeUserPassword()
    {
        return view('admin.change_username_password.change_password');
    }
    public function changeUsername()
    {
        return view('admin.change_username_password.change_username');
    }
    public function ChangePassword(Request $request)
    {
        try {
            $hashedPassword = Auth::user()->password;
            // dd($hashedPassword);
            if (\Hash::check($request->old_password , $hashedPassword )) {
              if (!\Hash::check($request->new_password , $hashedPassword)){
                   $users =User::find(Auth::user()->id);
                   $user_id = Auth::user()->id;
                   $users_password = $request->new_password;
                  User::where('id','=',$user_id)->update([
                      'password' => Hash::make($users_password),
                  ]);
                
                   return redirect()->back()->with('message','password updated successfully');
                 }
      
                 else{
                       return redirect()->back()->with('message','new password can not be the old password!');
                     }
      
                }
      
               else{
                   
                    return redirect()->back()->with('message','old password doesnt matched ');
                  }
      
            
      
        } catch (\Throwable $th) {
            //throw $th;
            dd($th);
        }
    }
    public function Username(Request $request)
    {
        try {
            $hashedPassword = Auth::user()->email;
            // dd($request->old_email);
            if ($request->old_email == $hashedPassword) {
              if ($request->new_email != $hashedPassword){
                   $users =User::find(Auth::user()->id);
                   $user_id = Auth::user()->id;
                   $users_email = $request->new_email;
                  User::where('id','=',$user_id)->update([
                      'email' => $users_email,
                  ]);
                
                   return redirect()->back()->with('message','username updated successfully');
                 }
      
                 else{
                       return redirect()->back()->with('message','new username can not be the old username!');
                     }
      
                }
      
               else{
                   
                    return redirect()->back()->with('message','old username doesnt matched');
                  }
      
            
      
        } catch (\Throwable $th) {
            //throw $th;
            dd($th);
        }
    }
}
