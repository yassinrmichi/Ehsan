<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Ehsan Chat</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Ehsan Chat Application" name="description">

    <link rel="icon" type="image/png" href="{{ asset('img/Ehsan_logo2.png') }}" sizes="16x16">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link rel="stylesheet" href="{{ asset('lib/animate/animate.min.css') }}"/>
    <link href="{{ asset('lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#f5f3ff',
                            100: '#ede9fe',
                            200: '#ddd6fe',
                            300: '#c4b5fd',
                            400: '#a78bfa',
                            500: '#8b5cf6',
                            600: '#7c3aed',
                            700: '#6d28d9',
                            800: '#5b21b6',
                            900: '#4c1d95',
                            950: '#2e1065',
                        }
                    },
                    animation: {
                        'pulse-slow': 'pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                        'slide-in': 'slideIn 0.3s ease-out',
                        'slide-out': 'slideOut 0.3s ease-in',
                    }
                }
            }
        }
    </script>

    <style>
        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 6px;
        }

        ::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.2);
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: rgba(255, 255, 255, 0.3);
        }

        /* Message animations */
        @keyframes slideIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes slideOut {
            from { opacity: 1; transform: translateX(0); }
            to { opacity: 0; transform: translateX(-100%); }
        }

        .message-animation {
            animation: slideIn 0.3s ease forwards;
        }

        /* Badge styling */
        .badge {
            @apply bg-red-500 text-white text-xs font-semibold px-2 py-0.5 rounded-full ml-auto min-w-[20px] flex items-center justify-center;
        }

        /* Enhanced Active conversation highlight with focus effect */
        .conversation-active {
            @apply bg-gradient-to-r from-white/30 to-white/20 text-white border-l-4 border-white shadow-xl;
            box-shadow: 0 8px 32px rgba(255, 255, 255, 0.1), inset 0 1px 0 rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            position: relative;
        }

        .conversation-active::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.1) 0%, rgba(255, 255, 255, 0.05) 100%);
            border-radius: 0.75rem;
            pointer-events: none;
        }

        /* Enhanced Inactive conversation styling */
        .conversation-inactive {
            @apply text-white/80 hover:bg-white/10 hover:text-white hover:translate-x-1;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .conversation-inactive:hover {
            box-shadow: 0 4px 20px rgba(255, 255, 255, 0.05);
        }

        /* Hover animations */
        .hover-lift {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .hover-lift:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        /* Focus animations */
        .focus-glow:focus {
            box-shadow: 0 0 0 3px rgba(139, 92, 246, 0.5);
            outline: none;
        }

        /* Button hover effect */
        .button-hover {
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .button-hover:after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 5px;
            height: 5px;
            background: rgba(255, 255, 255, 0.5);
            opacity: 0;
            border-radius: 100%;
            transform: scale(1, 1) translate(-50%);
            transform-origin: 50% 50%;
        }

        .button-hover:hover:after {
            animation: ripple 1s ease-out;
        }

        @keyframes ripple {
            0% {
                transform: scale(0, 0);
                opacity: 0.5;
            }
            100% {
                transform: scale(20, 20);
                opacity: 0;
            }
        }

        /* Glow effect */
        .glow-on-hover {
            transition: all 0.3s ease;
        }

        .glow-on-hover:hover {
            box-shadow: 0 0 15px rgba(139, 92, 246, 0.5);
        }

        /* Pulse animation for notifications */
        @keyframes soft-pulse {
            0% {
                transform: scale(1);
                opacity: 1;
            }
            50% {
                transform: scale(1.05);
                opacity: 0.8;
            }
            100% {
                transform: scale(1);
                opacity: 1;
            }
        }

        .soft-pulse {
            animation: soft-pulse 2s infinite ease-in-out;
        }

        /* Shake animation for notifications */
        @keyframes shake {
            0% { transform: translateX(0); }
            25% { transform: translateX(-5px); }
            50% { transform: translateX(5px); }
            75% { transform: translateX(-5px); }
            100% { transform: translateX(0); }
        }

        .shake-on-hover:hover {
            animation: shake 0.5s ease-in-out;
        }

        /* Typing indicator animation */
        @keyframes typing {
            0% { opacity: 0.4; }
            50% { opacity: 1; }
            100% { opacity: 0.4; }
        }

        .typing-dot {
            animation: typing 1.4s infinite both;
        }

        .typing-dot:nth-child(2) {
            animation-delay: 0.2s;
        }

        .typing-dot:nth-child(3) {
            animation-delay: 0.4s;
        }

        /* Mobile sidebar overlay */
        .sidebar-overlay {
            backdrop-filter: blur(4px);
            background: rgba(0, 0, 0, 0.5);
        }

        /* Mobile sidebar animation */
        .sidebar-mobile {
            transform: translateX(-100%);
            transition: transform 0.3s ease-in-out;
        }

        .sidebar-mobile.open {
            transform: translateX(0);
        }
    </style>
</head>

<body class="bg-gray-100 font-['DM_Sans'] overflow-hidden">
    <div class="flex h-screen">
        <!-- Mobile Overlay -->
        <div id="sidebar-overlay" class="fixed inset-0 z-40 sidebar-overlay hidden lg:hidden"></div>

        <!-- Mobile Menu Button -->
        <button id="mobile-menu-btn" class="fixed top-4 left-4 z-50 lg:hidden bg-primary-600 text-white p-3 rounded-full shadow-lg hover:bg-primary-700 transition-all duration-300">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>

        <!-- Sidebar -->
        <div id="sidebar" class="sidebar-mobile lg:relative lg:translate-x-0 fixed inset-y-0 left-0 z-50 w-80 lg:w-80 bg-gradient-to-b from-primary-800 to-primary-900 text-white flex flex-col shadow-xl">
            <!-- Close button for mobile -->
            <button id="close-sidebar" class="absolute top-4 right-4 lg:hidden text-white hover:text-gray-300 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>

            <!-- En-tête -->
            <div class="p-4 lg:p-5 flex items-center space-x-3 border-b border-white/10 pb-4 lg:pb-5 mt-8 lg:mt-0">
                <img src="{{ asset('img/Ehsan_logo2.png') }}" class="w-10 h-10 lg:w-12 lg:h-12 rounded-full object-cover shadow-lg" alt="Logo">
                <h1 class="text-xl lg:text-2xl font-bold text-white tracking-wide">Ehsan Chat</h1>
            </div>

            <!-- Utilisateur connecté -->
            <div class="mx-3 lg:mx-4 my-3 lg:my-4">
                <div class="flex items-center bg-primary-700/50 p-2.5 lg:p-3 rounded-xl backdrop-blur-sm">
                    <div class="relative">
                        @if(isset($association) && $association->logo)
                            <img src="data:image/png;base64,{{ auth()->user()->association->logo }}"
                                class="w-10 h-10 lg:w-12 lg:h-12 rounded-full border-2 border-white object-cover shadow-lg"
                                alt="Logo {{ auth()->user()->association->nom }}">
                        @else
                            <div class="w-10 h-10 lg:w-12 lg:h-12 bg-white text-primary-700 rounded-full flex items-center justify-center font-bold text-sm lg:text-lg shadow-lg">
                                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                            </div>
                        @endif
                        <span class="absolute -bottom-1 -right-1 w-3 h-3 lg:w-4 lg:h-4 bg-green-500 border-2 border-primary-900 rounded-full animate-pulse-slow"></span>
                    </div>

                    <div class="ml-2.5 lg:ml-3">
                        <p class="font-semibold text-white text-sm lg:text-base">{{ auth()->user()->name }}</p>
                        <div class="flex items-center text-xs text-primary-100 mt-0.5">
                            <span class="inline-block w-2 h-2 bg-green-500 rounded-full mr-1.5"></span>
                            <span class="capitalize">{{ auth()->user()->role }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Liste des conversations -->
            <div class="px-3 lg:px-4 py-2 lg:py-3 flex-1 overflow-hidden">
                <div class="flex items-center justify-between mb-3">
                    <h2 class="text-base lg:text-lg font-semibold text-white flex items-center">
                        <span>Conversations</span>
                        <span class="bg-white/20 text-xs py-0.5 px-2 rounded-full text-white/90 ml-2">
                            {{ count($conversations) }}
                        </span>
                    </h2>
                </div>

                <div class="space-y-2 overflow-y-auto max-h-[calc(100vh-280px)] lg:max-h-[calc(100vh-240px)] pr-1">
                    @forelse($conversations as $conv)
                        @php
                            $other = $conv->getOtherParticipant();
                            $isAssociation = $other && $other->role === 'association';
                            $association = $isAssociation ? $conv->association : null;
                            $isActive = isset($currentConversation) && $currentConversation->id == $conv->id;
                        @endphp

                        <a href="{{ route('Conversation.show', $conv->id) }}"
                        class="flex items-center p-2.5 lg:p-3 rounded-xl transition-all duration-300 group hover-lift
                                {{ $isActive ? 'conversation-active' : 'conversation-inactive' }}"
                        onclick="closeSidebarOnMobile()">

                            <div class="relative flex-shrink-0">
                                @if($association && $association->logo)
                                    <img src="data:image/png;base64,{{ $association->logo }}"
                                        class="w-10 h-10 lg:w-12 lg:h-12 rounded-full object-cover border-2 border-white/80 group-hover:border-white shadow-md transition-all"
                                        alt="Logo {{ $association->nom }}">
                                @else
                                    <div class="w-10 h-10 lg:w-12 lg:h-12 bg-white/90 text-primary-700 rounded-full flex items-center justify-center font-semibold
                                        group-hover:bg-white transition-all duration-300 shadow-md transform group-hover:scale-110">
                                        {{ strtoupper(substr($other->name ?? '', 0, 1)) }}
                                    </div>
                                @endif

                                @if($other?->is_online)
                                    <span class="absolute bottom-0 right-0 w-3 h-3 lg:w-3.5 lg:h-3.5 bg-green-400 rounded-full border-2 border-primary-900 animate-pulse"></span>
                                @endif
                            </div>

                            <div class="ml-2.5 lg:ml-3 overflow-hidden flex-grow">
                                <h3 class="text-sm font-medium truncate group-hover:text-white transition-colors">
                                    {{ $other?->name }}
                                </h3>
                                @if($conv->lastMessage)
                                    <p class="text-xs truncate mt-1
                                    {{ $isActive ? 'text-white/80' : 'text-white/50 group-hover:text-white/70' }}">
                                        {{ Str::limit($conv->lastMessage->content, 25) }}
                                    </p>
                                @endif
                            </div>

                            @if($conv->unread_count > 0)
                                <span class="badge soft-pulse">{{ $conv->unread_count }}</span>
                            @endif
                        </a>
                    @empty
                        <div class="bg-white/5 rounded-xl p-4 lg:p-6 text-center">
                            <div class="text-white/60 mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 lg:h-10 lg:w-10 mx-auto mb-2 opacity-50" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                </svg>
                                <p class="text-white/70 text-sm font-medium">Aucune conversation trouvée.</p>
                            </div>
                            <p class="text-white/50 text-xs">Commencez une nouvelle conversation</p>
                        </div>
                    @endforelse
                </div>

                <div class="mt-4 lg:mt-6 pt-3 lg:pt-4 border-t border-white/10">
                    <a href="/"
                    class="flex items-center justify-center px-3 lg:px-4 py-2.5 lg:py-3 w-full bg-white text-primary-700 font-medium rounded-xl shadow hover:bg-primary-50 transition-all duration-300 transform hover:scale-[1.02] hover-lift button-hover text-sm lg:text-base">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 lg:h-5 lg:w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7m-7-7v14" />
                        </svg>
                        Retour à l'accueil
                    </a>
                </div>
            </div>
        </div>

        <!-- Zone de discussion -->
        <div class="flex-1 flex flex-col bg-white">
            @if(isset($currentConversation))
                <!-- En-tête du chat -->
                <div class="bg-primary-50 border-b px-4 lg:px-6 py-3 lg:py-4 flex items-center justify-between shadow-sm">
                    <div class="flex items-center">
                        @php
                            $otherParticipant = $currentConversation->getOtherParticipant();
                            $isAssociation = $otherParticipant && $otherParticipant->role === 'association';
                            $association = $isAssociation ? $currentConversation->association : null;
                        @endphp

                        <div class="relative">
                            @if($association && $association->logo)
                                <img src="data:image/png;base64,{{ $association->logo }}"
                                    class="w-10 h-10 lg:w-12 lg:h-12 rounded-full object-cover border-2 border-primary-200 shadow-md"
                                    alt="Logo {{ $association->nom }}">
                            @else
                                <div class="w-10 h-10 lg:w-12 lg:h-12 rounded-full bg-primary-200 text-primary-700 flex items-center justify-center font-semibold shadow-md">
                                    {{ strtoupper(substr($otherParticipant->name ?? '', 0, 1)) }}
                                </div>
                            @endif

                            @if($otherParticipant?->is_online)
                                <span class="absolute bottom-0 right-0 w-3 h-3 lg:w-3.5 lg:h-3.5 bg-green-400 rounded-full border-2 border-white animate-pulse"></span>
                            @endif
                        </div>

                        <div class="ml-3 lg:ml-4">
                            <h2 class="text-base lg:text-lg font-semibold text-gray-800">{{ $otherParticipant->name }}</h2>
                            <p class="text-xs text-gray-500 flex items-center">
                                <span class="inline-block w-2 h-2 rounded-full mr-1.5
                                    {{ $otherParticipant->is_online ? 'bg-green-500' : 'bg-gray-400' }}"></span>
                                {{ $otherParticipant->is_online ? 'En ligne' : 'Hors ligne' }}
                            </p>
                        </div>
                    </div>

                    <a href="/"
                    class="px-3 lg:px-4 py-2 bg-primary-600 text-white text-xs lg:text-sm font-medium rounded-full shadow-md hover:bg-primary-700 transition-all duration-300 transform hover:scale-[1.02] flex items-center button-hover glow-on-hover">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 lg:h-4 lg:w-4 mr-1 lg:mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7m-7-7v14" />
                        </svg>
                        <span class="hidden sm:inline">Accueil</span>
                    </a>
                </div>

                <!-- Messages -->
                <div id="chat-body" class="flex-1 p-3 lg:p-6 overflow-y-auto space-y-3 lg:space-y-4 bg-gray-50">
                    @foreach($messages as $message)
                        <div class="flex {{ $message->sender_id === auth()->id() ? 'justify-end' : 'justify-start' }} message-animation">
                            @if($message->sender_id !== auth()->id())
                                <div class="w-6 h-6 lg:w-8 lg:h-8 rounded-full bg-primary-200 text-primary-700 flex items-center justify-center font-semibold mr-2 self-end text-xs lg:text-sm">
                                    {{ strtoupper(substr($otherParticipant->name ?? '', 0, 1)) }}
                                </div>
                            @endif

                            <div class="max-w-xs lg:max-w-sm px-3 lg:px-4 py-2 lg:py-3 rounded-2xl shadow-md text-xs lg:text-sm
                                {{ $message->sender_id === auth()->id()
                                    ? 'bg-primary-600 text-white rounded-tr-none'
                                    : 'bg-white text-gray-800 rounded-tl-none border border-gray-100' }}">
                                <p>{{ $message->message }}</p>
                                <p class="text-[9px] lg:text-[10px] text-right mt-1 opacity-70">
                                    {{ $message->created_at->format('H:i') }}
                                </p>
                            </div>

                            @if($message->sender_id === auth()->id())
                                <div class="w-6 h-6 lg:w-8 lg:h-8 rounded-full bg-primary-600 text-white flex items-center justify-center font-semibold ml-2 self-end text-xs lg:text-sm">
                                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>

                <!-- Indicateur de frappe -->
                <div id="typing-indicator" class="px-3 lg:px-6 py-2 hidden">
                    <div class="flex items-center text-xs text-gray-500">
                        <div class="flex space-x-1 mr-2">
                            <div class="w-2 h-2 rounded-full bg-primary-400 typing-dot"></div>
                            <div class="w-2 h-2 rounded-full bg-primary-400 typing-dot"></div>
                            <div class="w-2 h-2 rounded-full bg-primary-400 typing-dot"></div>
                        </div>
                        <span>{{ $otherParticipant->name }} est en train d'écrire...</span>
                    </div>
                </div>

                <!-- Formulaire d'envoi -->
                <form id="chat-form" class="p-3 lg:p-4 bg-white border-t border-gray-200">
                    @csrf
                    <div class="flex items-center gap-2 lg:gap-3 max-w-3xl mx-auto">
                        <input id="message-input" type="text" name="message" placeholder="Écrivez un message..." required
                            class="flex-grow border border-gray-300 rounded-full px-4 lg:px-5 py-2.5 lg:py-3 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent bg-gray-50 shadow-sm transition-all duration-300 focus-glow text-sm lg:text-base"/>
                        <button id="send-button" type="submit"
                                class="bg-primary-600 text-white px-4 lg:px-5 py-2.5 lg:py-3 rounded-full hover:bg-primary-700 transition-all duration-300 shadow-md flex items-center button-hover glow-on-hover">
                            <span class="hidden sm:inline">Envoyer</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 sm:ml-1.5 transform group-hover:translate-x-1 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                            </svg>
                        </button>
                    </div>
                </form>

            @else
                <!-- État vide - Aucune conversation sélectionnée -->
                <div class="flex flex-col items-center justify-center h-full text-gray-400 bg-gray-50 p-4 lg:p-8">
                    <div class="bg-white p-6 lg:p-8 rounded-2xl shadow-lg max-w-md w-full text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 lg:h-20 lg:w-20 mx-auto mb-4 lg:mb-6 text-primary-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                        </svg>
                        <h3 class="text-lg lg:text-xl font-medium text-gray-700 mb-2">Aucune conversation sélectionnée</h3>
                        <p class="text-gray-500 mb-4 lg:mb-6 text-sm lg:text-base">Sélectionnez une conversation existante ou démarrez-en une nouvelle</p>
                        <a href="/" class="inline-block px-4 lg:px-6 py-2.5 lg:py-3 bg-primary-600 text-white text-sm font-medium rounded-full shadow-md hover:bg-primary-700 transition-all duration-300">
                            Retour à l'accueil
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </div>

    @if(isset($currentConversation))
    <script>
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

                // Disable button and show sending state
                const sendButton = document.getElementById("send-button");
                const originalButtonText = sendButton.innerHTML;
                sendButton.disabled = true;
                sendButton.innerHTML = `<svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>`;

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
                        <div class="flex justify-end message-animation">
                            <div class="max-w-xs lg:max-w-sm px-3 lg:px-4 py-2 lg:py-3 rounded-2xl shadow-md text-xs lg:text-sm bg-primary-600 text-white rounded-tr-none">
                                <p>${message}</p>
                                <p class="text-[9px] lg:text-[10px] text-right mt-1 opacity-70">
                                    ${new Date().toLocaleTimeString([], {hour: '2-digit', minute:'2-digit'})}
                                </p>
                            </div>
                            <div class="w-6 h-6 lg:w-8 lg:h-8 rounded-full bg-primary-600 text-white flex items-center justify-center font-semibold ml-2 self-end text-xs lg:text-sm">
                                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                            </div>
                        </div>
                    `;

                    chatBody.insertAdjacentHTML("beforeend", messageHtml);
                    chatBody.scrollTop = chatBody.scrollHeight;
                    messageInput.value = "";

                    // Reset button state
                    sendButton.disabled = false;
                    sendButton.innerHTML = originalButtonText;
                })
                .catch(error => {
                    console.error(error);
                    // Reset button state
                    sendButton.disabled = false;
                    sendButton.innerHTML = originalButtonText;
                });
            });

            // Add focus to input when page loads
            messageInput?.focus();

            // Simuler l'indicateur de frappe occasionnellement
            const typingIndicator = document.getElementById("typing-indicator");
            if (typingIndicator) {
                setInterval(() => {
                    const shouldShow = Math.random() > 0.7;
                    if (shouldShow) {
                        typingIndicator.classList.remove("hidden");
                        setTimeout(() => {
                            typingIndicator.classList.add("hidden");
                        }, 3000);
                    }
                }, 10000);
            }
        });

        // Mobile sidebar functionality
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const sidebar = document.getElementById('sidebar');
        const sidebarOverlay = document.getElementById('sidebar-overlay');
        const closeSidebar = document.getElementById('close-sidebar');

        function openSidebar() {
            sidebar.classList.add('open');
            sidebarOverlay.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeSidebarFunc() {
            sidebar.classList.remove('open');
            sidebarOverlay.classList.add('hidden');
            document.body.style.overflow = 'auto';
        }

        function closeSidebarOnMobile() {
            if (window.innerWidth < 1024) {
                closeSidebarFunc();
            }
        }

        mobileMenuBtn?.addEventListener('click', openSidebar);
        closeSidebar?.addEventListener('click', closeSidebarFunc);
        sidebarOverlay?.addEventListener('click', closeSidebarFunc);

        // Close sidebar on window resize if desktop
        window.addEventListener('resize', () => {
            if (window.innerWidth >= 1024) {
                closeSidebarFunc();
            }
        });
    </script>
    @endif
</body>
</html>
