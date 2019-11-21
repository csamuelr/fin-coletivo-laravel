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
          <li><a href="{{ url('/home') }}">Ver todos os projetos</a></li>

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
                @if ($projeto->idUsuario === $usuario)
                <tr>
                  <td>{{ $projeto->titulo }}</td>
                  <td>{{ $projeto->custo }}</td>

                  @if ( $projeto->status )
                  <td>ATIVO</td>
                  <td>
                    <form class="form-horizontal" method="POST" action="{{ route('encerrarprojeto') }}" enctype="multipart/form-data">
                      {{ csrf_field() }}
                      <input id="id" type="hidden" class="form-control" name="id" value="{{$projeto->id}}">
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                          <button type="submit" class="btn btn-primary">
                            ENCERRAR
                          </button>
                        </div>
                      </div>
                    </form>
                  </td>
                  @else
                  <td>ENCERRADO</td>
                  <td>
                    <div class="form-group">
                      <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary" disabled>
                          ENCERRAR
                        </button>
                      </div>
                    </div>
                  </td>
                  @endif




                  @endif
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