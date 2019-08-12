<div class="form-group">
    <form method="get" action=".">
    <label for="nome" class="">Nome</label>
    <input type="text" value="{{$professor->nome ?? old('nome') }}" class="form-control" name="nome" id="nome" required>
    <br>
    <label for="data_nascimento" class="">Data de nascimento</label>
    <input type="date" value="{{$professor->data_nascimento ?? old('data_nascimento') }}" class="form-control" name="data_nascimento" required >
</div>
