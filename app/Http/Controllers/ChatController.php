<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use App\Models\User;
use App\Models\Message;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
 // Dans ChatController.php
 **/

public function index()
{
    $user = auth()->user();
    if($user->role === 'association'){
        $association = $user->association;
    }

    // Récupère toutes les conversations où l'utilisateur est soit donateur, soit association
    $conversations = Conversation::where('donator_id', $user->id)
                             ->orWhere('association_id', $user->id)
                             ->with(['messages', 'association', 'donator'])
                             ->withCount(['messages as unread_count' => function($query) use ($user) {
                                 $query->where('read_at', null)
                                       ->where('sender_id', '!=', $user->id);
                             }])
                             ->get();



   return view('chat', [
    'conversations' => $conversations,
    'currentConversation' => null,
    'messages' => [],
    'association' => $association ?? null, // On le passe seulement si défini
]);

}

public function show(Conversation $conversation)
{
    $user = auth()->user();

    // Vérifie que l'utilisateur a le droit d'accéder à cette conversation
    if ($conversation->donator_id !== $user->id && $conversation->association_id !== $user->id) {
        abort(403, 'Unauthorized');
    }

    // Marquer les messages de l'autre participant comme lus
    $conversation->messages()
        ->whereNull('read_at')
        ->where('sender_id', '!=', $user->id)
        ->update(['read_at' => now()]);

    // Charger les messages (avec sender) et trier du plus ancien au plus récent
    $messages = $conversation->messages()
        ->with('sender')
        ->orderBy('created_at', 'asc')
        ->get();

    // Récupérer toutes les conversations de l'utilisateur (comme dans index)
    $conversations = Conversation::where('donator_id', $user->id)
        ->orWhere('association_id', $user->id)
        ->with(['association', 'donator'])
        ->withCount(['messages as unread_count' => function ($query) use ($user) {
            $query->whereNull('read_at')
                  ->where('sender_id', '!=', $user->id);
        }])
        ->get();

    // Identifier l'autre participant
    $otherParticipant = $conversation->donator_id === $user->id
        ? $conversation->association
        : $conversation->donator;

    return view('chat', [
        'conversations' => $conversations,
        'currentConversation' => $conversation,
        'messages' => $messages,
        'otherParticipant' => $otherParticipant,
    ]);
}


public function markAsRead(Conversation $conversation)
{
    $userId = auth()->id();

    // Vérifie que l'utilisateur fait partie de la conversation
    $isParticipant = $conversation->donator_id === $userId || $conversation->association_id === $userId;

    if (!$isParticipant) {
        abort(403, 'Unauthorized');
    }

    // Marque les messages comme lus
    $conversation->messages()
        ->where('sender_id', '!=', $userId)
        ->whereNull('read_at')
        ->update(['read_at' => now()]);
}


public function store(Request $request, $conversationId)
{
    $request->validate([
        'message' => 'required|string|max:1000',
    ]);

    $conversation = Conversation::findOrFail($conversationId);

    $message = $conversation->messages()->create([
        'sender_id' => auth()->id(),
        'message' => $request->message,
    ]);

    // Pour le retour AJAX
    if ($request->expectsJson()) {
        return response()->json([
            'success' => true,
            'message' => $message->message,
            'created_at' => $message->created_at->format('H:i'),
        ]);
    }

    return redirect()->route('Conversation.show', $conversationId);
}



public function create($associationId)
{
    $donatorId = auth()->id();

    if (!$donatorId) {
        abort(403, 'Unauthorized');
    }

    $conversation = Conversation::firstOrCreate([
        'donator_id' => $donatorId,
        'association_id' => $associationId,
    ]);

    return redirect()->route('Conversation.show', ['conversation' => $conversation->id]);
}





    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Message $message)
    {
        //
    }
}
