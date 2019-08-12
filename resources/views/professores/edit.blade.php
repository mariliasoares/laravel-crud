@extends('layout')

@section('cabecalho')
    Editar Professor {{$professor->nome}}
@endsection

@section('conteudo')
    <form method="post">
        @csrf
        @include('professores._partials.professores-form')

        <button class="btn btn-primary">Adicionar</button>
    </form>
@endsection
