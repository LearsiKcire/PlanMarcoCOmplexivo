<?php

namespace App\Http\Controllers;

use App\Models\Nivel;
use Illuminate\Http\Request;

class NivelController extends Controller
{
    /**
     * create a new instance of the class
     *
     * @return void
     */
    function __construct()
    {
         $this->middleware('permission:nivel-list|nivel-create|nivel-edit|nivel-delete', ['only' => ['index', 'show']]);
         $this->middleware('permission:nivel-create', ['only' => ['create', 'store']]);
         $this->middleware('permission:nivel-edit', ['only' => ['edit', 'update']]);
         $this->middleware('permission:nivel-delete', ['only' => ['destroy']]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = Nivel::orderBy('id','asc')->paginate(10);

        return view('niveles.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('niveles.create');
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
            'descripcion' => 'required',
        ]);
        $input = $request->except(['_token']);
    
        Nivel::create($input);
    
        return redirect()->route('niveles.index')
            ->with('success','nivel creado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $nivel = Nivel::find($id);
        return view('niveles.edit', compact('nivel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $nivel = Nivel::find($id);
        return view('niveles.edit', compact('nivel'));
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
            'descripcion' => 'required',
        ]);

        $nivel = Nivel::find($id);
        $nivel->descripcion = $request->input('descripcion');
        $nivel->update($request->all());
    
        return redirect()->route('niveles.index')
            ->with('success','Nivel Editado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Nivel::find($id)->delete();
    
        return redirect()->route('niveles.index')
            ->with('success', 'Nivel eliminado exitosamente.');
    }
}
