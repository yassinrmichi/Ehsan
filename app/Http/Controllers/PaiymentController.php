<?php

namespace App\Http\Controllers;

use App\Models\Paiyment;
use App\Models\Association;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\PaymentIntent;

class PaiymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }
    public function create($associationId)
{
    $association = Association::findOrFail($associationId);

    return view('/paiyment/paiyment_Form', compact('association'));
}



public function store(Request $request)
{
    $request->validate([
        'association_id' => 'required|exists:associations,id',
        'amount' => 'required|numeric|min:1',
        'donor_name' => 'nullable|string|max:255',
        'payment_intent_id' => 'required|string'
    ]);

    Stripe::setApiKey(config('services.stripe.secret'));

    try {
        // On récupère les infos du PaymentIntent depuis Stripe
        $intent = \Stripe\PaymentIntent::retrieve($request->payment_intent_id);

        if ($intent->status === 'succeeded') {
            Paiyment::create([
                'association_id' => $request->association_id,
                'donor_name' => $request->donor_name,
                'amount' => $request->amount,
                'payment_intent_id' => $request->payment_intent_id,
                'status' => 'succeeded',
            ]);

            return redirect()->route('payment.success');
        } else {
            return back()->with('error', 'Le paiement n’a pas été confirmé.');
        }

    } catch (\Exception $e) {
        return back()->with('error', 'Erreur lors du traitement du paiement : ' . $e->getMessage());
    }
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
