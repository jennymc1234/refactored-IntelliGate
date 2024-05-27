<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use Illuminate\Http\Request;

class EmpresaCRUDController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['empresas'] = Empresa::orderBy('id', 'desc')->paginate(5);
        return view('empresas.index', $data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('empresas.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'email' => 'required',
            'direccion' => 'required'
        ]);
        $empresa = new Empresa;
        $empresa->nombre = $request->nombre;
        $empresa->email = $request->email;
        $empresa->direccion = $request->nombre;
        $empresa->save();
        return redirect()->route('empresas.index')
            ->with('Ok', 'La empresa fue creada satisfactoriamente.');
    }
    /**
     * Display the specified resource.
     *
     * @param \App\empresa $empresa
     * @return \Illuminate\Http\Response
     */
    public function show(Empresa $empresa)
    {
        return view('empresas.show', compact('empresas'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Empresa $empresa
     * @return \Illuminate\Http\Response
     */
    public function edit(Empresa $empresa)
    {
        return view('empresas.edit', compact('empresa'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\empresa $empresa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
            'email' => 'required',
            'direccion' => 'required',
        ]);
        $empresa = Empresa::find($id);
        $empresa->nombre = $request->nombre;
        $empresa->email = $request->email;
        $empresa->direccion = $request->direccion;
        $empresa->save();
        return redirect()->route('empresas.index')
            ->with('Ok', 'La empresa fue actualizada 
satisfactoriamente.');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Empresa $empresa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empresa $empresa)
    {
        $empresa->delete();
        return redirect()->route('empresas.index')
            ->with('Ok', 'La empresa fue eliminada satisfactoriamente.');
    }
}
