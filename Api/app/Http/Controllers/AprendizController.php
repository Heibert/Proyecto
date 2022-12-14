<?php

namespace App\Http\Controllers;
use App\Models\Aprendiz;
use App\Models\Ficha;
use App\Models\User;
use App\Imports\AprendizImport;
use App\Http\Requests\AprendizCreateRequest;
use App\Http\Requests\AprendizEditRequest;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
//use Illuminate\Support\Facades\Validator;

class AprendizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['aprendiz']=Aprendiz::paginate();
        return view('aprendiz.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::all();
        $fichas = Ficha::all();
        return view('aprendiz.create', compact('fichas', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AprendizCreateRequest $request)
    {
        $datosAprendiz = $request->except('_token'); 
        Aprendiz::insert($datosAprendiz); 
        return redirect('aprendiz')->with("Aprendiz registrado");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Aprendiz  $aprendiz
     * @return \Illuminate\Http\Response
     */
    public function show(Aprendiz $aprendiz)
    {
        $datos['aprendiz']=Aprendiz::paginate();
        return view('aprendiz.index', $datos);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Aprendiz  $aprendiz
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('aprendiz.edit')->with([
            'aprendiz' => Aprendiz::find($id),
            'fichas' => Ficha::all(),
            'user' => User::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Aprendiz  $aprendiz
     * @return \Illuminate\Http\Response
     */
    public function update(AprendizEditRequest $request, $id)
    {
        $datosAprend = $request->except('_token','_method');
        Aprendiz::where('id', '=', $id)->update($datosAprend);

        return redirect('aprendiz')->with([
            'aprendiz' => Aprendiz::find($id),
            'fichas' => Ficha::find('id'),
            'user' => User::find('id')
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Aprendiz  $aprendiz
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {       
        Aprendiz::destroy($id); 
        return redirect('aprendiz');
    }
    
    public function import(Request $request){
        $file = $request->file('file');
        Excel::import(new AprendizImport, $file);

        return redirect()->route('aprendiz.index')->with('success','aprendizes importadas con exito'); 
    }

}
