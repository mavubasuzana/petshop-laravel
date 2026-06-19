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
        $request->validate([
            'pet_id' => 'required|exists:pets,id',
            'servico' => 'required|max:100',
            'status' => 'required',
            'data_atendimento' => 'required|date',
            'observacoes' => 'nullable|max:1000'
        ]);

        Atendimento::create([
            'pet_id' => $request->pet_id,
            'servico' => $request->servico,
            'status' => $request->status,
            'data_atendimento' => $request->data_atendimento,
            'observacoes' => $request->observacoes
        ]);

        return redirect()
            ->route('atendimentos.index')
            ->with('success', 'Atendimento cadastrado com sucesso!');
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
        $request->validate([
            'pet_id' => 'required|exists:pets,id',
            'servico' => 'required|max:100',
            'status' => 'required',
            'data_atendimento' => 'required|date',
            'observacoes' => 'nullable|max:1000'
        ]);

        $atendimento->update([
            'pet_id' => $request->pet_id,
            'servico' => $request->servico,
            'status' => $request->status,
            'data_atendimento' => $request->data_atendimento,
            'observacoes' => $request->observacoes
        ]);

        return redirect()
            ->route('atendimentos.index')
            ->with('success', 'Atendimento atualizado com sucesso!');
    }

    public function destroy(Atendimento $atendimento)
    {
        $atendimento->delete();

        return redirect()
            ->route('atendimentos.index')
            ->with('success', 'Atendimento removido com sucesso!');
    }
}