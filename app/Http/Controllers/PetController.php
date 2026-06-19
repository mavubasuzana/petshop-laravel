<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use Illuminate\Http\Request;

class PetController extends Controller
{
    public function index(Request $request)
{
    $busca = $request->input('busca');

    if ($busca) {

        $pets = Pet::where(
            'nome',
            'like',
            '%' . $busca . '%'
        )->get();

    } else {

        $pets = Pet::all();

    }

    return view('pets.index', compact('pets', 'busca'));
}

    public function create()
    {
        return view('pets.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|max:100',
            'especie' => 'required|max:100',
            'raca' => 'required|max:100',
            'idade' => 'required|integer|min:0',
            'tutor' => 'required|max:100',
            'imagem' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048'
        ]);

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

        return redirect()
            ->route('pets.index')
            ->with('success', 'Pet cadastrado com sucesso!');
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
    $request->validate([
        'nome' => 'required|max:100',
        'especie' => 'required|max:100',
        'raca' => 'required|max:100',
        'idade' => 'required|integer|min:0',
        'tutor' => 'required|max:100',
        'imagem' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048'
    ]);

    if ($request->hasFile('imagem')) {

        $diretorio = public_path('img/pets');

        $arquivo = $request->file('imagem');

        $nomeImagem = time() . '.' . $arquivo->extension();

        $arquivo->move($diretorio, $nomeImagem);

        $pet->imagem = $nomeImagem;
    }

    $pet->nome = $request->nome;
    $pet->especie = $request->especie;
    $pet->raca = $request->raca;
    $pet->idade = $request->idade;
    $pet->tutor = $request->tutor;

    $pet->save();

    return redirect()
        ->route('pets.index')
        ->with('success', 'Pet atualizado com sucesso!');
}

    public function destroy(Pet $pet)
    {
        $pet->delete();

        return redirect()
            ->route('pets.index')
            ->with('success', 'Pet removido com sucesso!');
    }
}