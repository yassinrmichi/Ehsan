<?php

namespace App\Http\Controllers\Association;
use App\Http\Controllers\Controller;

use App\Models\Association;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;


class AssociationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function create()
{
    return view('completeForm');
}

public function index()
{
    $associations = Association::all();
    return view('associations', compact('associations'));
}

public function dashboard($id)
{
    $association = Association::findOrFail($id);
    $posts = $association->publications;
    $events = $association->events;
    return view('/association/dashboard', compact('association','posts','events'));
}



public function store(Request $request)
{
    $request->validate([
        'nom' => 'required|string|max:255',
        'adresse' => 'nullable|string',
        'ville' => 'nullable|string',
        'description' => 'nullable|string',
        'code_postal' => 'nullable|integer',
        'telephone' => 'nullable|integer',
        'email' => 'nullable|email',
        'site_web' => 'nullable|url',
        'logo' => 'nullable|image|max:2048',
    ]);

    $logoBase64 = null;

    if ($request->hasFile('logo')) {
        $file = $request->file('logo');
        $logoBase64 = base64_encode(file_get_contents($file));
    }

    Association::create([
        'user_id' => auth()->id(),
        'nom' => $request->nom,
        'adresse' => $request->adresse,
        'ville' => $request->ville,
        'description' => $request->description,
        'code_postal' => $request->code_postal,
        'telephone' => $request->telephone,
        'email' => $request->email,
        'site_web' => $request->site_web,
        'logo' => $logoBase64,
    ]);

    return redirect()->route('home');
}


public function updateCouverture(Request $request, $id)
{
    $request->validate([
        'couverture' => 'required|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    $association = Association::findOrFail($id);

    // Supprimer l'ancienne image si elle existe
    if ($association->couverture && Storage::disk('public')->exists($association->couverture)) {
        Storage::disk('public')->delete($association->couverture);
    }

    // Stocker la nouvelle image
    $path = $request->file('couverture')->store('couvertures', 'public');

    // Mettre à jour l'association
    $association->update([
        'couverture' => $path,
    ]);

    return redirect()->back()->with('success', 'Image de couverture mise à jour avec succès.');
}




    /**


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $association = Association::findOrFail($id);
        $posts = $association->publications;
        $events = $association->events;
        return view('/association/profile', compact('association','posts','events'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Association $association)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Association $association)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Association $association)
    {
        //
    }
}
