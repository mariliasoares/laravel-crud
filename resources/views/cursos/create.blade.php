@extends('layout')

@section('cabecalho')
    Adicionar Curso
@endsection

@section('conteudo')
    <form method="post">
        @csrf
        @include('cursos._partials.cursos-form')

        <button class="btn btn-primary">Adicionar</button>
    </form>
@endsection
