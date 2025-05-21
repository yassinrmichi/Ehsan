<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Ehsan</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

        <link rel="icon" type="image/png" href="{{ asset('img/Ehsan_logo2.png') }}" sizes="16x16">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Inter:slnt,wght@-10..0,100..900&display=swap" rel="stylesheet">

        <!-- Icon Font Stylesheet -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link rel="stylesheet" href="{{ asset('lib/animate/animate.min.css') }}"/>
        <link href="{{ asset('lib/lightbox/css/lightbox.min.css" rel="stylesheet') }}">
        <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
        <!-- Tailwind CSS via CDN (temporaire pour tests) -->
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">



        <!-- Customized Bootstrap Stylesheet -->
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    </head>

    <body>
<div class="flex h-screen bg-gray-100">
    <!-- Sidebar -->
    <div class="w-72 bg-violet-800 text-white p-5 flex flex-col shadow-lg rounded-tr-2xl rounded-br-2xl">
        <!-- En-tête -->
        <div class="flex items-center mb-10">
            <img src="{{ asset('img/Ehsan_logo2.png') }}" class="w-20 h-20 rounded-full" alt="Logo">
            <h1 class="text-xl font-bold  text-white tracking-wide">Ehsan Chat</h1>
        </div>

        <!-- Utilisateur connecté -->
        <div class="flex items-center bg-violet-700 p-3 rounded-xl mb-6">
            <div class="relative">
    @if(isset($association) && $association->logo)
        <img src="data:image/png;base64,{{ auth()->user()->association->logo }}"
             class="w-10 h-10 rounded-full border-4 border-white object-cover shadow-lg"
             alt="Logo {{ auth()->user()->association->nom }}">
    @else
        <div class="w-10 h-10 bg-white text-violet-700 rounded-full flex items-center justify-center font-bold text-sm">
            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
        </div>
        <span class="absolute -bottom-0 -right-0 w-3 h-3 bg-green-500 border-2 border-white rounded-full"></span>
    @endif
</div>

            <div class="ml-3">
                <p class="font-semibold">{{ auth()->user()->name }}</p>
                <p class="text-xs text-gray-300 capitalize">{{ auth()->user()->role }}</p>
            </div>

        </div>

        <hr>

        <!-- Liste des conversations -->
        <h2 class="text-md font-semibold mt-2 text-gray-200 mb-3">Conversations</h2>
        <div class="space-y-2 overflow-y-auto">
         @forelse($conversations as $conv)
    @php
        $other = $conv->getOtherParticipant();
        $isAssociation = $other && $other->role === 'association';
        $association = $isAssociation ? $conv->association : null;
    @endphp

    <a href="{{ route('Conversation.show', $conv->id) }}"
       class="flex items-center p-3 rounded-xl transition-all duration-200 group
              {{ isset($currentConversation) && $currentConversation->id == $conv->id
                 ? 'bg-white/20 text-white border-l-4 border-white'
                 : 'text-white/80 hover:bg-white/10 hover:text-white' }}">

        <div class="relative">
            @if($association && $association->logo)
                <img src="data:image/png;base64,{{ $association->logo }}"
                     class="w-10 h-10 rounded-full object-cover border-2 border-white/80 group-hover:border-white"
                     alt="Logo {{ $association->nom }}">
            @else
                <div class="w-10 h-10 bg-white/90 text-violet-700 rounded-full flex items-center justify-center font-semibold
                     group-hover:bg-white">
                    {{ strtoupper(substr($other->name ?? '', 0, 1)) }}
                </div>
            @endif

            @if($other?->is_online)
                <span class="absolute bottom-0 right-0 w-3 h-3 bg-emerald-400 rounded-full border-2 border-violet-900"></span>
            @endif
        </div>

        <div class="ml-3 overflow-hidden">
            <h3 class="text-sm text-white font-medium truncate">
                {{ $other?->name }}
            </h3>
            @if($conv->lastMessage)
                <p class="text-xs truncate mt-1
                   {{ isset($currentConversation) && $currentConversation->id == $conv->id
                      ? 'text-white/70'
                      : 'text-white/50 group-hover:text-white/60' }}">
                    {{ Str::limit($conv->lastMessage->content, 25) }}
                </p>
            @endif
        </div>

       @if($conv->unread_count > 0)
            <span class="badge">{{ $conv->unread_count }}</span>
        @endif
    </a>
