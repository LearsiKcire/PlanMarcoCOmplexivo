<?php

namespace App\Http\Controllers;

use App\Models\Nivel;
use App\Models\Objetivo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ObjetivoController extends Controller
{
    /**
     * create a new instance of the class
     *
     * @return void
     */
    function __construct()
    {
         $this->middleware('permission:objetivo-list|objetivo-create|objetivo-edit|objetivo-delete', ['only' => ['index', 'show']]);
         $this->middleware('permission:objetivo-create', ['only' => ['create', 'store']]);
         $this->middleware('permission:objetivo-edit', ['only' => ['edit', 'update']]);
         $this->middleware('permission:objetivo-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = Nivel::orderBy('id','asc')->paginate(10);

        return view('objetivo.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('objetivo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $nivel_id)
    {
        $this->validate($request, [
            'descripcion' => 'required',
        ]);
        $input = $request->except(['_token']);
    
        Objetivo::create($input);
    
        return redirect()->route('niveles.index')
            ->with('success','nivel creado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($nivel_id)
    {
        $nivel = DB::table('nivels')->where('id','=', $nivel_id)->get();
        $objects = DB::table('objetivos')->where('nivel_id','=', $nivel_id)->get();
        return view('objetivo.show', compact('objects','nivel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $objetivo = Objetivo::find($id);
        return view('objetivo.edit', compact('objetivo'));
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
        $objetivo  = Objetivo::find($id);
        $objetivo->descripcion = $request->input('descripcion');
        $objetivo->nivel_id = $request->input('nivel_id');
        $objetivo->update($request->all());
    
        return redirect()->route('objetivo.show,$objetivo->nivel_id')
            ->with('success','Objetivo Editado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Objetivo::find($id)->delete();
    
        return redirect()->route('objetivo.index')
            ->with('success', 'Objetivo eliminado exitosamente.');
    }
}
