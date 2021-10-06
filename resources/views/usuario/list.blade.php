@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>{{ __('Lista de Usuarios') }}</h1>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Mail</th>
                                <th>Tipo</th>
                                <th>Cambiar tipo</th>
                            </tr>
                        </thead>
                        @foreach($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->type}}</td>
                            <td>
                                @if($user->type != 'admin')
                                <a href="changeUserType/{{$user->id}}">Cambiar</a>
                                @endif
                            </td>
                        </tr>
                        <br>
                        @endforeach
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection