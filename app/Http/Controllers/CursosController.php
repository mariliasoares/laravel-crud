<?php

namespace App\Http\Controllers;

use App\Aluno;
use App\Curso;
use App\Professor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CursosController extends Controller
{

    private $curso;

    public function __construct(Curso $curso)
    {
        $this->curso = $curso;
    }

    public function index(Request $request) {
        $cursos = Curso::all();
        $mensagem = $request->session()->get('mensagem');
        return view('cursos.index', compact('cursos', 'mensagem'));
    }

    public function create(Request $request) {
        $cursos = Curso::query()->get();
        $professores = Professor::query()->get();
        if($professores->count()<=0)
        {
           $request->session()->flash('mensagem','Por favor, adicione um professor antes!');
           return redirect('/professores');
        } else {
            return view('cursos.create',compact('professores'));
        }
    }

    public function store(Request $request) { //get tenta buscar na query string, atributo de rota ou formulario
        //$curso = curso::create($request->all());
        $cursos = Curso::query()->get();
        $curso = new Curso();
        $curso->nome = $request->nome;
        $curso->data_criacao = date('Y-m-d H:i:s');
        $curso->id_professor = $request->id_professor;
        $curso->save();
        //manipulando seçao
        $request->session()->flash('mensagem', "Curso {$curso->nome} criado com sucesso!");
        return redirect('/cursos');
        //flash message: dura somente 1 requisiçao, laravel leu, sumiu
    }

    public function edit($id)
    {
        $professores = Professor::query()->get();
        if (!$curso = $this->curso->find($id))
            return redirect()->back();
        return view('cursos.edit', compact('curso', 'professores'));
    }


    public function update(Request $request, $id)
    {
        if (!$curso = $this->curso->find($id))
            return redirect()->back();
        $data = $request->all();
        $curso->update($data);
        return redirect()->action('CursosController@index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
    */
    public function destroy(Request $request, $id)
    {
        $curso = Curso::find($request->id_curso);
        $alunos = Aluno::where('id_curso',$curso->id_curso)->get();
        foreach ($alunos as $aluno)
        {
            $aluno->delete();
        }
        Curso::destroy($id);
        $request->session()->flash('mensagem', "Curso removido com sucesso!");
        return redirect('/cursos');
    }
}
