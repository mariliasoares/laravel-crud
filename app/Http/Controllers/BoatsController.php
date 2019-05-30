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

    public function index() {
        $boats = Boat::all();
        return view('boats.index', compact('boats'));
    }

    public function create() {
        return view('boats.create');
    }

    public function store(Request $request) { //get tenta buscar na query string, atributo de rota ou formulario
        $boat = Boat::create($request->all());
        return redirect('/boats');
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
    public function destroy($id)
    {
        Boat::destroy($id);
        return redirect()->action('BoatsController@index');
    }
}
