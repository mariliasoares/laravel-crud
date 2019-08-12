<?php

namespace App\Http\Controllers;

use App\Aluno;
use App\Curso;
use App\Professor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AlunosController extends Controller
{

    private $aluno;

    public function __construct(Aluno $aluno)
    {
        $this->aluno = $aluno;
    }

    public function index(Request $request) {
        $alunos = Aluno::all();
        $mensagem = $request->session()->get('mensagem');
        return view('alunos.index', compact('alunos', 'mensagem'));
    }

    public function create(Request $request) {
        $alunos = Aluno::query()->get();
        $cursos = Curso::query()->get();
        if($cursos->count()<=0)
        {
           $request->session()->flash('mensagem','Por favor, adicione um curso antes!');
           return redirect('/cursos');
        } else {
            return view('alunos.create',compact('cursos'));
        }
    }

    public function store(Request $request) { //get tenta buscar na query string, atributo de rota ou formulario
        //$aluno = aluno::create($request->all());
        $alunos = Aluno::query()->get();
        $aluno = new Aluno();
        $aluno->nome = $request->nome;
        $aluno->data_nascimento = $request->data_nascimento;
        $aluno->logradouro = $request->logradouro;
        $aluno->numero = $request->numero;
        $aluno->bairro = $request->bairro;
        $aluno->cidade = $request->cidade;
        $aluno->estado = $request->estado;
        $aluno->data_criacao = date('Y-m-d H:i:s');
        $aluno->cep = $request->cep;
        $aluno->id_curso = $request->id_curso;
        $aluno->save();
        //manipulando seçao
        $request->session()->flash('mensagem', "Aluno {$aluno->nome} criado com sucesso!");
        return redirect('/alunos');
        //flash message: dura somente 1 requisiçao, laravel leu, sumiu
    }

    public function edit($id)
    {
        $cursos = Curso::query()->get();
        if (!$aluno = $this->aluno->find($id))
            return redirect()->back();
        return view('alunos.edit', compact('aluno', 'cursos'));
    }


    public function update(Request $request, $id)
    {
        if (!$aluno = $this->aluno->find($id))
            return redirect()->back();
        $data = $request->all();
        $aluno->update($data);
        return redirect()->action('AlunosController@index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
    */
    public function destroy(Request $request, $id)
    {
        Aluno::destroy($id);
        $request->session()->flash('mensagem', "Aluno removido com sucesso!");
        return redirect('/alunos');
    }
}
