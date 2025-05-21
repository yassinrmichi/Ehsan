<?php

namespace App\Http\Controllers;

use App\Models\Paiyment;
use App\Models\Association;
use Illuminate\Http\Request;

class PaiymentController extends Controller
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
    public function create(Request $request)
    {
        $association = Association::findOrFail($request->id);
        return view('paiyment_Form',compact('association'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Paiyment $paiyment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Paiyment $paiyment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Paiyment $paiyment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Paiyment $paiyment)
    {
        //
    }
}
