<?php

namespace App\Http\Controllers;

use App\Models\Problema;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ProblemaController extends Controller
{
    public function show() {
//        $problemas = Problema::where('status', Problema::STATUS_PENDENTE)->get();
        $problemas = Problema::all();

        return view('tecnico.problemas', ['problemas' => $problemas]);
    }

    public function resolverProblema(string $problema) {

        $problema = Problema::find($problema);

        $problema->status = Problema::STATUS_RESOLVIDO;
        $problema->tecnico_id = Auth::id();
        $problema->data_resolvido = Carbon::now();
        $problema->save();

        return redirect(route('tecnico_problemas'));

    }
}
