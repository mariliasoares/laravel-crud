<div class="form-group">
    <label for="nameBoat" class="">Nome</label>
    <input type="text" value="{{$boat->nameBoat ?? old('nameBoat') }}" class="form-control" name="nameBoat" id="nameBoat">

    <label for="price" class="">Preço</label>
    <input type="number" value="{{$boat->price ?? old('price')}}" class="form-control" name="price" id="price">

    <label for="cidade" class="">Cidade</label>
    <input type="text" value="{{$boat->cidade ?? old('cidade')}}" class="form-control" name="cidade" id="cidade">

    <label for="boatSize" class="">Tamanho do barco</label>
    <input type="text" value="{{$boat->boatSize ?? old('boatSize')}}" class="form-control" name="boatSize" id="boatSize">

    <label for="boatDescription" class="">Descriçao</label>
    <input type="text" value="{{$boat->boatDescription ?? old('boatDescription')}}" class="form-control" name="boatDescription" id="boatDescription">
</div>
