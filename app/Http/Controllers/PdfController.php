<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pdf;

class PdfController extends Controller
{

    /**
     * create a new instance of the class
     *
     * @return void
     */
    function __construct()
    {
         $this->middleware('permission:pdf-list|pdf-create|pdf-edit|pdf-delete', ['only' => ['index', 'show']]);
         $this->middleware('permission:pdf-create', ['only' => ['create', 'store']]);
         $this->middleware('permission:pdf-edit', ['only' => ['edit', 'update']]);
         $this->middleware('permission:pdf-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = Pdf::latest()->paginate(10);

        return view('pdfs.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pdfs.create');
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
            'user_id' => 'required',
            'nivel_id' => 'required',
        ]);
         //$request->file('ruta')->store('public');

        $input = $request->except(['_token']);
    
        Pdf::create($input);
    
        return redirect()->route('pdfs.index')
            ->with('success','PDF creado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pdf = Pdf::find($id);
        return view('pdfs.show', compact('pdf'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pdf = Pdf::find($id);
        return view('pdfs.edit', compact('pdf'));
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
            'user_id' => 'required',
            'nivel_id' => 'required',
            'ruta' => 'required',
        ]);
        
        $pdf = Pdf::find($id);
        $pdf->ruta = $request->file('ruta')->store('public');
        $pdf->update($request->only('user_id','nivel_id'));
    
        return redirect()->route('pdfs.index')
            ->with('success','PDF Editado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pdf::find($id)->delete();
    
        return redirect()->route('pdfs.index')
            ->with('success', 'PDF eliminado exitosamente.');
    }
}
