<?php

namespace App\Http\Controllers;

use App\estudiantes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EstudiantesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos ['students']=estudiantes::all();
        return view('estudiantes.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('estudiantes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //hacer la petición
            //$datos= request()->all();
        //pedir respuesta 
            //return response()->json($datos);

        $datos=request()->except('_token');
        if ($request->hasFile('foto')) {
            $datos['foto']=$request->file('foto')->store('uploads','public');
        }
        estudiantes::insert($datos);


        // $datos ['students']=Estudiantes::all();
        // return view('estudiantes.index',$datos);

        return redirect('estudiantes');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\estudiantes  $estudiantes
     * @return \Illuminate\Http\Response
     */
    public function show(estudiantes $estudiantes)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\estudiantes  $estudiantes
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $estudiante = estudiantes::findOrFail($id);
        return view('estudiantes.edit',compact('estudiante'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\estudiantes  $estudiantes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datoss=request()->except(['_token','_method']);
        if ($request->hasFile('foto')) {
            //borrar la foto
            $estudiante = estudiantes::findOrFail($id);
            Storage::delete('public/'.$estudiante->foto);

            //guardar nueva foto
            $datos['foto']=$request->file('foto')->store('uploads','public');
        }

        estudiantes::where('id','=',$id)->update($datos);

        //Ambos metodos son válidos (view y redirect)

        // $datos ['students']=estudiantes::all();
        // return view('estudiantes.index',$datos);
        return redirect('estudiantes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\estudiantes  $estudiantes
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        estudiantes::destroy($id);
        return redirect('estudiantes');
    }
}
