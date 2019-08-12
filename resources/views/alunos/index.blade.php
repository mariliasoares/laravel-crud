@extends('layout')

@section('cabecalho')
Alunos
@endsection

@section('conteudo')

@if(!empty($mensagem))
<div class="alert alert-success">
    {{ $mensagem }}
</div>
@endif

<a href="/alunos/criar" class="btn btn-dark mb-2">Adicionar</a>

<table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Nome</th>
        <th scope="col">Data de nascimento</th>
        <th scope="col">Logradouro</th>
        <th scope="col">Bairro</th>
        <th scope="col">Cidade</th>
        <th scope="col">ID Curso</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach($alunos as $aluno)
        <tr>
            <th scope="row">{{$aluno->id_aluno}}</th>
            <td>{{$aluno->nome}}</td>
            <td>{{$aluno->data_nascimento}}</td>
            <td>{{$aluno->logradouro}}</td>
            <td>{{$aluno->bairro}}</td>
            <td>{{$aluno->cidade}}</td>
            <td>{{$aluno->id_curso}}</td>

            <td class="text-center espacamento">
                <a class="btn btn-primary btn-sm" href="/alunos/{{$aluno->id_aluno}}/editar">
                    Editar
                </a>
                {{-- <button type="button" class="btn btn-primary btn-sm">
                    Editar
                </button> --}}
            <a class="btn btn-danger btn-sm" href="{{route('alunos.delete', $aluno->id_aluno)}}">Excluir</a>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
@endsection
