@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto bg-white shadow-lg rounded-xl overflow-hidden font-sans mt-1">
    <!-- Section Couverture -->
    <div class="relative h-64 bg-gradient from-blue-500 to-indigo-600">
        @if($association->couverture)
        <img src="{{ asset('storage/' . $association->couverture) }}"
             alt="Couverture"
             class="w-full h-full object-cover">
        @else
        <div class="w-full h-full flex items-center justify-center bg-gray-200">
            <span class="text-gray-500 text-lg font-medium">Ajouter une photo de couverture</span>
        </div>
        @endif

        <!-- Bouton modifier couverture -->
        @auth
        @if(auth()->user()->id === $association->user_id)
        <button onclick="document.getElementById('modal-couverture').classList.remove('hidden')"
                class="absolute top-4 right-4 bg-white/90 hover:bg-white text-gray-800 text-sm px-3 py-1 rounded-lg shadow-md transition-all flex items-center gap-1">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
            </svg>
            Modifier
        </button>
        @endif
        <!-- Modal -->
        @endauth
<div id="modal-couverture" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50 hidden">
    <div class="bg-white p-6 rounded-lg w-full max-w-md relative">
        <!-- Bouton fermer -->
        <button onclick="document.getElementById('modal-couverture').classList.add('hidden')"
                class="absolute top-2 right-2 text-gray-500 hover:text-gray-700">&times;</button>

        <h2 class="text-xl font-bold mb-4">Changer l’image de couverture</h2>

        <!-- Formulaire -->
        <form action="{{ route('association.updateCouverture', $association->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <input type="file" name="couverture" accept="image/*" required class="mb-4 w-full">

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded w-full">
                Enregistrer
            </button>
        </form>
    </div>
</div>


        <!-- Photo de profil -->
        <div class="absolute -bottom-16 left-6 flex items-end gap-3">
            <div class="relative group">
                <img src="data:image/png;base64,{{ $association->logo }}"
                     class="w-28 h-28 rounded-full border-4 border-white object-cover shadow-lg"
                     alt="Logo {{ $association->nom }}">
                     @auth
                     @if(auth()->user()->id === $association->user_id)
                <button onclick="toggleModal('modal-logo')"
                        class="absolute inset-0 bg-black/50 rounded-full flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                </button>
                @endif
                @endauth
            </div>
        </div>
    </div>

    <!-- Infos générales -->
    <div class="mt-16 px-6 pb-6 border-b border-gray-100">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
            <div>
                <h1 class="text-2xl md:text-3xl font-bold text-gray-800">{{ $association->nom }}</h1>
                <p class="text-gray-600 mt-1">{{ $association->description }}</p>
                <div class="mt-3 flex flex-wrap gap-x-4 gap-y-2 text-sm text-gray-700">
                    <span class="flex items-center gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        {{ $association->ville }}, {{ Str::limit($association->adresse, 50) }}
                    </span>
                    <span class="flex items-center gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        {{ $association->email }}
                    </span>
                    <span class="flex items-center gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                        {{ $association->telephone }}
                    </span>
                </div>
            </div>
            @auth
            @if(auth()->user()->id === $association->user_id)
            <div class="flex gap-2">
                <button onclick="toggleModal('modal-edit-profile')"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow flex items-center gap-1 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                    Modifier
                </button>
            </div>
            @endif
            @endauth
        </div>
    </div>


    <!-- Boutons actions -->

    <div class="flex flex-wrap gap-3 px-6 py-3 border-b border-gray-100">
        @auth
        @if(auth()->user()->id === $association->user_id)
        <a href="{{ route('events.create') }}"
                class="bg-green-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg text-sm flex items-center gap-1 transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
            </svg>
            Ajouter événement
        </a>
        <a href="{{ route('Publications.create') }}"
        class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg text-sm flex items-center gap-1 transition-colors">
         <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
         </svg>
         Ajouter publication
     </a>

        <button
                class="bg-pink-600 hover:bg-pink-700 text-white px-4 py-2 rounded-lg text-sm flex items-center gap-1 transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
            </svg>
            Ajouter photo
        </button>
        @else
        <a href="{{ route('paiyment.create',$association->id) }}"
        class="bg-pink-600 hover:bg-pink-700 text-white px-4 py-2 rounded-lg text-sm flex items-center gap-1 transition-colors btn-danger">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
    </svg>
    faire un dons
</a>

        <a href="{{ route('Conversation.create',$association->id) }}"
        class="bg-pink-600 hover:bg-pink-700 text-white px-4 py-2 rounded-lg text-sm flex items-center gap-1 transition-colors btn-primary">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
    </svg>
    Envoyer un message
</a>
        @endif
        @endauth
    </div>



    <!-- Contenu principal avec onglets -->
    <div class="px-6 py-4">
        <!-- Barre d'onglets -->
        <div class="border-b border-gray-200">
            <nav class="flex space-x-8 overflow-x-auto pb-px">
                <button class="tab-button active shrink-0 py-3 px-1 border-b-2 font-medium text-sm flex items-center gap-2" data-tab="publications">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                    </svg>
                    Publications
                </button>
                <button class="tab-button shrink-0 py-3 px-1 border-b-2 font-medium text-sm flex items-center gap-2" data-tab="events">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    Événements
                </button>
                <button class="tab-button shrink-0 py-3 px-1 border-b-2 font-medium text-sm flex items-center gap-2" data-tab="about">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    À propos
                </button>
                <button class="tab-button shrink-0 py-3 px-1 border-b-2 font-medium text-sm flex items-center gap-2" data-tab="photos">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    Photos
                </button>
                <button class="tab-button shrink-0 py-3 px-1 border-b-2 font-medium text-sm flex items-center gap-2" data-tab="members">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    Membres
                </button>
            </nav>
        </div>

        <!-- Contenu des onglets -->
        <div class="py-6">
            <!-- Onglet Publications -->
            <div id="publications-tab" class="tab-content active">
                @forelse($posts as $post)
                <div class="bg-white rounded-2xl border border-gray-100 shadow-md overflow-hidden transition-all duration-300 hover:shadow-lg mb-8 last:mb-0">
                    <!-- Header avec avatar et métadonnées -->
                    <div class="p-6 pb-4">
                        <div class="flex justify-between items-start">
                            <div class="flex items-center gap-4">
                                <div class="flex-shrink-0">
                                    <img class="h-10 w-10 rounded-full object-cover" src="data:image/png;base64,{{ $association->logo }}" alt="">
                                </div>
                                <div>
                                    <h3 class="font-bold text-xl text-gray-900">{{ $post->titre }}</h3>
                                    <div class="flex items-center gap-2 mt-1">
                                        <span class="text-sm font-medium text-gray-600">{{ $association->user->name ?? 'Auteur' }}</span>
                                        <span class="text-xs text-gray-400">•</span>
                                        <span class="text-sm text-gray-500">{{ $post->created_at->diffForHumans() }}</span>
                                    </div>
                                </div>
                            </div>
                            <button class="text-gray-400 hover:text-gray-600 transition-colors duration-200 p-1 rounded-full hover:bg-gray-100">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Contenu du post -->
                    <div class="px-6 pb-6">
                        <p class="text-gray-700 leading-relaxed whitespace-pre-line">{{ $post->contenu }}</p>
                    </div>

                    <!-- Image avec effet de zoom -->
                  @if($post->image)
                    <div class="w-full overflow-hidden bg-gray-100">
                        <img src="{{ asset('storage/' . $post->image) }}"
                            alt="Post image"
                            class="w-full h-80 object-cover rounded-b-2xl cursor-zoom-in transition-transform duration-300 hover:scale-105"
                            onclick="openImageModal('{{ asset('storage/' . $post->image) }}')">
                    </div>
                @endif


                    <!-- Actions -->
                    <div class="px-6 py-3 bg-gray-50 border-t border-gray-100 flex justify-between">
                        <button class="flex items-center gap-2 text-gray-500 hover:text-blue-600 transition-colors duration-200 px-3 py-2 rounded-lg hover:bg-blue-50">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                            </svg>
                            <span class="font-medium text-sm">J'aime</span>
                        </button>
                        <button class="flex items-center gap-2 text-gray-500 hover:text-blue-600 transition-colors duration-200 px-3 py-2 rounded-lg hover:bg-blue-50">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 20.25c4.97 0 9-3.694 9-8.25s-4.03-8.25-9-8.25S3 7.444 3 12c0 2.104.859 4.023 2.273 5.48.432.447.74 1.04.586 1.641a4.483 4.483 0 01-.923 1.785A5.969 5.969 0 006 21c1.282 0 2.47-.402 3.445-1.087.81.22 1.668.337 2.555.337z" />
                            </svg>
                            <span class="font-medium text-sm">Commenter</span>
                        </button>
                        <button class="flex items-center gap-2 text-gray-500 hover:text-blue-600 transition-colors duration-200 px-3 py-2 rounded-lg hover:bg-blue-50">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5" />
                            </svg>
                            <span class="font-medium text-sm">Partager</span>
                        </button>
                    </div>
                </div>
                @empty
                <div class="text-center py-16 max-w-md mx-auto">
                    <div class="mx-auto h-24 w-24 flex items-center justify-center rounded-full bg-blue-50 mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-3">Aucune publication</h3>
                    <p class="text-gray-500 mb-8">Commencez par créer votre première publication.</p>
                    <div>
                        <button onclick="toggleModal('modal-add-post')"
                                class="inline-flex items-center px-6 py-3 border border-transparent shadow-sm text-base font-medium rounded-xl text-white bg-gradient-to-r from-blue-600 to-blue-500 hover:from-blue-700 hover:to-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="-ml-1 mr-3 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                            Nouvelle publication
                        </button>
                    </div>
                </div>
                @endforelse
            </div>


            <!-- Onglet Événements -->
            <div id="events-tab" class="tab-content hidden">
                <div class="grid md:grid-cols-2 gap-4">
                    @forelse($events as $event)
                        <div class="bg-white rounded-lg border border-gray-100 shadow-sm overflow-hidden">
                            @if($event->image)
                                <img src="{{ asset('storage/' . $event->image) }}" alt="{{ $event->titre }}" class="w-full h-40 object-cover">
                            @else
                                <div class="w-full h-40 bg-gradient-to-r from-blue-500 to-indigo-600 flex items-center justify-center">
                                    <span class="text-white font-medium text-sm">Aucune image</span>
                                </div>
                            @endif

                            <div class="p-4">
                                <div class="flex justify-between items-start">
                                    <h3 class="font-bold text-lg text-gray-900">{{ $event->titre }}</h3>
                                    <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded-full">
                                        {{ \Carbon\Carbon::parse($event->date)->format('d M Y') }}
                                    </span>
                                </div>
                                <p class="mt-2 text-gray-600 text-sm">{{ $event->description }}</p>

                                <div class="mt-4 flex items-center text-sm text-gray-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    {{ $event->lieu }}
                                </div>

                                <div class="mt-4 flex justify-between items-center">
                                    <span class="text-xs text-gray-500">{{ rand(20, 200) }} participants</span>
                                    <a href="#" class="text-sm bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded">
                                        Voir détails
                                    </a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="md:col-span-2 text-center py-8">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <h3 class="mt-2 text-sm font-medium text-gray-900">Aucun événement prévu</h3>
                            <p class="mt-1 text-sm text-gray-500">Créez votre premier événement pour inviter votre communauté.</p>
                            <div class="mt-6">
                                <button onclick="toggleModal('modal-add-event')"
                                        class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="-ml-1 mr-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                    </svg>
                                    Créer un événement
                                </button>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>


            <!-- Onglet À propos -->
            <div id="about-tab" class="tab-content hidden">
                <div class="bg-white rounded-lg border border-gray-100 shadow-sm overflow-hidden">
                    <div class="p-6">
                        <h3 class="text-lg font-bold text-gray-900 mb-4">À propos de {{ $association->nom }}</h3>

                        <div class="grid md:grid-cols-2 gap-6">
                            <div class="space-y-4">
                                <div>
                                    <h4 class="font-medium text-gray-900 mb-2">Description</h4>
                                    <p class="text-gray-700">{{ $association->description ?? 'Aucune description détaillée disponible.' }}</p>
                                </div>

                                <div>
                                    <h4 class="font-medium text-gray-900 mb-2">Missions</h4>
                                    <ul class="list-disc list-inside text-gray-700 space-y-1">
                                        @if($association->missions)
                                            @foreach(explode("\n", $association->missions) as $mission)
                                                <li>{{ $mission }}</li>
                                            @endforeach
                                        @else
                                            <li>Aucune mission définie</li>
                                        @endif
                                    </ul>
                                </div>
                            </div>

                            <div class="space-y-4">
                                <div>
                                    <h4 class="font-medium text-gray-900 mb-2">Informations</h4>
                                    <div class="space-y-3">
                                        <div class="flex items-start">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 mr-2 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                            </svg>
                                            <div>
                                                <p class="font-medium text-gray-700">Statut</p>
                                                <p class="text-gray-600">{{ $association->statut ?? 'Non spécifié' }}</p>
                                            </div>
                                        </div>
                                        <div class="flex items-start">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 mr-2 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                            <div>
                                                <p class="font-medium text-gray-700">Date de création</p>
                                                <p class="text-gray-600">{{ $association->date_creation ? $association->date_creation->format('d/m/Y') : 'Non spécifiée' }}</p>
                                            </div>
                                        </div>
                                        <div class="flex items-start">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 mr-2 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                            </svg>
                                            <div>
                                                <p class="font-medium text-gray-700">Adresse</p>
                                                <p class="text-gray-600">{{ $association->adresse_complete ?? 'Non spécifiée' }}</p>
                                            </div>
                                        </div>
                                        <div class="flex items-start">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 mr-2 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                            </svg>
                                            <div>
                                                <p class="font-medium text-gray-700">Contact</p>
                                                <p class="text-gray-600">{{ $association->telephone }}</p>
                                                <p class="text-gray-600">{{ $association->email }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <h4 class="font-medium text-gray-900 mb-2">Réseaux sociaux</h4>
                                    <div class="flex space-x-3">
                                        @if($association->facebook)
                                        <a href="{{ $association->facebook }}" target="_blank" class="text-blue-600 hover:text-blue-800">
                                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" />
                                            </svg>
                                        </a>
                                        @endif
                                        @if($association->twitter)
                                        <a href="{{ $association->twitter }}" target="_blank" class="text-blue-400 hover:text-blue-600">
                                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" />
                                            </svg>
                                        </a>
                                        @endif
                                        @if($association->website)
                                        <a href="{{ $association->website }}" target="_blank" class="text-gray-600 hover:text-gray-800">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                                            </svg>
                                        </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Onglet Photos -->
            <div id="photos-tab" class="tab-content hidden">
                {{-- @if($photos->count() > 0) --}}
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                    {{-- @foreach($photos as $photo) --}}
                    <div class="relative group">
                        <img src="https://tse1.mm.bing.net/th/id/OIP.-eGZW6Fa96tS_wIPT5rR-QHaFN?rs=1&pid=ImgDetMain" alt="Photo" class="w-full h-48 object-cover rounded-lg shadow-sm">
                        <div class="absolute inset-0 bg-black/50 rounded-lg flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                            <button class="text-white p-2 hover:bg-white/20 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </button>
                            <button class="text-white p-2 hover:bg-white/20 rounded-full ml-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    {{-- @endforeach --}}
                </div>
                {{-- @else
                <div class="text-center py-8">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <h3 class="mt-2 text-sm font-medium text-gray-900">Aucune photo</h3>
                    <p class="mt-1 text-sm text-gray-500">Ajoutez des photos pour partager les moments importants de votre association.</p>
                    <div class="mt-6">
                        <button onclick="toggleModal('modal-add-photo')"
                                class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-pink-600 hover:bg-pink-700 focus:outline-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="-ml-1 mr-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                            Ajouter des photos
                        </button>
                    </div>
                </div>
                @endif --}}
            </div>

            <!-- Onglet Membres -->
            <div id="members-tab" class="tab-content hidden">
                <div class="bg-white rounded-lg border border-gray-100 shadow-sm overflow-hidden">
                    <div class="p-6">
                        <div class="flex justify-between items-center mb-6">
                            <h3 class="text-lg font-bold text-gray-900">Membres de l'association</h3>
                            <button onclick="toggleModal('modal-add-member')"
                                    class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded text-sm flex items-center gap-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                </svg>
                                Ajouter
                            </button>
                        </div>

                        {{-- @if($members->count() > 0)
                        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4">
                            @foreach($members as $member)
                            <div class="text-center">
                                <div class="relative mx-auto w-16 h-16 rounded-full bg-gray-100 flex items-center justify-center overflow-hidden">
                                    @if($member->photo)
                                    <img src="{{ $member->photo }}" alt="{{ $member->name }}" class="w-full h-full object-cover">
                                    @else
                                    <span class="text-2xl text-gray-500">{{ substr($member->name, 0, 1) }}</span>
                                    @endif
                                    @if($member->pivot->role === 'admin')
                                    <span class="absolute bottom-0 right-0 bg-blue-500 text-white text-xs px-1 rounded-full">Admin</span>
                                    @endif
                                </div>
                                <h4 class="mt-2 font-medium text-sm text-gray-900">{{ $member->name }}</h4>
                                <p class="text-xs text-gray-500">{{ $member->pivot->role }}</p>
                            </div>
                            @endforeach
                        </div>
                        @else --}}
                        <div class="text-center py-8">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                            <h3 class="mt-2 text-sm font-medium text-gray-900">Aucun membre</h3>
                            <p class="mt-1 text-sm text-gray-500">Ajoutez des membres à votre association pour commencer.</p>
                        </div>
                        {{-- @endif --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<script>
    // Gestion des onglets
    document.querySelectorAll('.tab-button').forEach(button => {
        button.addEventListener('click', () => {
            // Désactive tous les onglets
            document.querySelectorAll('.tab-button').forEach(btn => {
                btn.classList.remove('active', 'border-blue-500', 'text-blue-600');
                btn.classList.add('border-transparent', 'text-gray-500');
            });

            // Cache tous les contenus
            document.querySelectorAll('.tab-content').forEach(content => {
                content.classList.add('hidden');
            });

            // Active l'onglet cliqué
            button.classList.add('active', 'border-blue-500', 'text-blue-600');
            button.classList.remove('border-transparent', 'text-gray-500');

            const tabId = button.getAttribute('data-tab') + '-tab';
            document.getElementById(tabId).classList.remove('hidden');
        });
    });

    // Fonction pour gérer les modales
    function toggleModal(modalId) {
        document.getElementById(modalId).classList.toggle('hidden');
    }

    // Fermer les modales en cliquant à l'extérieur
    document.querySelectorAll('.modal').forEach(modal => {
        modal.addEventListener('click', function(e) {
            if (e.target === this) {
                this.classList.add('hidden');
            }
        });
    });
</script>
<!-- Modal image full screen -->
<div id="imageModal" class="fixed inset-0 z-50 hidden bg-black bg-opacity-80 backdrop-blur-sm flex items-center justify-center transition-all duration-300">
    <div class="relative max-w-[90vw] max-h-[90vh]">
        <!-- Bouton de fermeture -->
        <button onclick="closeImageModal()"
                class="absolute -top-6 -right-6 bg-white text-gray-800 hover:text-red-600 rounded-full shadow-md w-10 h-10 flex items-center justify-center text-2xl font-bold z-50 transition hover:rotate-90">
            &times;
        </button>

        <!-- Image plein écran -->
        <img id="modalImage"
             src=""
             class="rounded-lg shadow-xl max-h-[90vh] max-w-full object-contain border border-white">
    </div>
</div>

<script>
    function openImageModal(imageUrl) {
        const modal = document.getElementById('imageModal');
        const modalImage = document.getElementById('modalImage');
        modalImage.src = imageUrl;
        modal.classList.remove('hidden');
    }

    function closeImageModal() {
        const modal = document.getElementById('imageModal');
        const modalImage = document.getElementById('modalImage');
        modalImage.src = '';
        modal.classList.add('hidden');
    }

    // Fermer le modal si on clique sur l'arrière-plan
    document.getElementById('imageModal').addEventListener('click', function (e) {
        if (e.target === this) {
            closeImageModal();
        }
    });
</script>

<style>
    .tab-button {
        transition: all 0.2s ease;
        border-bottom-width: 2px;
    }
    .tab-content {
        animation: fadeIn 0.3s ease;
    }
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(5px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>

@endsection
