<?php

namespace App\Http\Controllers;

use App\Models\Tipodocumento;
use Illuminate\Http\Request;

class TipodocumentoController extends Controller
{
    /**
     * create a new instance of the class
     *
     * @return void
     */
    function __construct()
    {
         $this->middleware('permission:tipodocumento-list|tipodocumento-create|tipodocumento-edit|tipodocumento-delete', ['only' => ['index', 'show']]);
         $this->middleware('permission:tipodocumento-create', ['only' => ['create', 'store']]);
         $this->middleware('permission:tipodocumento-edit', ['only' => ['edit', 'update']]);
         $this->middleware('permission:tipodocumento-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = Tipodocumento::orderBy('id','asc')->paginate(5);

        return view('tipodocumentos.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tipodocumentos.create');
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
        ]);
        $input = $request->except(['_token']);
    
        Tipodocumento::create($input);
    
        return redirect()->route('tipodocumentos.index')
            ->with('success','Tipo de documento creado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tpDoc = Tipodocumento::find($id);
        return view('tipodocumentos.show', compact('tpDoc'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tpDoc = Tipodocumento::find($id);
        return view('tipodocumentos.edit', compact('tpDoc'));
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
        ]);

        $tpDoc = Tipodocumento::find($id);
        $tpDoc->nombre = $request->input('nombre');
        $tpDoc->update($request->all());
    
        return redirect()->route('tipodocumentos.index')
            ->with('success','Tipo de documento Editado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tipodocumento::find($id)->delete();
    
        return redirect()->route('tipodocumentos.index')
            ->with('success', 'Tipo de documento eliminado exitosamente.');
    }
}
