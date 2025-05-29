<?php

namespace App\Http\Controllers;
use App\Models\Solicitud;
use Illuminate\Http\Request;

class SolicitudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $solicitudes = \App\Models\Solicitud::all();
            return view('solicitudes.index', compact('solicitudes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('solicitudes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tema' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'area' => 'required|in:TI,contabilidad,administracion,operaciones',
            'fecha_registro' => 'required|date',
            'fecha_cierre' => 'nullable|date',
            'estado' => 'required|in:solicitando,aprobado,rechazado',
            'observaciones' => 'nullable|string',
            'usuario_ext' => 'nullable|boolean',
        ]);

        
        $validated['usuario_ext'] = $request->has('usuario_ext');
        Solicitud::create($validated);

        return redirect()->route('solicitudes.index')->with('success', 'Solicitud creada exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('solicitudes.show', compact('solicitud'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
            $solicitud = \App\Models\Solicitud::findOrFail($id);
            return view('solicitudes.edit', compact('solicitud'));
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
        $validated = $request->validate([
            'tema' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'area' => 'required|in:TI,contabilidad,administracion,operaciones',
            'estado' => 'required|in:solicitando,aprobado,rechazado',
            'observaciones' => 'nullable|string',
            'usuario_ext' => 'nullable|boolean',
        ]);

    $solicitud = Solicitud::findOrFail($id);
    $solicitud->update($validated);

    return redirect()->route('solicitudes.index')->with('success', 'Solicitud actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
public function destroy($id)
{
    $solicitud = \App\Models\Solicitud::findOrFail($id);
    $solicitud->delete();

    return redirect()->route('solicitudes.index')->with('success', 'Solicitud eliminada correctamente');
}
}
