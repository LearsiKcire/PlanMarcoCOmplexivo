<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    /**
     * create a new instance of the class
     *
     * @return void
     */
    function __construct()
    {
         $this->middleware('permission:empresa-list|empresa-create|empresa-edit|empresa-delete', ['only' => ['index', 'show']]);
         $this->middleware('permission:empresa-create', ['only' => ['create', 'store']]);
         $this->middleware('permission:empresa-edit', ['only' => ['edit', 'update']]);
         $this->middleware('permission:empresa-delete', ['only' => ['destroy']]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = Empresa::orderBy('id','asc')->paginate(10);

        return view('empresas.index',compact('data'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required',
            'gerente' => 'required',
        ]);
        $input = $request->except(['_token']);
    
        Empresa::create($input);
    
        return redirect()->route('empresas.index')
            ->with('success','Empresa creada exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $empresa = Empresa::find($id);
        return view('empresas.show', compact('empresa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empresa = Empresa::find($id);
        return view('empresas.edit', compact('empresa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nombre' => 'required',
            'gerente' => 'required',
        ]);

        $empresa = Empresa::find($id);
        $empresa->nombre = $request->input('nombre');
        $empresa->gerente = $request->input('gerente');
        $empresa->update($request->all());
    
        return redirect()->route('empresas.index')
            ->with('success','Empresa Editada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Empresa::find($id)->delete();
    
        return redirect()->route('empresas.index')
            ->with('success', 'Empresa eliminada exitosamente.');
    }
}
