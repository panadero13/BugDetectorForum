@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Crea una Instancia') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('instancia.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Titulo') }}</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="title" required placeholder="Inserta un titulo conciso" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Descripcion') }}</label>

                            <div class="col-md-6">
                                <textarea id="description" class="form-control wp-100" name="description" required placeholder="Inserta descripción detallada" rows="4" cols="50"></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="type" class="col-md-4 col-form-label text-md-right">{{ __('Tipo de instancia') }}</label>

                            <div class="col-md-6 ">
                                <select class="custom-select" id="type" name="type" required>
                                    <option disabled selected>Elige tipo...</option>
                                    <option value="Urgente">Urgente</option>
                                    <option value="Medio">Medio</option>
                                    <option value="Leve">Leve</option>
                                    <option value="Mejora">Mejora</option>
                                </select>
                            </div>

                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Crea la instancia') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection