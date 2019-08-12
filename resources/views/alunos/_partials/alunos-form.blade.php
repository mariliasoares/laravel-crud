<div class="form-group">
        <form method="get" action=".">
        <label for="nome" class="">Nome</label>
        <input type="text" value="{{$aluno->nome ?? old('nome') }}" class="form-control" name="nome" id="nome">
    
        <label for="data_nascimento" class="">Data de nascimento</label>
        <input type="date" value="{{$aluno->data_nascimento ?? old('data_nascimento') }}" class="form-control" name="data_nascimento" id="data_nascimento" required >
    
        <label for="cep" class="">Cep</label>
        <input type="text" value="{{$aluno->cep ?? old('cep')}}" class="form-control" name="cep" id="cep" size="10" maxlength="9"
        onblur="pesquisacep(this.value);" />
    
        <label for="cidade" class="">Logradouro</label>
        <input type="text" value="{{$aluno->logradouro ?? old('logradouro')}}" class="form-control" name="logradouro" id="logradouro">
    
        <label for="cidade" class="">Bairro</label>
        <input type="text" value="{{$aluno->bairro ?? old('bairro')}}" class="form-control" name="bairro" id="bairro">
        
        <label for="numero" class="">Numero</label>
        <input type="number" value="{{$aluno->numero ?? old('numero')}}" class="form-control" name="numero" id="numero">

        <label for="cidade" class="">Cidade</label>
        <input type="text" value="{{$aluno->cidade ?? old('cidade')}}" class="form-control" name="cidade" id="cidade">
    
        <label for="estado" class="">Estado</label>
        <input type="text" value="{{$aluno->estado ?? old('estado')}}" class="form-control" name="estado" id="estado">
    
        <label for="id_professor" class="">Curso</label>
        <div class="col-md-10">
            <select class="custom-select form-control" id="id_curso" name="id_curso" required>
                @foreach( $cursos as $curso )
                <option value="{{$curso->id_curso}}">{{$curso->nome}}</option>
                @endforeach
            </select>
        </div>
    </div>
    