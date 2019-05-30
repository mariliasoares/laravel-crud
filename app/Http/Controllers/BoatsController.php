<?php

namespace App\Http\Controllers;

use App\Boat;
use Illuminate\Http\Request;

class BoatsController extends Controller
{

    private $boat;

    public function __construct(Boat $boat)
    {
        $this->boat = $boat;
    }

    public function index(Request $request) {
        $boats = Boat::all();
        $mensagem = $request->session()->get('mensagem');
        return view('boats.index', compact('boats', 'mensagem'));
    }

    public function create() {
        return view('boats.create');
    }

    public function store(Request $request) { //get tenta buscar na query string, atributo de rota ou formulario
        $boat = Boat::create($request->all());
        //manipulando seçao
        $request->session()->flash('mensagem', "Barco {$boat->id} criado com sucesso {$boat->nome}");
        return redirect('/boats');
        //flash message: dura somente 1 requisiçao, laravel leu, sumiu
    }

    public function edit($id)
    {
        if (!$boat = $this->boat->find($id))
            return redirect()->back();
        return view('boats.edit', compact('boat'));
    }


    public function update(Request $request, $id)
    {
        if (!$boat = $this->boat->find($id))
            return redirect()->back();
        $data = $request->all();
        $boat->update($data);
        return redirect()->action('BoatsController@index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
    */
    public function destroy(Request $request, $id)
    {
        Boat::destroy($id);
        $request->session()->flash('mensagem', "Barco removido com sucesso!");
        return redirect('/boats');
    }
}
