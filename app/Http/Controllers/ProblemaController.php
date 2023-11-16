<?php

namespace App\Http\Controllers;

use App\Models\Problema;
use App\Models\User;
use App\Models\Sala;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ProblemaController extends Controller
{
    public function show() {
//        $problemas = Problema::where('status', Problema::STATUS_PENDENTE)->get();
        $problemas = Problema::all();
        $salas = Sala::all();

        return view('tecnico.problemas', ['problemas' => $problemas, 'salas' => $salas]);
    }

    public function resolverProblema(string $problema) {

        $problema = Problema::find($problema);

        $problema->status = Problema::STATUS_RESOLVIDO;
        $problema->tecnico_id = Auth::id();
        $problema->data_resolvido = Carbon::now();
        $problema->save();

        return redirect(route('tecnico_problemas'));
    }

    public function registrarProblemaPage() {
        $salas = Sala::all();

        return view('tecnico.problemas.registrar', ['salas' => $salas]);
    }

    public function registrarProblema(Request $request) {

        $titulo = $request->input('titulo');
        $sala = $request->input('sala');
        $descricao = $request->input('descricao') ?? '';

        Problema::create([
            'titulo' => $titulo,
            'sala_id' => $sala,
            'descricao' => $descricao,
            'user_id' => Auth::user()->id,
            'status' => Problema::STATUS_PENDENTE,
        ]);

        return redirect(route('tecnico_problemas'));
    }

}
