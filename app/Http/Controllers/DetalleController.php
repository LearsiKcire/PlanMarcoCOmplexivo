<?php

namespace App\Http\Controllers;

use App\Models\Detalle;
use App\Models\Documento;
use App\Models\Objetivo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;

class DetalleController extends Controller
{
    /**
     * create a new instance of the class
     *
     * @return void
     */
    function __construct()
    {
        $this->middleware('permission:detalle-list|detalle-create|detalle-edit|detalle-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:detalle-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:detalle-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:detalle-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $informacion = Documento::join('nivels', 'nivels.id', '=', 'documentos.nivel_id')
            ->join('users', 'users.id', '=', 'documentos.user_id')
            ->join('tipodocumentos', 'tipodocumentos.id', '=', 'documentos.tipoDocumento_id')
            ->get(['documentos.id as id_doc', 'users.name_f', 'users.name_s', 'users.apellido_f', 'users.apellido_s', 'nivels.descripcion as nivel', 'tipodocumentos.nombre as tp_doc']);


        return view('detalle.index', compact('informacion'));

        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $documento = Documento::join('users', 'users.id', '=', 'documentos.user_id')
            ->join('tipodocumentos', 'tipodocumentos.id', '=', 'documentos.tipoDocumento_id')
            ->join('nivels', 'nivels.id', '=', 'documentos.nivel_id')
            ->where('documentos.id', '=', $request->documeto)
            ->get(['documentos.id', 'users.name_f', 'users.apellido_f', 'tipodocumentos.nombre', 'documentos.nivel_id', 'documentos.tipoDocumento_id', 'nivels.descripcion']);

        $buscarnivel = $documento[0]->nivel_id;
        $objetivos = Objetivo::where('nivel_id', '=', $buscarnivel)
            ->get(['id', 'descripcion']);


        return view('detalle.create', compact('objetivos', 'documento'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->except(['_token']);

        $documento = $_POST['documento_id'];
        $objetivo = $request->input('objetivo_id');
        $otroObjetivos = $_POST['otrosObjetivos'];        
        $nve = $_POST['nivelEsperado'];
        $nva = $_POST['nivelAlcanzado'];
        $tarea = $_POST['tarea'];
        $area = $_POST['area'];
        $numeroSemana = $_POST['numeroSemana'];
        $responsable = $_POST['responsable'];




        
            //              ejecutarQuery("INSERT detalle VALUES('".$documento[$i]."', '".$objetivo[$i]."', '".$nve[$i]."', '".$nva[$i]."', '".$tarea[$i]."', '" .$area[$i]."', '".$numeroSemana[$i]."', '".$responsable[$i]."')");
            // echo ("<br>" . "documento id es : ");
            // print($documento[$i]);
            // echo ("    objetivo id es : ");
            // print($objetivo[$i]);
            // echo ("    nivel esperado es : ");
            // print($nve[$i]);
            // echo ("    nivel alcanzado es : ");
            // print($nva[$i]);
            // echo ("    tarea es : ");
            // print($tarea[$i]);
            // echo ("    area es : ");
            // print($area[$i]);
            // echo ("    numero de semana es : ");
            // print($numeroSemana[$i]);
            // echo ("    responsable es : ");
            // print($responsable[$i]);
            // echo ("<br>");
            if ($otroObjetivos[1] == null) {
                for ($i = 0; $i < sizeof($documento); ++$i) {
                    if ($nve[$i] != null && $nva[$i] != null && $tarea[$i] != null && $area[$i] != null && $numeroSemana[$i] != null && $responsable[$i] != null)   {
                    $detalle = new Detalle();
                    $detalle->documento_id = $documento[$i];
                    $detalle->objetivo_id = $objetivo[$i];
                    $detalle->otrosObjetivos = "NA";
                    $detalle->nivelEsperado = $nve[$i];
                    $detalle->nivelAlcanzado = $nva[$i];
                    $detalle->tarea = $tarea[$i];
                    $detalle->area = $area[$i];
                    $detalle->numeroSemana = $numeroSemana[$i];
                    $detalle->responsable = $responsable[$i];
                    $detalle->save();
                    }
                    
                }
            } else {
                for ($i = 0; $i < sizeof($documento); ++$i) {

                    if ($otroObjetivos[$i] != null && $area[$i] != null  && $numeroSemana[$i] != null ) {
                        $detalle = new Detalle();
                        $detalle->documento_id = $documento[$i];
                        $detalle->objetivo_id = $objetivo[$i];
                        $detalle->otrosObjetivos = $otroObjetivos[$i];
                        $detalle->nivelEsperado = $nve[$i];
                        $detalle->nivelAlcanzado = $nva[$i];
                        $detalle->tarea = $tarea[$i];
                        $detalle->area = $area[$i];
                        $detalle->numeroSemana = $numeroSemana[$i];
                        $detalle->responsable = $responsable[$i];
                        $detalle->save();
                    }
               
                }
            }
           

            //DB::insert('insert into detalle (id, name) values (?, ?)', [1, 'Dayle']);
            //Db::insert('INSERT INTO detalles (`documento_id`, `objetivo_id`, `otrosObjetivos`, `nivelEsperado`, `nivelAlcanzado`, `tarea`, `area`, `numeroSemana`, `responsable`) VALUES ('."'".$documento[$i]."', '".$objetivo[$i]."', 'no objetivos', '".$nve[$i]."', '".$nva[$i]."', '".$tarea[$i]."', '".$area[$i]."', '".($numeroSemana[$i]."', '".$responsable[$i]."'".')');

        
        
         return redirect()->route('documento.index')
             ->with('success', 'Detalles Agregados exitosamente.');
    }

  
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //id es del documento
        $documento = Documento::join('users', 'users.id', '=', 'documentos.user_id')
        ->join('tipodocumentos', 'tipodocumentos.id', '=', 'documentos.tipoDocumento_id')
        ->join('nivels', 'nivels.id', '=', 'documentos.nivel_id')
        ->where('documentos.id', '=', $id)
        ->get(['documentos.id', 'users.name_f', 'users.apellido_f', 'tipodocumentos.nombre', 'documentos.tipoDocumento_id', 'nivels.descripcion']);

        $detalles = Detalle::join('objetivos', 'objetivos.id', '=', 'detalles.objetivo_id')
        ->where('documento_id', '=', $id)
        ->where('otrosObjetivos', '!=', null)
        ->where('area', '!=', null)
        ->where('numeroSemana', '!=', 'null')
        ->get(['detalles.documento_id', 'objetivos.descripcion','detalles.otrosObjetivos', 'detalles.nivelEsperado', 'detalles.nivelAlcanzado', 'detalles.tarea', 'detalles.area', 'detalles.numeroSemana', 'detalles.responsable']);
        
        return view('detalle.show', compact('detalles', 'documento'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $documento = Documento::join('users', 'users.id', '=', 'documentos.user_id')
        ->join('tipodocumentos', 'tipodocumentos.id', '=', 'documentos.tipoDocumento_id')
        ->join('nivels', 'nivels.id', '=', 'documentos.nivel_id')
        ->where('documentos.id', '=', $id)
        ->get(['documentos.id', 'users.name_f', 'users.apellido_f', 'tipodocumentos.nombre', 'documentos.tipoDocumento_id', 'nivels.descripcion']);

        $detalles = Detalle::join('objetivos', 'objetivos.id', '=', 'detalles.objetivo_id')
        ->where('documento_id', '=', $id)
        ->where('otrosObjetivos', '!=', null)
        ->where('area', '!=', null)
        ->where('numeroSemana', '!=', 'null')
        ->get(['detalles.documento_id', 'objetivos.descripcion','detalles.otrosObjetivos', 'detalles.nivelEsperado', 'detalles.nivelAlcanzado', 'detalles.tarea', 'detalles.area', 'detalles.numeroSemana', 'detalles.responsable']);
        
        return view('detalle.edit', compact('detalles', 'documento'));
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
