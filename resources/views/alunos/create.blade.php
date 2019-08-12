@extends('layout')

@section('cabecalho')
    Adicionar Aluno
@endsection

@section('conteudo')
    <form method="post">
        @csrf
        @include('alunos._partials.alunos-form')

        <button class="btn btn-primary">Adicionar</button>
    </form>
@endsection
