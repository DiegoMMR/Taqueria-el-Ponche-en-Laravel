<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Orden;


class OrdenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ordenes =  DB::select('CALL verOrdenes()');
        return view('ordenes.index', compact('ordenes'))->with('i');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ordenes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'cantidad' => 'required',
            'idPlato' => 'required',
            'idFactura' => 'required',
        ]);

        $cantidad = $request->input('cantidad');
        $idPlato = $request->input('idPlato');
        $idFactura = $request->input('idFactura');

        DB::select('CALL nuevaOrden(?,?,?)', array($cantidad, $idPlato, $idFactura));
        return redirect()->route('ordenes.index')->with('success','Orden creada exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $orden =  DB::select('CALL verOrden(?)', array($id));

        return view('ordenes.show', compact('orden'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $orden = Orden::find($id);
        return view('ordenes.edit', compact('orden'));
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
        request()->validate([
            'cantidad' => 'required',
            'idPlato' => 'required',
            'idFactura' => 'required',
        ]);

        $cantidad = $request->input('cantidad');
        $idPlato = $request->input('idPlato');
        $idFactura = $request->input('idFactura');

        DB::select('CALL actualizarOrden(?,?,?,?)', array($id, $cantidad, $idPlato, $idFactura));
        return redirect()->route('ordenes.index')->with('success','Orden actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Orden::find($id)->delete();
        return redirect()->route('ordenes.index')->with('success', 'Orden eliminado exitosamente');
    }
}
