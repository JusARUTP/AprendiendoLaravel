<?php

namespace App\Http\Controllers;

use App\Models\Maestro;
use Illuminate\Http\Request;

use Illuminate\Validation\Rule;


class MaestroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $maestros = Maestro::all();
        return view('maestro.index',compact('maestros'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('maestro.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $maestros = new Maestro();

        $request->validate([
            'codigo' => ['required', 'unique:maestros,codigo', 'min_digits:10', 'max_digits:10'],
            'nombre' => ['required', 'regex:/^[a-zA-Z]+$/'],
            'nombre' => ['required', 'regex:/^[a-zA-Z]+$/'],
            'apellidopaterno' => ['required', 'regex:/^[a-zA-Z]+$/'],
            'apellidomaterno' => ['required', 'regex:/^[a-zA-Z]+$/'],
            'nss' => ['required','unique:maestros,nss', 'min_digits:12', 'maxdigits:12'],
            'correo' => ['required', 'unique:maestros,correo', 'email:rfc,dns']
        ]);

        $maestros->codigo = $request->get('codigo');
        $maestros->nombre = $request->get('nombre');
        $maestros->apellidopaterno = $request->get('apellidopaterno');
        $maestros->apellidomaterno = $request->get('apellidomaterno');
        $maestros->nss = $request->get('nss');
        $maestros->correo = $request->get('correo');

        $maestros->save();

        return redirect('/maestros');
    }

    /**
     * Display the specified resource.
     */
    public function show(Maestro $maestro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $maestro = Maestro::find($id);
        return view('maestro.edit', compact('maestro'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //

        $maestro = Maestro::find($id);

        $request->validate([
            'codigo' => ['required', Rule::unique('maestros','codigo')->ignore($id), 'min:10', 'max:10'],
            'nombre' => ['required'],
            'apellidopaterno' => ['required'],
            'apellidomaterno' => ['required'],
            'nss' => ['required'],
            'correo' => ['required', Rule::unique('maestros','correo')->ignore($id), 'email:rfc,dns']
        ]);

        $maestro->codigo = $request->get('codigo');
        $maestro->nombre = $request->get('nombre');
        $maestro->apellidopaterno = $request->get('apellidopaterno');
        $maestro->apellidomaterno = $request->get('apellidomaterno');
        $maestro->nss = $request->get('nss');
        $maestro->correo = $request->get('correo');

        $maestro->save();

        return redirect('/maestros');



    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $maestro = Maestro::find($id);
        $maestro->delete();

        return redirect('/maestros');
    }
}
