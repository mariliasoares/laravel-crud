@extends('layout')

@section('cabecalho')
    Adicionar Barco
@endsection

@section('conteudo')
    <form method="post">
        @csrf
        @include('boats._partials.boats-form')

        <button class="btn btn-primary">Adicionar</button>
    </form>
@endsection
