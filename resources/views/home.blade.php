@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                {{ csrf_field() }}
                <div class="panel-body">
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif
                    <li><a href="{{ route('cadastrar') }}">Cadastrar</a></li>
                    <li><a href="{{ url('/projetos') }}">Ver meus projetos</a></li>

                    <div class="container-fluid">
                        <label for="pesquisa"></label>
                        <input id="pesquisa" type="text">
                    </div>
                    <div class="container-fluid">
                        <table class='table table-hover'>
                            <thead>
                                <tr>
                                    <th>Título</th>
                                    <th>Custo</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($projetos as $projeto)
                                <tr>
                                    <td>{{ $projeto->titulo }}</td>
                                    <td>{{ $projeto->custo }}</td>

                                    @if ( $projeto->status )
                                    <td>ATIVO</td>
                                    @else
                                    <td>ENCERRADO</td>
                                    @endif

                                    <td>
                                        <!-- Button to Open the Modal -->
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal{{$projeto->id}}">
                                            Ver Mais
                                        </button>

                                        <!-- The Modal -->
                                        <div class="modal" id="myModal{{$projeto->id}}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h4 class="modal-title">{{$projeto->titulo}}</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>

                                                <!-- Modal body -->
                                                <div class="modal-body">
                                                    <div class="container">
                                                        <p>Descrição: {{$projeto->descricao}} </p>                                   
                                                        <p>Custo: {{$projeto->custo}}</p>                                                   
                                                    </div>
                                                    <div class="container-fluid">
                                                        <div class="row">
                                                            <div class="col"> <img src="{{$projeto->imagem1}}" alt=""> </div>
                                                            <div class="col"> <img src="{{$projeto->imagem2}}" alt=""> </div>
                                                        </div>

                                                    </div>

                                                    @if ($projeto->status)
                                                    <div class="container-fluid">
                                                        <div class="form-row">
                                                            <form action="{{ route('apoiarprojeto') }}" method="post">
                                                                {{ csrf_field() }}
                                                                <div class="form-col">
                                                                    <h5>Apoiar Projeto</h5>
                                                                </div>
                                                                <div class="form-col form-group {{ $errors->has('valor') ? ' has-error' : '' }}">
                                                                    <div class="col-md-6 col-md-offset-4">
                                                                        <div><input type="hidden" id="idProjeto" name="idProjeto" value="{{$projeto->id}}"></div>
                                                                        <label for="valor">Valor</label>                                                                   
                                                                        <input id="valor" type="number" class="form-control" name="valor" value="" required autofocus>
                                                                        <button type="submit" class="btn btn-primary">
                                                                        Apoiar Projeto
                                                                        </button>
                                                                    </div>                        
                                                                </div>                                                               
                                                            </form>
                                                        </div>
                                                    </div>                                                   
                                                </div>
                                                @endif

                                                    <!-- Modal footer -->
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection