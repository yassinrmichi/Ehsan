<?php

namespace App\Http\Controllers;

use App\Models\Association;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

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



    /**


    /**
     * Display the specified resource.
     */
    public function show(Association $association)
    {
        //
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
