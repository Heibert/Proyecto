<?php
/* Heibert */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tematica;
use App\Models\Aprendiz;
use App\Models\Asistencia;
use App\Models\Ficha;
use Illuminate\Support\Facades\validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AsistenciaController extends Controller
{/* Borrar */
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){   
        $userAut = Auth::user();
        
        $asistencias = DB::table('asistencias')
            ->join('aprendices', 'asistencias.id_aprendiz', '=', 'aprendices.id')
            ->join('fichas', 'fichas.id', '=', 'aprendices.id_ficha')
            ->orderBy('fechaAsistencia', 'desc')
            ->orderBy('numFicha', 'desc')->get();
        $asistenciasA = DB::table('asistencias')
            ->join('aprendices', 'asistencias.id_aprendiz', '=', 'aprendices.id')
            ->join('fichas', 'fichas.id', '=', 'aprendices.id_ficha')
            ->orderBy('fechaAsistencia', 'asc')
            ->orderBy('numFicha', 'desc')->get();
        $estadoasc = DB::table('asistencias')
            ->join('aprendices', 'asistencias.id_aprendiz', '=', 'aprendices.id')
            ->join('fichas', 'fichas.id', '=', 'aprendices.id_ficha')
            ->orderBy('estadoAsistencia', 'asc')
            ->orderBy('nombreAprend', 'asc')->get();
        $estadodesc = DB::table('asistencias')
            ->join('aprendices', 'asistencias.id_aprendiz', '=', 'aprendices.id')
            ->join('fichas', 'fichas.id', '=', 'aprendices.id_ficha')
            ->orderBy('estadoAsistencia', 'desc')
            ->orderBy('nombreAprend', 'asc')->get();
        $nombreasc = DB::table('asistencias')
            ->join('aprendices', 'asistencias.id_aprendiz', '=', 'aprendices.id')
            ->join('fichas', 'fichas.id', '=', 'aprendices.id_ficha')
            ->orderBy('nombreAprend', 'asc')
            ->orderBy('estadoAsistencia', 'asc')->get();
        $nombredesc = DB::table('asistencias')
            ->join('aprendices', 'asistencias.id_aprendiz', '=', 'aprendices.id')
            ->join('fichas', 'fichas.id', '=', 'aprendices.id_ficha')
            ->orderBy('nombreAprend', 'desc')
            ->orderBy('estadoAsistencia', 'asc')->get();
        $fichaAsc = DB::table('asistencias')
            ->join('aprendices', 'asistencias.id_aprendiz', '=', 'aprendices.id')
            ->join('fichas', 'fichas.id', '=', 'aprendices.id_ficha')
            ->orderBy('numFicha', 'desc')
            ->orderBy('nombreAprend', 'desc')->get();
        $fichaDesc = DB::table('asistencias')
            ->join('aprendices', 'asistencias.id_aprendiz', '=', 'aprendices.id')
            ->join('fichas', 'fichas.id', '=', 'aprendices.id_ficha')
            ->orderBy('numFicha', 'Asc')
            ->orderBy('nombreAprend', 'desc')->get();
        $busqueda = DB::table('asistencias')
            ->join('aprendices', 'asistencias.id_aprendiz', '=', 'aprendices.id')
            ->join('fichas', 'fichas.id', '=', 'aprendices.id_ficha')
            ->join('tematicas','tematicas.id','=', 'asistencias.id_tematica')->get();
        return  array($userAut,$busqueda, $asistencias, $asistenciasA, $estadoasc, $estadodesc, $nombreasc, $nombredesc, $fichaAsc, $fichaDesc);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $aprendices = Aprendiz::all();
        $tematicas = Tematica::all();
        $fichas = Ficha::all();
        return array($tematicas, $aprendices, $fichas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'fechaAsistencia' => 'bail|required|Date',
            'id_tematica' => 'bail|required|numeric',
            'id_ficha' => 'bail|required|numeric'
        ]);
        $aprendices = DB::table('aprendices')->where('id_ficha','=',$request->id_ficha)->pluck('id');
        $nAprendices = DB::table('fichas')->where('id','=',$request->id_ficha)->value("cantAprendiz");
        for ($i=0; $i < count($aprendices); $i++) {
            $asistencia = new Asistencia;
            $asistencia->fechaAsistencia = $request->fechaAsistencia;
            $asistencia->estadoAsistencia = "A";
            $asistencia->id_aprendiz = $aprendices[$i];
            $asistencia->id_tematica = $request->id_tematica;
            $asistencia->save();
        }
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
/*  */
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
        $asistencia = Asistencia::find($id);

        $asistencia->fechaAsistencia = $request->fechaAsistencia;
        $asistencia->estadoAsistencia = $request->estadoAsistencia;
        $asistencia->id_aprendiz = $request->id_aprendiz;
        $asistencia->id_tematica = $request->id_tematica;
        $asistencia->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $asistencia = Asistencia::findOrFail($id);
        $asistencia->delete();
        return redirect()->action([AsistenciaController::class, 'index']);
    }
}