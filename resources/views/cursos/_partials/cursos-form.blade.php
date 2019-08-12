<div class="form-group">
    <form method="get" action=".">
    <div class="form-group row">
        <label for="id_professor" class="">Professor</label>
        <div class="col-md-10">
            <select class="custom-select form-control" id="id_professor" name="id_professor" required>
                @foreach( $professores as $professor )
                <option value="{{$professor->id_professor}}">{{$professor->nome}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <label for="nome" class="">Nome</label>
    <input type="text" value="{{$curso->nome ?? old('nome') }}" class="form-control" name="nome" id="nome" required>
    <br>
</div>
