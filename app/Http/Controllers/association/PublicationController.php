<?php
namespace App\Http\Controllers\Association;
use App\Http\Controllers\Controller;

use App\Models\Publication;
use Illuminate\Http\Request;

class PublicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('/association/modals/add-post');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'contenu' => 'required',
            'image' => 'nullable|image|max:2048',
        ]);

        $path = $request->file('image')?->store('publications', 'public');

        // Supposons que l'association est liée à l'utilisateur connecté
        $association = auth()->user()->association;

        Publication::create([
            'titre' => $request->titre,
            'contenu' => $request->contenu,
            'image' => $path,
            'association_id' => $association->id,
        ]);

        return redirect()->route('associations.show',auth()->user()->id)->with('success', 'Publication ajoutée avec succès.');
    }



    /**
     * Display the specified resource.
     */
    public function show(Publication $publication)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Publication $publication)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Publication $publication)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Publication $publication)
    {
        //
    }
}
