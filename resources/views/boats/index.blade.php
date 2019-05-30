@extends('layout')

@section('cabecalho')
Barcos
@endsection

@section('conteudo')
<a href="/boats/criar" class="btn btn-dark mb-2">Adicionar</a>

<ul class="list-group">
</ul>


<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nome</th>
        <th scope="col">Preço</th>
        <th scope="col">Cidade</th>
        <th scope="col">Tamanho do Barco</th>
        <th scope="col">Descriçao</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach($boats as $boat)
        <tr>
            <th scope="row">{{$boat->id}}</th>
            <td>{{$boat->nameBoat}}</td>
            <td>{{$boat->price}}</td>
            <td>{{$boat->cidade}}</td>
            <td>{{$boat->boatSize}}</td>
            <td>{{$boat->boatDescription}}</td>
            <td class="text-center espacamento">
                <a class="btn btn-primary btn-sm" href="/boats/{{$boat->id}}/editar">
                    Editar
                </a>
                {{-- <button type="button" class="btn btn-primary btn-sm">
                    Editar
                </button> --}}
            <a class="btn btn-danger btn-sm" href="{{route('boats.delete', $boat->id)}}">Excluir</a>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
@endsection
