@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Cadastrar</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('cadastrarprojeto') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('titulo') ? ' has-error' : '' }}">
                            <label for="titulo" class="col-md-4 control-label">Título</label>

                            <div class="col-md-6">
                                <input id="titulo" type="text" class="form-control" name="titulo" value="" required autofocus>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('custo') ? ' has-error' : '' }}">
                            <label for="custo" class="col-md-4 control-label">Custo</label>

                            <div class="col-md-6">
                                <input id="custo" type="text" class="form-control" name="custo" value="" required autofocus>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('id') ? ' has-error' : '' }}">
                            <label for="id" class="col-md-4 control-label">asas</label>

                            <div class="col-md-6">
                                <input id="id" type="text" class="form-control" name="id" value="{{ Auth::user()->id }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Cadastrar Projeto
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