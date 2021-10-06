<?php

namespace App\Http\Controllers;

use App\Events\Mensaje;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class MensajeConstroller extends Controller
{
    public function mensaje(Request $request){
        //event(new Mensaje(Auth::user()->email,$request->input('mensaje')));
        event(new Mensaje($request->input('username'),$request->input('mensaje')));

        return ["Done"];
    }
}
