<?php

namespace App\Http\Controllers;

use App\Models\Livre;
use App\Models\Categorie;
use App\Models\Rayon;
use Illuminate\Http\Request;

class LivreController extends Controller
{
    public function index()
    {
        $livres = Livre::all();
        return view('livres.index', compact('livres'));
    }

    public function create()
    {
        $categories = Categorie::all();
        $rayons = Rayon::all();
        return view('livres.create', compact('categories', 'rayons'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'date_de_publication' => 'required|date',
            'nombre_de_pages' => 'required|integer',
            'auteur' => 'required|string|max:255',
            'isbn' => 'required|string|max:255',
            'editeur' => 'required|string|max:255',
            'rayon_id' => 'required|exists:rayons,id',
            'categorie_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|max:2048',
        ]);

        $path = $request->file('image') ? $request->file('image')->store('images', 'public') : null;

        Livre::create([
            'titre' => $request->titre,
            'date_de_publication' => $request->date_de_publication,
            'nombre_de_pages' => $request->nombre_de_pages,
            'auteur' => $request->auteur,
            'isbn' => $request->isbn,
            'editeur' => $request->editeur,
            'rayon_id' => $request->rayon_id,
            'categorie_id' => $request->categorie_id,
            'image' => $path,
        ]);

        return redirect()->route('livres.index')->with('success', 'Livre créé avec succès.');
    }

    public function show(Livre $livre)
    {
        return view('livres.show', compact('livre'));
    }

    public function edit(Livre $livre)
    {
        $categories = Categorie::all();
        $rayons = Rayon::all();
        return view('livres.edit', compact('livre', 'categories', 'rayons'));
    }

    public function update(Request $request, Livre $livre)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'date_de_publication' => 'required|date',
            'nombre_de_pages' => 'required|integer',
            'auteur' => 'required|string|max:255',
            'isbn' => 'required|string|max:255',
            'editeur' => 'required|string|max:255',
            'rayon_id' => 'required|exists:rayons,id',
            'categorie_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|max:2048',
        ]);

        $path = $request->file('image') ? $request->file('image')->store('images', 'public') : $livre->image;

        $livre->update([
            'titre' => $request->titre,
            'date_de_publication' => $request->date_de_publication,
            'nombre_de_pages' => $request->nombre_de_pages,
            'auteur' => $request->auteur,
            'isbn' => $request->isbn,
            'editeur' => $request->editeur,
            'rayon_id' => $request->rayon_id,
            'categorie_id' => $request->categorie_id,
            'image' => $path,
        ]);

        return redirect()->route('livres.index')->with('success', 'Livre mis à jour avec succès.');
    }

    public function destroy(Livre $livre)
    {
        $livre->delete();
        return redirect()->route('livres.index')->with('success', 'Livre supprimé avec succès.');
    }
}

