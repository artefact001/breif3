<?php

namespace App\Http\Controllers;

use App\Models\Rayon;
use Illuminate\Http\Request;

class RayonController extends Controller {
    public function index() {
        $rayons = Rayon::all();
        return view('rayons.index', compact('rayons'));
    }

    public function create() {
        return view('rayons.create');
    }

    public function store(Request $request) {
        $request->validate([
            'libelle' => 'required|string|max:255',
            'partie' => 'required|string|max:255',
        ]);

        Rayon::create($request->all());

        return redirect()->route('rayons.index')->with('success', 'Rayon créé avec succès.');
    }

    public function show(Rayon $rayon) {
        return view('rayons.show', compact('rayon'));
    }

    public function edit(Rayon $rayon) {
        return view('rayons.edit', compact('rayon'));
    }

    public function update(Request $request, Rayon $rayon) {
        $request->validate([
            'libelle' => 'required|string|max:255',
            'partie' => 'required|string|max:255',
        ]);

        $rayon->update($request->all());

        return redirect()->route('rayons.index')->with('success', 'Rayon mis à jour avec succès.');
    }

    public function destroy(Rayon $rayon) {
        $rayon->delete();
        return redirect()->route('rayons.index')->with('success', 'Rayon supprimé avec succès.');
    }
}
