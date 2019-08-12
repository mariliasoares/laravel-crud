@extends('layout')

@section('cabecalho')
Cursos
@endsection

@section('conteudo')

@if(!empty($mensagem))
<div class="alert alert-success">
    {{ $mensagem }}
</div>
@endif

<a href="/cursos/criar" class="btn btn-dark mb-2">Adicionar</a>

<table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Nome</th>
        <th scope="col">Criado em</th>
        <th scope="col">ID Professor</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach($cursos as $curso)
        <tr>
            <th scope="row">{{$curso->id_curso}}</th>
            <td>{{$curso->nome}}</td>
            <td>{{$curso->data_criacao}}</td>
            <td>{{$curso->id_professor}}</td>
            
            <td class="text-center espacamento">
                <a class="btn btn-primary btn-sm" href="/cursos/{{$curso->id_curso}}/editar">
                    Editar
                </a>
                {{-- <button type="button" class="btn btn-primary btn-sm">
                    Editar
                </button> --}}
            <a class="btn btn-danger btn-sm" href="{{route('cursos.delete', $curso->id_curso)}}">Excluir</a>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
@endsection