@empty
    <div class="text-white/50 text-center py-4 italic">
        Aucune conversation trouvée.
    </div>
@endforelse

        </div>
    </div>

    <!-- Zone de discussion -->
    <div class="flex-1 flex flex-col bg-white">
        @if(isset($currentConversation))
            <!-- En-tête du chat -->
        <div class="bg-violet-50 border-b px-6 py-4 flex items-center justify-between">
                  <div class="flex items-center">
    <div class="w-10 h-10 rounded-full bg-violet-200 text-violet-700 flex items-center justify-center font-semibold">
        {{ strtoupper(substr($currentConversation->getOtherParticipant()->name ?? '', 0, 1)) }}
    </div>
    <div class="ml-4">
        <h2 class="text-lg font-semibold text-gray-700">{{ $currentConversation->getOtherParticipant()->name }}</h2>
        <p class="text-xs text-gray-500">
            {{ $currentConversation->getOtherParticipant()->is_online ? 'En ligne' : 'Hors ligne' }}
        </p>
    </div>
</div>

<a href="/"
   class="px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-full shadow hover:bg-indigo-700 transition">
   Retour à l'accueil
</a>

                </div>
            <!-- Messages -->
            <div id="chat-body" class="flex-1 p-6 overflow-y-auto space-y-4">

                @foreach($messages as $message)
                    <div class="flex {{ $message->sender_id === auth()->id() ? 'justify-end' : 'justify-start' }}">
                        <div class="max-w-sm px-4 py-3 rounded-lg shadow text-sm
                            {{ $message->sender_id === auth()->id() ? 'bg-violet-600 text-white' : 'bg-gray-200 text-gray-800' }}">
                            <p>{{ $message->message }}</p>
                            <p class="text-[10px] text-right mt-1 opacity-70">
                                {{ $message->created_at->format('H:i') }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Formulaire d'envoi -->
               <form id="chat-form" class="p-4 bg-white border-t border-gray-200">
                @csrf
                <div class="flex items-center gap-2 max-w-3xl mx-auto">
                    <input id="message-input" type="text" name="message" placeholder="Écrivez un message..." required
                        class="flex-grow border border-gray-300 rounded-full px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent bg-gray-50"/>
                    <button id="send-button" type="submit"
                                class="bg-violet-600 text-white px-4 py-2 rounded-full hover:bg-violet-700 transition">
                    Envoyer

                    </button>
                </div>
            </form>


        @else
            <!-- État vide - Aucune conversation sélectionnée -->
            <div class="flex flex-col items-center justify-center h-full text-gray-400">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                </svg>
                <h3 class="text-lg font-medium text-gray-500 mb-1">Aucune conversation sélectionnée</h3>
                <p class="text-sm">Sélectionnez une conversation existante ou démarrez-en une nouvelle</p>
            </div>
        @endif
    </div>
</div>

@if(isset($currentConversation))
<script>
    // Ton code JavaScript ici, uniquement si $currentConversation existe
    document.addEventListener("DOMContentLoaded", function () {
        const chatBody = document.getElementById("chat-body");
        const chatForm = document.getElementById("chat-form");
        const messageInput = document.getElementById("message-input");

        if (chatBody) {
            chatBody.scrollTop = chatBody.scrollHeight;

            fetch("{{ route('Conversation.markAsRead', $currentConversation->id) }}", {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json',
                }
            }).catch(console.error);
        }

        chatForm?.addEventListener("submit", function (e) {
            e.preventDefault();
            const message = messageInput.value.trim();
            if (!message) return;

            const formData = new FormData();
            formData.append("message", message);

            fetch("{{ route('Conversation.store', $currentConversation->id) }}", {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}",
                    "Accept": "application/json",
                },
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                const messageHtml = `
                    <div class="flex justify-end">
                        <div class="max-w-sm px-4 py-3 rounded-lg shadow text-sm bg-violet-600 text-white">
                            <p>${message}</p>
                            <p class="text-[10px] text-right mt-1 opacity-70">
                                ${new Date().toLocaleTimeString([], {hour: '2-digit', minute:'2-digit'})}
                            </p>
                        </div>
                    </div>
                `;

                chatBody.insertAdjacentHTML("beforeend", messageHtml);
                chatBody.scrollTop = chatBody.scrollHeight;
                messageInput.value = "";
            })
            .catch(console.error);
        });
    });
</script>
@endif

<script src="https://cdn.tailwindcss.com"></script>
