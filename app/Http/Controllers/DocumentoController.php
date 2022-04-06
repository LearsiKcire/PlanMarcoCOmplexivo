<?php

namespace App\Http\Controllers;

use App\Models\Documento;
use App\Models\Nivel;
use App\Models\Tipodocumento;
use App\Models\User;
use Illuminate\Http\Request;


class DocumentoController extends Controller
{
    /**
     * create a new instance of the class
     *
     * @return void
     */
    function __construct()
    {
        $this->middleware('permission:documento-list|documento-create|documento-edit|documento-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:documento-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:documento-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:documento-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        // $datac = User::select("users.name_f","users.name_s","users.apellido_f","users.apellido_s","users.cedula","nivels.descripcion as nivel","empresas.nombre as empresa")
        //         ->join("nivels","users.nivel_id","=","nivels.id")
        //         ->join("empresas","users.empresa_id","=","empresas.id")
        //         ->get();

        //         dd($datac);

        $data = User::join('nivels', 'nivels.id', '=', 'users.nivel_id')
            ->where('nivels.descripcion', '!=', 'Ninguno')
            ->get(['users.id', 'users.name_f', 'users.name_s', 'users.apellido_f', 'users.apellido_s', 'users.cedula', 'nivels.descripcion as nivel']);

        return view('documento.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //$user = User::where('nivel_id', '!=', '7')->get();
        
         $uc = User::join('nivels', 'nivels.id', '=', 'users.nivel_id')
         ->where('users.id', '=', $request->useres)
         ->get(['users.id', 'users.name_f', 'users.apellido_f', 'users.nivel_id', 'nivels.descripcion as nivel' ]);
         //dd($user);
        $nivel = Nivel::get();
        $tp = Tipodocumento::get();
        
        return view('documento.create', compact('uc','tp', 'nivel'));
  
    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * @param  int  $id
     
     */
    public function store(Request $request)
    {
        $input = $request->except(['_token']);
        Documento::create($input);
        return redirect()->route('documento.index')
            ->with('success', 'Documento creado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $informacion = Documento::join('nivels', 'nivels.id', '=', 'documentos.nivel_id')
        ->join('users', 'users.id', '=', 'documentos.user_id')
        ->join('tipodocumentos', 'tipodocumentos.id', '=', 'documentos.tipoDocumento_id')
            ->where('users.id', '=', $id)
            ->get(['documentos.id as id_doc', 'users.name_f', 'users.name_s', 'users.apellido_f', 'users.apellido_s', 'users.nivel_id','nivels.descripcion as nivel', 'tipodocumentos.nombre as tp_doc']);

        
        return view('documento.show', compact('informacion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $documento = Documento::find($id);
        return view('documento.edit', compact('documento'));
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
            'ruta' => 'required',
        ]);
        $documento = Documento::find($id);
        $documento->ruta = $request->file('ruta')->store('public');
        $documento->update($request->only('user_id','nivel_id', 'tipoDocumento_id'));

        return redirect()->route('documento.index')
            ->with('success', 'documento Cargado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Documento::find($id)->delete();

        return redirect()->route('documento.index')
            ->with('success', 'Documento eliminado exitosamente.');
    }
}
