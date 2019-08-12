@extends('layout')

@section('cabecalho')
    Editar Aluno {{$aluno->nome}}
@endsection

@section('conteudo')
    <form method="post">
        @csrf
        @include('alunos._partials.alunos-form')

        <button class="btn btn-primary">Adicionar</button>
    </form>
@endsection
