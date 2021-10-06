<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function listUsers(){
        $users = DB::table('users')->get();
        return view('usuario.list',compact('users',$users));
    }

    public function changeUserType($id){
        $user = DB::table('users')->where('id',$id)->first();
        //dd($user);
        if($user && $user->type != 'admin'){
            $user->type == 'user' ?
                DB::table('users')->where('id',$id)->update([
                    'type' => 'developer'
                ])
            : 
                DB::table('users')->where('id',$id)->update([
                    'type' => 'user'
                ]);
        }
        return redirect()->route('usuario.list');
    }
}
