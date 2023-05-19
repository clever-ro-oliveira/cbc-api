<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clube;
use App\Models\Recurso;

class ClubeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Clube::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if($request->clube && $request->saldo && Clube::create($request->all())) {
            return response()->json([
                'clube' => $request->clube,
                'saldo_disponivel' => number_format($request->saldo, 2, ',', '')
            ], 200);
        }

        return response()->json([
            'message' => 'Erro ao cadastrar o clube!'
        ], 404);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $clube = Clube::find($id);
        if ($clube) {
            return $clube;
        }

        return response()->json([
            'message' => 'Clube não encontrado!'
        ], 404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $id_clube = $request->id_clube;
        $id_recurso = $request->id_recurso;
        $clube = Clube::find($id_clube);
        $recurso = Recurso::find($id_recurso);
        $valor = floatval($request->valor);
        $saldoAnteriorClube = $clube->saldo;
        $saldoAnteriorRecurso = $recurso->saldo;

        if ( $saldoAnteriorClube > $valor && $saldoAnteriorRecurso > $valor ) {

            $novoSaldoClube = $saldoAnteriorClube - $valor;
            $novoSaldoRecurso = $saldoAnteriorRecurso - $valor;

            $clube->update([
                'id' => $id_clube,
                'saldo' => $novoSaldoClube,
            ]);

            $recurso->update([
                'id' => $id_recurso,
                'saldo' => $novoSaldoRecurso,
            ]);

            return response()->json([
                'clube' => $clube->clube,
                'saldo_anterior' => number_format($saldoAnteriorClube, 2, ',', ''),
                'saldo_atual' => number_format($novoSaldoClube, 2, ',', '')
            ], 200);

        }
        else {
            return response()->json([
                'message' => 'O saldo disponível do clube é insuficiente.'
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
