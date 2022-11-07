<?php

namespace App\Http\Controllers;

use App\Models\Instructor;
use App\Models\Programa;
use App\Models\Estado;
use App\Models\Ficha;
use App\Http\Requests\InstructorCreateRequest;
use App\Http\Requests\InstructorEditRequest;
use Illuminate\Http\Request;

class InstructorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['instructor']=Instructor::paginate(); 
        return view('instructor.index', $datos); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $estados = Estado::all();
        $programas = Programa::all();
        return view('instructor.create', compact('programas', 'estados'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InstructorCreateRequest $request)
    {
        $datosInst = $request->except('_token'); 
        Instructor::insert($datosInst);
        return redirect('instructor')->with("Instructor registrado");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Instructor  $instructor
     * @return \Illuminate\Http\Response
     */
    public function show(Instructor $instructor)
    {
        //
        $datos['instructor']=Instructor::paginate();
        return view('instructor.index', $datos);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Instructor  $instructor
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        return view('instructor.edit')->with([
            'instructor' => Instructor::find($id),
            'programas' => Programa::all(),
            'estados' => Estado::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Instructor  $instructor
     * @return \Illuminate\Http\Response
     */
    public function update(InstructorEditRequest $request, $id)
    {
        $datosInst = $request->except('_token','_method'); 
        Instructor::where('id', '=', $id)->update($datosInst);

        return redirect('instructor')->with([
            'instructor' => Instructor::find($id),
            'programas' => Programa::find('id'),
            'estados' => Estado::find('id')
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Instructor  $instructor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Instructor::destroy($id); 
        return redirect('instructor'); 
    }

    public function asignarFichas(Request $request){

        $ficha = Ficha::create($request->all());
        $ficha->instructores()->attach($request->get('instructores'));

        return view('instructor.asignarficha', compact('ficha'));
    }
}