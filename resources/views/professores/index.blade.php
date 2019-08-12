@extends('layout')

@section('cabecalho')
Professores
@endsection

@section('conteudo')

@if(!empty($mensagem))
<div class="alert alert-success">
    {{ $mensagem }}
</div>
@endif

<a href="/professores/criar" class="btn btn-dark mb-2">Adicionar</a>

<table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Nome</th>
        <th scope="col">Data de nascimento</th>
        <th scope="col">Criado em</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach($professores as $professor)
        <tr>
            <th scope="row">{{$professor->id_professor}}</th>
            <td>{{$professor->nome}}</td>
            <td>{{$professor->data_nascimento}}</td>
            <td>{{$professor->data_criacao}}</td>
            <td class="text-center espacamento">
                <a class="btn btn-primary btn-sm" href="/professores/{{$professor->id_professor}}/editar">
                    Editar
                </a>
                {{-- <button type="button" class="btn btn-primary btn-sm">
                    Editar
                </button> --}}
            <a class="btn btn-danger btn-sm" href="{{route('professores.delete', $professor->id_professor)}}">Excluir</a>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
@endsection
