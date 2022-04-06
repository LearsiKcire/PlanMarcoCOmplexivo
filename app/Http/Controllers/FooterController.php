<?php

namespace App\Http\Controllers;

use App\Models\Footer;
use App\Models\Tipodocumento;
use Illuminate\Http\Request;

class FooterController extends Controller
{
    /**
     * create a new instance of the class
     *
     * @return void
     */
    function __construct()
    {
         $this->middleware('permission:footer-list|footer-create|footer-edit|footer-delete', ['only' => ['index', 'show']]);
         $this->middleware('permission:footer-create', ['only' => ['create', 'store']]);
         $this->middleware('permission:footer-edit', ['only' => ['edit', 'update']]);
         $this->middleware('permission:footer-delete', ['only' => ['destroy']]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = Footer::orderBy('id','DESC')->paginate(5);

        return view('footer.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipodocumentos = Tipodocumento::get();

        return view('footer.create', compact('tipodocumentos'));
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
            'conocimineto' => 'required',
            'procedimentales' => 'required',
            'estudiantiles' => 'required',
            'tipoDocumento_id' => 'required',
        ]);
        $input = $request->except(['_token']);
    
        Footer::create($input);
    
        return redirect()->route('footer.index')
            ->with('success', 'footer creado exitosamente.');
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
        //
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
        //
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
