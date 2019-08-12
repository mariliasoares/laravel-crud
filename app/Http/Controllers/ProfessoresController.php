<?php

namespace App\Http\Controllers;

use App\Aluno;
use App\Curso;
use App\Professor;
use Illuminate\Http\Request;

class ProfessoresController extends Controller
{

    private $professor;

    public function __construct(Professor $professor)
    {
        $this->professor = $professor;
    }

    public function index(Request $request) {
        $professores = Professor::all();
        $mensagem = $request->session()->get('mensagem');
        return view('professores.index', compact('professores', 'mensagem'));
    }

    public function create() {
        return view('professores.create');
    }

    public function store(Request $request) { //get tenta buscar na query string, atributo de rota ou formulario
        //$professor = professor::create($request->all());
        $professor = new Professor();
        $professor->nome = $request->nome;
        $professor->data_nascimento = $request->data_nascimento;
        $professor->data_criacao = $request->data_nascimento;
        $professor->save();
        //manipulando seçao
        $request->session()->flash('mensagem', "Professor {$professor->nome} criado com sucesso!");
        return redirect('/professores');
        //flash message: dura somente 1 requisiçao, laravel leu, sumiu
    }

    public function edit($id)
    {
        if (!$professor = $this->professor->find($id))
            return redirect()->back();
        return view('professores.edit', compact('professor'));
    }


    public function update(Request $request, $id)
    {
        if (!$professor = $this->professor->find($id))
            return redirect()->back();
        $data = $request->all();
        $professor->update($data);
        return redirect()->action('ProfessoresController@index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
    */
    public function destroy(Request $request, $id)
    {
        $professor = Professor::find($request->id_professor);
        $cursos = Curso::where('id_professor',$professor->id_professor)->get();
        foreach( $cursos as $curso )
        {
            $alunos = Aluno::where('id_curso',$curso->id_curso)->get();
            foreach ($alunos as $aluno)
            {
                $aluno->delete();
            }
            $curso->delete();
        }
        Professor::destroy($id);
        $request->session()->flash('mensagem', "Professor removido com sucesso!");
        return redirect('/professores');
    }
}
