@extends('layout')

@section('cabecalho')
    Adicionar Professor
@endsection

@section('conteudo')
    <form method="post">
        @csrf
        @include('professores._partials.professores-form')

        <button class="btn btn-primary">Adicionar</button>
    </form>
@endsection
