<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Mail\ExcusaMail;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\ExcusaCreateRequest;
use App\Models\Excusa;
use App\Models\Instructor;

class EnviarExcusaController extends Controller
{
    //
    public function index(){

        return view('emails.savexcusa');
    }

    public function store(ExcusaCreateRequest $request){
        
        $instruc = Instructor::all();
        $correo = new ExcusaMail($request->all());
        Mail::to('cristiancamilo.bravo29@gmail.com')->send($correo);
        Excusa::insert($request->except('_token'));
        return redirect('excusa')->with('info', 'Excusa enviada', compact('instruc'));
    }
}
