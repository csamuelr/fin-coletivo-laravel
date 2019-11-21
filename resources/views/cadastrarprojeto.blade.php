@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Cadastrar Projeto</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('cadastrarprojeto') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('titulo') ? ' has-error' : '' }}">
                            <label for="titulo" class="col-md-4 control-label">Titulo</label>

                            <div class="col-md-6">
                                <input id="titulo" type="text" class="form-control" name="titulo" value="" required autofocus>
                                <!-- <textarea id="descricao" rows="10" id="custo" type="text" class="form-control" name="descricao" value="" required autofocus></textarea> -->
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('descricao') ? ' has-error' : '' }}">
                            <label for="descricao" class="col-md-4 control-label">Descrição</label>

                            <div class="col-md-6">
                                <!-- <input id="descricao" type="text" class="form-control" name="titulo" value="" required autofocus> -->
                                <textarea id="descricao" rows="10" id="custo" type="text" class="form-control" name="descricao" value="" required autofocus></textarea>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('custo') ? ' has-error' : '' }}">
                            <label for="custo" class="col-md-4 control-label">Custo</label>

                            <div class="col-md-6">
                                <input id="custo" type="number" class="form-control" name="custo" value="" required autofocus>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('tempoDev') ? ' has-error' : '' }}">
                            <label for="custo" class="col-md-4 control-label">Tempo de Desenvolvimento</label>

                            <div class="col-md-6">
                                <input id="tempoDev" type="date" class="form-control" name="tempoDev" value="" required autofocus>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('imagem1') ? ' has-error' : '' }}">
                            <label for="imagem1" class="col-md-4 control-label">Imagem 1</label>

                            <div class="col-md-6">
                                <input id="imagem1" accept='image/*' type="file" class="form-control" name="imagem1" value="" required autofocus>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('imagem2') ? ' has-error' : '' }}">
                            <label for="imagem2" class="col-md-4 control-label">Imagem 2</label>

                            <div class="col-md-6">
                                <input id="imagem2" accept='image/*' type="file" class="form-control" name="imagem2" value="" required autofocus>
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