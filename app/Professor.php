<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    protected $table = 'professors';
    protected $primaryKey = "id_professor";
    public $timestamps = false;

    protected $fillable = ['nome', 'data_nascimento', 'data_criacao'];
}
