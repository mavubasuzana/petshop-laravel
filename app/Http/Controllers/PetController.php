<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use Illuminate\Http\Request;

class PetController extends Controller
{
    public function index()
    {
        $pets = Pet::all();

        return view('pets.index', compact('pets'));
    }

    public function create()
    {
        return view('pets.create');
    }

    public function store(Request $request)
    {
        $pet = new Pet();

        $pet->nome = $request->nome;
        $pet->especie = $request->especie;
        $pet->raca = $request->raca;
        $pet->idade = $request->idade;
        $pet->tutor = $request->tutor;

        if ($request->hasFile('imagem')) {

            $diretorio = public_path('img/pets');

            if (!file_exists($diretorio)) {
                mkdir($diretorio, 0775, true);
            }

            $arquivo = $request->file('imagem');

            $nomeImagem = time() . '.' . $arquivo->extension();

            $arquivo->move($diretorio, $nomeImagem);

            $pet->imagem = $nomeImagem;
        }

        $pet->save();

        return redirect()->route('pets.index');
    }

    public function show(Pet $pet)
    {
        $pet->load('atendimentos');

        return view('pets.show', compact('pet'));
    }

    public function edit(Pet $pet)
    {
        return view('pets.edit', compact('pet'));
    }

    public function update(Request $request, Pet $pet)
    {
        $pet->update($request->all());

        return redirect()->route('pets.index');
    }

    public function destroy(Pet $pet)
    {
        $pet->delete();

        return redirect()->route('pets.index');
    }
}