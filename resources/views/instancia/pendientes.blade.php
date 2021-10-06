@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h1>{{ __('Lista de Instancias con estado Pendiente') }}</h1></div>
                <div class="card-body">
                    @foreach($instancias as $instancia)
                    <div class="card" style="width: 100%;">
                        <div class="card-body">
                            <h5 class="card-title">{{$instancia->title}}</h5>
                            <hr>
                            <p class="card-text">{{$instancia->description}}</p>
                            <p class="card-text font-weight-bold">Tipo: {{$instancia->type}}</p>
                            <p class="card-text font-weight-bold">Estado: {{$instancia->status}}</p>
                            @auth
                            @if( $instancia->user_id == Auth::user()->id)
                            <a href="/verConversacion/{{$instancia->id}}" class="btn btn-primary">Ver Respuesta</a>
                            @endif
                            @endif
                            @auth
                            @if((Auth::user()->type == 'developer' || Auth::user()->type == 'admin') && Auth::user()->type != '' )
                            <a href="/verConversacion/{{$instancia->id}}" class="btn btn-secondary">Contestar</a>
                            <a href="/marcarComoWontfix/{{$instancia->id}}" class="btn btn-danger">Marcar como WontFix</a>
                            @endif
                            @endif
                        </div>
                    </div>
                    <br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection