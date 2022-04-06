<?php

namespace App\Http\Controllers;

use App\Models\Nivel;
use App\Models\Nivelconocimiento;
use Illuminate\Http\Request;

class NivelconocimientoController extends Controller
{
    /**
     * create a new instance of the class
     *
     * @return void
     */
    function __construct()
    {
         $this->middleware('permission:nivelconocimiento-list|nivelconocimiento-create|nivelconocimiento-edit|nivelconocimiento-delete', ['only' => ['index', 'show']]);
         $this->middleware('permission:nivelconocimiento-create', ['only' => ['create', 'store']]);
         $this->middleware('permission:nivelconocimiento-edit', ['only' => ['edit', 'update']]);
         $this->middleware('permission:nivelconocimiento-delete', ['only' => ['destroy']]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = Nivelconocimiento::orderBy('id','DESC')->paginate(5);

        return view('nivelconocimiento.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nivel = Nivel::get();

        return view('nivelconocimiento.create', compact('nivel'));
    
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
            'conocimientoBasico' => 'required',
            'conocimiento' => 'required',
            'participacionProcedimental' => 'required',
            'valoracion' => 'required',
            'nivel_id' => 'required',
        ]);
        $input = $request->except(['_token']);
           Nivelconocimiento::create($input);
        
    
        return redirect()->route('nivelconocimiento.index')
            ->with('success', 'Nivel de conocimiento creado exitosamente.');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $nivel = Nivel::get();
        $nvConocimiento = Nivelconocimiento::find($id);

        return view('nivelconocimiento.edit', compact('nivel', 'nvConocimiento'));
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
        $input = $request->except(['_token']);
        
        $nvConocimiento = Nivelconocimiento::find($id);
        $nvConocimiento->conocimientoBasico = $request->input('conocimientoBasico');
        $nvConocimiento->conocimiento = $request->input('conocimiento');
        $nvConocimiento->participacionProcedimental = $request->input('participacionProcedimental');
        $nvConocimiento->valoracion = $request->input('valoracion');
        $nvConocimiento->nivel_id = $request->input('nivel_id');
        $nvConocimiento->update($request->all());
    
        return redirect()->route('nivelconocimiento.index')
            ->with('success','Nivel de conocimiento Editado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
