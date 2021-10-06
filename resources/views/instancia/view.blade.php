@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>{{ __('Instancia: ') }}{{$instancia->title}}</h2>
                </div>
                <div class="card" style="width: 100%;">
                    <div class="card-body">
                        <p class="card-text">{{$instancia->description}}</p>
                    </div>
                    <hr>
                    <div class="container ">
                        <div class="row bootstrap snippets bootdeys">
                            <div class="col-md-8 col-sm-12">
                            <h1 class="comments-title">Comentarios ({{$comentarios->count()}})</h1>
                            <hr>
                                @foreach($comentarios as $comentario)
                                
                                <div class="be-comment">
                                    <div class="be-comment-content">
                                        <span class="be-comment-name">
                                            <h3 style="font-style: bold;">{{$comentario->name}}</h3>
                                        </span>
                                        <p class="be-comment-text">
                                            {{$comentario->data}}
                                        </p>
                                        <span style="font-style: italic;" class="be-comment-time">
                                            Enviado: {{$comentario->created_at}}
                                        </span>
                                    </div>
                                </div>
                                <hr>
                                @endforeach
                                @if($instancia->status != 'Solucionada' || Auth::user()->type == 'admin')
                                <div class="comment-wrapper">
                                    <div class="panel panel-info">
                                        <div class="panel-body">
                                            <form method="POST">
                                                @csrf
                                                <input type="hidden" value="{{$instancia->id}}" name="instancia_id">
                                                <textarea class="form-control" name="comentario" placeholder="Escribe la respuesta..." rows="10"></textarea>
                                                <br>
                                                <input type="submit" formaction="/postResponse" name="responder" value="Responder" class="btn btn-success m-1"></button>
                                                @if(Auth::user()->type == 'admin' || Auth::user()->type == 'developer')
                                                <input type="submit" formaction="/postResponseAndClose" name="responder y marcar" value="Responder y marcar como solucionada" class="btn btn-info m-1"></button>
                                                @endif
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection