<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use App\Models\Instancia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class InstanciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('instancia.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'type' => 'required'
        ]);
        $instancia = new Instancia();
        $instancia->title = $request->title;
        $instancia->description = $request->description;
        $instancia->type = $request->type;
        $instancia->user_id = Auth::user()->id;
        $instancia->created_at = now();
        $instancia->status = 'Pendiente';

        $instancia->save();
        return redirect('home');
    }

    public function verConversacion($id)
    {
        $instancia = DB::table('instancias')->where('id',$id)->first();
        $comentarios = DB::table('comentarios')->where('instancia_id',$id)
        ->join('users','users.id','comentarios.user_id')
        ->select('comentarios.*','users.name')
        ->orderBy('created_at')->get();
        return view('instancia.view')->with('instancia',$instancia)->with('comentarios',$comentarios);
    }

    public function responderYcerrar(Request $request)
    {
        $request->validate([
            'comentario' => 'required'
        ]);
        $comment = new Comentario();
        $comment->data = $request->input('comentario');
        $comment->user_id = Auth::user()->id;
        $comment->instancia_id = $request->input('instancia_id');
        $comment->save();
        DB::table('instancias')->where('id',$request->input('instancia_id'))->update([
            "status" => "Solucionada"
        ]);

        return redirect('home');
    }

    public function responder(Request $request)
    {
        $request->validate([
            'comentario' => 'required'
        ]);
        $comment = new Comentario();
        $comment->data = $request->input('comentario');
        $comment->user_id = Auth::user()->id;
        $comment->instancia_id = $request->input('instancia_id');
        $comment->save();

        return redirect()->back();
    }

    public function marcarComoSolucionada($id)
    {
        DB::table('instancias')->where('id',$id)->update([
            "status" => 'Solucionada'
        ]);
        return redirect('home');
    }

    public function marcarComoPendiente($id)
    {
        DB::table('instancias')->where('id',$id)->update([
            "status" => 'Pendiente'
        ]);
        return redirect('home');
    }

    public function marcarComoWontfix($id)
    {
        DB::table('instancias')->where('id',$id)->update([
            "status" => 'Wontfix'
        ]);
        return redirect('home');
    }

    public function verUrgentes()
    {
        $instancias = DB::table('instancias')->where("type","Urgente")->get();
        return view('instancia.urgentes')->with('instancias',$instancias);
    }

    public function verMedias()
    {
        $instancias = DB::table('instancias')->where("type","Medio")->get();
        return view('instancia.medias')->with('instancias',$instancias);
    }

    public function verLeves()
    {
        $instancias = DB::table('instancias')->where("type","Leve")->get();
        return view('instancia.leves')->with('instancias',$instancias);
    }

    public function verMejoras()
    {
        $instancias = DB::table('instancias')->where("type","Mejora")->get();
        return view('instancia.mejoras')->with('instancias',$instancias);
    }

    public function verPendientes()
    {
        $instancias = DB::table('instancias')->where("status","Pendiente")->get();
        return view('instancia.pendientes')->with('instancias',$instancias);
    }

    public function verSolucionadas()
    {
        $instancias = DB::table('instancias')->where("status","Solucionada")->get();
        return view('instancia.solucionadas')->with('instancias',$instancias);
    }

    public function verWontfixes()
    {
        $instancias = DB::table('instancias')->where("status","Wontfix")->get();
        return view('instancia.wontfixes')->with('instancias',$instancias);
    }
}
