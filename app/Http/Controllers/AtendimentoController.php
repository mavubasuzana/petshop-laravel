<?php

namespace App\Http\Controllers;

use App\Models\Atendimento;
use App\Models\Pet;
use Illuminate\Http\Request;

class AtendimentoController extends Controller
{
    public function index()
    {
        $atendimentos = Atendimento::with('pet')->get();

        return view('atendimentos.index', compact('atendimentos'));
    }

    public function create()
    {
        $pets = Pet::all();

        return view('atendimentos.create', compact('pets'));
    }

    public function store(Request $request)
    {
        Atendimento::create([
            'pet_id' => $request->pet_id,
            'servico' => $request->servico,
            'data_atendimento' => $request->data_atendimento,
            'observacoes' => $request->observacoes
        ]);

        return redirect()->route('atendimentos.index');
    }

    public function show(Atendimento $atendimento)
    {
        return view('atendimentos.show', compact('atendimento'));
    }

    public function edit(Atendimento $atendimento)
    {
        $pets = Pet::all();

        return view('atendimentos.edit', compact('atendimento', 'pets'));
    }

    public function update(Request $request, Atendimento $atendimento)
    {
        $atendimento->update([
            'pet_id' => $request->pet_id,
            'servico' => $request->servico,
            'data_atendimento' => $request->data_atendimento,
            'observacoes' => $request->observacoes
        ]);

        return redirect()->route('atendimentos.index');
    }

    public function destroy(Atendimento $atendimento)
    {
        $atendimento->delete();

        return redirect()->route('atendimentos.index');
    }
}