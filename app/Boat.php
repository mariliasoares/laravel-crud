<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// ORM ferramenta de mapeamento de modelo orientado para modelo relacional
//de orientado a objeto e manda pro BD em query e busca query e traz como objeto

class Boat extends Model {
    protected $table = 'boats';
    public $timestamps = false; //nessa tabela nao preciso guardar essas informaçoes de tempo
    protected $fillable = ['nameBoat', 'price', 'cidade', 'boatSize', 'boatDescription'];
}
