<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $table = 'cursos';
    protected $primaryKey = "id_curso";
    public $timestamps = false;

    protected $fillable = ['nome', 'data_criacao', 'id_professor'];

    public function professor() 
    {
        return $this->belongsTo(Professor::class);
    }
}
