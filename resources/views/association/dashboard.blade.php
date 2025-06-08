<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Ehsan Dashboard</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Ehsan Dashboard - Modern Interface" name="description">

    <link rel="icon" type="image/png" href="{{ asset('img/Ehsan_logo2.png') }}" sizes="16x16">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#f0f9ff',
                            100: '#e0f2fe',
                            200: '#bae6fd',
                            300: '#7dd3fc',
                            400: '#38bdf8',
                            500: '#0ea5e9',
                            600: '#0284c7',
                            700: '#0369a1',
                            800: '#075985',
                            900: '#0c4a6e',
                            950: '#082f49',
                        },
                        dark: {
                            50: '#f8fafc',
                            100: '#f1f5f9',
                            200: '#e2e8f0',
                            300: '#cbd5e1',
                            400: '#94a3b8',
                            500: '#64748b',
                            600: '#475569',
                            700: '#334155',
                            800: '#1e293b',
                            900: '#0f172a',
                            950: '#020617',
                        }
                    },
                    animation: {
                        'fade-in': 'fadeIn 0.5s ease-in-out',
                        'slide-up': 'slideUp 0.3s ease-out',
                        'pulse-slow': 'pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                    }
                }
            }
        }
    </script>

    <style>
    /* Custom Animations */
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    @keyframes slideUp {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    /* Custom Scrollbar */
    ::-webkit-scrollbar {
        width: 6px;
    }

    ::-webkit-scrollbar-track {
        background: rgba(15, 23, 42, 0.1);
        border-radius: 10px;
    }

    .dark ::-webkit-scrollbar-track {
        background: rgba(15, 23, 42, 0.1);
    }

    ::-webkit-scrollbar-thumb {
        background: rgba(15, 23, 42, 0.3);
        border-radius: 10px;
    }

    .dark ::-webkit-scrollbar-thumb {
        background: rgba(255, 255, 255, 0.2);
    }

    ::-webkit-scrollbar-thumb:hover {
        background: rgba(15, 23, 42, 0.5);
    }

    .dark ::-webkit-scrollbar-thumb:hover {
        background: rgba(255, 255, 255, 0.3);
    }

    /* Glassmorphism effect */
    .glass {
        backdrop-filter: blur(16px) saturate(180%);
        background-color: rgba(255, 255, 255, 0.85);
        border: 1px solid rgba(255, 255, 255, 0.3);
    }

    .dark .glass {
        background-color: rgba(15, 23, 42, 0.75);
        border: 1px solid rgba(255, 255, 255, 0.125);
    }

    /* Light mode specific glass */
    .glass-light {
        backdrop-filter: blur(16px) saturate(180%);
        background-color: rgba(255, 255, 255, 0.9);
        border: 1px solid rgba(14, 165, 233, 0.1);
        box-shadow: 0 8px 32px rgba(14, 165, 233, 0.1);
    }

    .dark .glass-light {
        background-color: rgba(15, 23, 42, 0.75);
        border: 1px solid rgba(255, 255, 255, 0.125);
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
    }

    /* Hover effects */
    .hover-lift {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .hover-lift:hover {
        transform: translateY(-4px);
        box-shadow: 0 20px 25px -5px rgba(14, 165, 233, 0.1), 0 10px 10px -5px rgba(14, 165, 233, 0.04);
    }

    .dark .hover-lift:hover {
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.3), 0 10px 10px -5px rgba(0, 0, 0, 0.2);
    }

    /* Glow effects */
    .glow-blue {
        box-shadow: 0 0 20px rgba(14, 165, 233, 0.2);
    }

    .glow-blue:hover {
        box-shadow: 0 0 30px rgba(14, 165, 233, 0.4);
    }

    .dark .glow-blue {
        box-shadow: 0 0 20px rgba(14, 165, 233, 0.3);
    }

    .dark .glow-blue:hover {
        box-shadow: 0 0 30px rgba(14, 165, 233, 0.5);
    }

    /* Card animations */
    .card-hover {
        transition: all 0.3s ease;
    }

    .card-hover:hover {
        transform: translateY(-2px) scale(1.02);
        box-shadow: 0 25px 50px -12px rgba(14, 165, 233, 0.15);
    }

    .dark .card-hover:hover {
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
    }

    /* Sidebar animations */
    .sidebar-item {
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .sidebar-item::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(14, 165, 233, 0.1), transparent);
        transition: left 0.5s;
    }

    .dark .sidebar-item::before {
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
    }

    .sidebar-item:hover::before {
        left: 100%;
    }

    /* Progress bar animation */
    .progress-bar {
        animation: progressLoad 2s ease-in-out;
    }

    @keyframes progressLoad {
        from { width: 0%; }
    }

    /* Notification badge */
    .notification-badge {
        animation: bounce 2s infinite;
    }

    @keyframes bounce {
        0%, 20%, 53%, 80%, 100% {
            transform: translate3d(0,0,0);
        }
        40%, 43% {
            transform: translate3d(0, -8px, 0);
        }
        70% {
            transform: translate3d(0, -4px, 0);
        }
        90% {
            transform: translate3d(0, -2px, 0);
        }
    }

    /* Light mode background */
    .bg-light {
        background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 50%, #bae6fd 100%);
    }

    /* Light mode text colors */
    .text-light-primary {
        color: #0369a1;
    }

    .text-light-secondary {
        color: #64748b;
    }

    /* Light mode button styles */
    .btn-light {
        background: linear-gradient(135deg, #0ea5e9 0%, #0284c7 100%);
        color: white;
        border: 1px solid rgba(14, 165, 233, 0.2);
    }

    .btn-light:hover {
        background: linear-gradient(135deg, #0284c7 0%, #0369a1 100%);
        box-shadow: 0 10px 25px rgba(14, 165, 233, 0.3);
    }
</style>
</head>

<body x-data="setup()" :class="isDark ? 'bg-gradient-to-br from-dark-900 via-dark-800 to-primary-950' : 'bg-light'" class="font-['DM_Sans'] min-h-screen transition-all duration-500">
    <div :class="{ 'dark': isDark }" class="min-h-screen">

        <!-- Header -->
        <header :class="isDark ? 'glass' : 'glass-light'" class="fixed top-0 w-full z-50 border-b backdrop-blur-xl transition-all duration-300"
                :style="isDark ? 'border-color: rgba(255, 255, 255, 0.1)' : 'border-color: rgba(14, 165, 233, 0.1)'">
            <div class="flex items-center justify-between h-16 px-6">
                <!-- Logo + Nom -->
                <div class="flex items-center space-x-4">
                    <img src="data:image/png;base64,{{ $association->logo }}"
                         alt="Logo {{ $association->nom }}"
                         class="w-10 h-10 rounded-full border-2 border-primary-400 shadow-lg object-cover glow-blue">
                    <span :class="isDark ? 'text-white' : 'text-light-primary'" class="hidden md:block font-bold text-xl truncate max-w-[200px] transition-colors duration-300">{{ $association->nom }}</span>
                </div>

                <!-- Actions -->
                <div class="flex items-center space-x-4">
                    <!-- Search -->
                    <div class="relative">
                        <div :class="isDark ? 'bg-dark-800/50 border-white/10 focus-within:border-primary-400' : 'bg-white/70 border-primary-200 focus-within:border-primary-500'"
                             class="backdrop-blur-sm rounded-xl flex items-center px-4 py-2 w-64 border transition-all duration-300">
                            <svg :class="isDark ? 'text-gray-400' : 'text-primary-400'" class="w-5 h-5 transition-colors duration-300" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                            <input type="search" placeholder="Rechercher..."
                                   :class="isDark ? 'text-white placeholder-gray-400' : 'text-light-primary placeholder-primary-400'"
                                   class="ml-3 bg-transparent focus:outline-none w-full text-sm transition-colors duration-300">
                        </div>
                    </div>

                    <!-- Theme toggle -->
                    <button @click="toggleTheme"
                            :class="isDark ? 'bg-dark-800/50 border-white/10 hover:border-primary-400' : 'bg-white/70 border-primary-200 hover:border-primary-500'"
                            class="p-3 backdrop-blur-sm rounded-xl transition-all duration-300 border glow-blue">
                        <svg :class="isDark ? 'text-white' : 'text-primary-600'" class="w-5 h-5 transition-colors duration-300" fill="currentColor" viewBox="0 0 24 24">
                            <!-- Icône dynamique selon le thème -->
                            <path x-show="isDark" d="M12 2a1 1 0 011 1v2a1 1 0 11-2 0V3a1 1 0 011-1zM4.222 4.222a1 1 0 011.414 0l1.415 1.415a1 1 0 01-1.414 1.414L4.222 5.636a1 1 0 010-1.414zM2 12a1 1 0 011-1h2a1 1 0 110 2H3a1 1 0 01-1-1zm16.364-7.778a1 1 0 011.414 1.414l-1.415 1.415a1 1 0 01-1.414-1.414l1.415-1.415zM20 11a1 1 0 011 1 9 9 0 01-9 9 1 1 0 010-2 7 7 0 007-7 1 1 0 011-1z" />
                            <path x-show="!isDark" d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z" />
                        </svg>
                    </button>

                    <!-- Logout -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button :class="isDark ? 'bg-primary-600 hover:bg-primary-700' : 'btn-light'"
                                class="flex items-center space-x-2 px-4 py-2 text-white rounded-xl transition-all duration-300 transform hover:scale-105 glow-blue" type="submit">
                            <i class="fas fa-sign-out-alt"></i>
                            <span class="hidden sm:inline">Déconnexion</span>
                        </button>
                    </form>
                </div>
            </div>
        </header>

        <!-- Sidebar -->
        <div :class="isDark ? 'glass' : 'glass-light'"
             class="fixed flex flex-col top-16 left-0 w-16 hover:w-72 md:w-72 h-[calc(100vh-4rem)] transition-all duration-300 border-r z-40 group"
             :style="isDark ? 'border-color: rgba(255, 255, 255, 0.1)' : 'border-color: rgba(14, 165, 233, 0.1)'">
            <div class="overflow-y-auto overflow-x-hidden flex flex-col justify-between flex-grow">
                <ul class="flex flex-col py-6 space-y-2">
                    <li class="px-5 hidden md:block group-hover:block">
                        <div class="flex flex-row items-center h-8">
                            <div :class="isDark ? 'text-primary-300' : 'text-primary-600'" class="text-sm font-medium tracking-wide uppercase transition-colors duration-300">Navigation</div>
                        </div>
                    </li>

                    <li>
                        <a href="#" :class="isDark ? 'text-white hover:bg-primary-800/30 border-transparent hover:border-primary-400' : 'text-light-primary hover:bg-primary-50 border-transparent hover:border-primary-500'"
                           class="sidebar-item relative flex flex-row items-center h-12 focus:outline-none border-l-4 pr-6 rounded-r-xl mx-2 transition-all duration-300">
                            <span class="inline-flex justify-center items-center ml-4">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                                </svg>
                            </span>
                            <span class="ml-3 text-sm tracking-wide truncate opacity-0 md:opacity-100 group-hover:opacity-100 transition-opacity duration-300">Dashboard</span>
                        </a>
                    </li>

                    <li>
                        <a href="#" :class="isDark ? 'text-white hover:bg-primary-800/30 border-transparent hover:border-primary-400' : 'text-light-primary hover:bg-primary-50 border-transparent hover:border-primary-500'"
                           class="sidebar-item relative flex flex-row items-center h-12 focus:outline-none border-l-4 pr-6 rounded-r-xl mx-2 transition-all duration-300">
                            <span class="inline-flex justify-center items-center ml-4">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                                </svg>
                            </span>
                            <span class="ml-3 text-sm tracking-wide truncate opacity-0 md:opacity-100 group-hover:opacity-100 transition-opacity duration-300">Board</span>
                            <span :class="isDark ? 'text-primary-100 bg-primary-600/50' : 'text-white bg-primary-500'"
                                  class="hidden md:block group-hover:block px-2 py-1 ml-auto text-xs font-medium tracking-wide rounded-full notification-badge transition-colors duration-300">New</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('Conversation.index') }}" :class="isDark ? 'text-white hover:bg-primary-800/30 border-transparent hover:border-primary-400' : 'text-light-primary hover:bg-primary-50 border-transparent hover:border-primary-500'"
                           class="sidebar-item relative flex flex-row items-center h-12 focus:outline-none border-l-4 pr-6 rounded-r-xl mx-2 transition-all duration-300">
                            <span class="inline-flex justify-center items-center ml-4">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path>
                                </svg>
                            </span>
                            <span class="ml-3 text-sm tracking-wide truncate opacity-0 md:opacity-100 group-hover:opacity-100 transition-opacity duration-300">Messages</span>
                        </a>
                    </li>

                    <li>
                        <a href="#" :class="isDark ? 'text-white hover:bg-primary-800/30 border-transparent hover:border-primary-400' : 'text-light-primary hover:bg-primary-50 border-transparent hover:border-primary-500'"
                           class="sidebar-item relative flex flex-row items-center h-12 focus:outline-none border-l-4 pr-6 rounded-r-xl mx-2 transition-all duration-300">
                            <span class="inline-flex justify-center items-center ml-4">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                                </svg>
                            </span>
                            <span class="ml-3 text-sm tracking-wide truncate opacity-0 md:opacity-100 group-hover:opacity-100 transition-opacity duration-300">Notifications</span>
                            <span :class="isDark ? 'text-red-100 bg-red-500/80' : 'text-white bg-red-500'"
                                  class="hidden md:block group-hover:block px-2 py-1 ml-auto text-xs font-medium tracking-wide rounded-full notification-badge transition-colors duration-300">1.2k</span>
                        </a>
                    </li>

                    <li class="px-5 hidden md:block group-hover:block mt-6">
                        <div class="flex flex-row items-center h-8">
                            <div :class="isDark ? 'text-primary-300' : 'text-primary-600'" class="text-sm font-medium tracking-wide uppercase transition-colors duration-300">Paramètres</div>
                        </div>
                    </li>

                    <li>
                        <a href="{{ route('associations.show',auth()->user()->id) }}" :class="isDark ? 'text-white hover:bg-primary-800/30 border-transparent hover:border-primary-400' : 'text-light-primary hover:bg-primary-50 border-transparent hover:border-primary-500'"
                           class="sidebar-item relative flex flex-row items-center h-12 focus:outline-none border-l-4 pr-6 rounded-r-xl mx-2 transition-all duration-300">
                            <span class="inline-flex justify-center items-center ml-4">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </span>
                            <span class="ml-3 text-sm tracking-wide truncate opacity-0 md:opacity-100 group-hover:opacity-100 transition-opacity duration-300">Profile</span>
                        </a>
                    </li>

                    <li>
                        <a href="#" :class="isDark ? 'text-white hover:bg-primary-800/30 border-transparent hover:border-primary-400' : 'text-light-primary hover:bg-primary-50 border-transparent hover:border-primary-500'"
                           class="sidebar-item relative flex flex-row items-center h-12 focus:outline-none border-l-4 pr-6 rounded-r-xl mx-2 transition-all duration-300">
                            <span class="inline-flex justify-center items-center ml-4">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                            </span>
                            <span class="ml-3 text-sm tracking-wide truncate opacity-0 md:opacity-100 group-hover:opacity-100 transition-opacity duration-300">Paramètres</span>
                        </a>
                    </li>
                </ul>

                <div class="p-4 hidden md:block group-hover:block">
                    <p :class="isDark ? 'text-primary-300' : 'text-primary-500'" class="text-center text-xs transition-colors duration-300">© 2024 Ehsan</p>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="ml-16 md:ml-72 mt-16 p-6 min-h-screen">

            <!-- Statistics Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8 animate-fade-in">

                <!-- Publications -->
                <div :class="isDark ? 'glass border-white/10' : 'glass-light'" class="rounded-2xl p-6 border hover-lift card-hover group transition-all duration-300">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center justify-center w-14 h-14 bg-gradient-to-br from-primary-500 to-primary-600 rounded-xl shadow-lg group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h6m-1 8H6a2 2 0 01-2-2V6a2 2 0 012-2h7l5 5v11a2 2 0 01-2 2z"/>
                            </svg>
                        </div>
                        <div class="text-right">
                            <p :class="isDark ? 'text-white' : 'text-light-primary'" class="text-3xl font-bold transition-colors duration-300">{{ $posts->count() }}</p>
                            <p :class="isDark ? 'text-primary-300' : 'text-light-secondary'" class="text-sm transition-colors duration-300">Publications</p>
                        </div>
                    </div>
                </div>

                <!-- Événements -->
                <div :class="isDark ? 'glass border-white/10' : 'glass-light'" class="rounded-2xl p-6 border hover-lift card-hover group transition-all duration-300">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center justify-center w-14 h-14 bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-xl shadow-lg group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <div class="text-right">
                            <p :class="isDark ? 'text-white' : 'text-light-primary'" class="text-3xl font-bold transition-colors duration-300">{{ $events->count() }}</p>
                            <p :class="isDark ? 'text-primary-300' : 'text-light-secondary'" class="text-sm transition-colors duration-300">Événements</p>
                        </div>
                    </div>
                </div>

                <!-- Membres -->
                <div :class="isDark ? 'glass border-white/10' : 'glass-light'" class="rounded-2xl p-6 border hover-lift card-hover group transition-all duration-300">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center justify-center w-14 h-14 bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl shadow-lg group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a4 4 0 00-5-4M9 20H4v-2a4 4 0 015-4m5-4a3 3 0 11-6 0 3 3 0 016 0zm6 3a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                        </div>
                        <div class="text-right">
                            <p :class="isDark ? 'text-white' : 'text-light-primary'" class="text-3xl font-bold transition-colors duration-300">1</p>
                            <p :class="isDark ? 'text-primary-300' : 'text-light-secondary'" class="text-sm transition-colors duration-300">Membres</p>
                        </div>
                    </div>
                </div>

                <!-- Total donation -->
                <div :class="isDark ? 'glass border-white/10' : 'glass-light'" class="rounded-2xl p-6 border hover-lift card-hover group transition-all duration-300">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center justify-center w-14 h-14 bg-gradient-to-br from-amber-500 to-amber-600 rounded-xl shadow-lg group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-2 0-3 .895-3 2s1 2 3 2 3 .895 3 2-1 2-3 2m0-8V4m0 16v-4"/>
                            </svg>
                        </div>
                        <div class="text-right">
                            <p :class="isDark ? 'text-white' : 'text-light-primary'" class="text-3xl font-bold transition-colors duration-300">7,333 DH</p>
                            <p :class="isDark ? 'text-primary-300' : 'text-light-secondary'" class="text-sm transition-colors duration-300">Total dons</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">

                <!-- Members Table -->
                <div :class="isDark ? 'glass border-white/10' : 'glass-light'" class="rounded-2xl border overflow-hidden animate-slide-up transition-all duration-300">
                    <div :class="isDark ? 'border-white/10' : 'border-primary-100'" class="p-6 border-b transition-all duration-300">
                        <div class="flex items-center justify-between">
                            <h3 :class="isDark ? 'text-white' : 'text-light-primary'" class="text-xl font-semibold transition-colors duration-300">Membres de {{ $association->nom }}</h3>
                            <button :class="isDark ? 'bg-primary-600 hover:bg-primary-700' : 'btn-light'" class="px-4 py-2 text-white text-sm font-medium rounded-lg transition-all duration-300 transform hover:scale-105">
                                Voir tout
                            </button>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="text-center py-8">
                            <svg :class="isDark ? 'text-primary-400' : 'text-primary-500'" class="w-16 h-16 mx-auto mb-4 transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a4 4 0 00-5-4M9 20H4v-2a4 4 0 015-4m5-4a3 3 0 11-6 0 3 3 0 016 0zm6 3a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            <p :class="isDark ? 'text-primary-300' : 'text-light-secondary'" class="transition-colors duration-300">Aucun membre pour le moment</p>
                        </div>
                    </div>
                </div>

                <!-- Recent Donations -->
                <div :class="isDark ? 'glass border-white/10' : 'glass-light'" class="rounded-2xl border overflow-hidden animate-slide-up transition-all duration-300">
                    <div :class="isDark ? 'border-white/10' : 'border-primary-100'" class="p-6 border-b transition-all duration-300">
                        <div class="flex items-center justify-between">
                            <h3 :class="isDark ? 'text-white' : 'text-light-primary'" class="text-xl font-semibold transition-colors duration-300">Dons récents</h3>
                            <button :class="isDark ? 'bg-primary-600 hover:bg-primary-700' : 'btn-light'" class="px-4 py-2 text-white text-sm font-medium rounded-lg transition-all duration-300 transform hover:scale-105">
                                Voir tout
                            </button>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="space-y-4">
                            <div :class="isDark ? 'bg-dark-800/30 border-white/5 hover:border-primary-400/30' : 'bg-white/50 border-primary-100 hover:border-primary-300'"
                                 class="flex items-center p-4 rounded-xl border transition-all duration-300">
                                <div class="w-10 h-10 bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-full flex items-center justify-center mr-4">
                                    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M8.433 7.418c.155-.103.346-.196.567-.267v1.698a2.305 2.305 0 01-.567-.267C8.07 8.34 8 8.114 8 8c0-.114.07-.34.433-.582zM11 12.849v-1.698c.22.071.412.164.567.267.364.243.433.468.433.582 0 .114-.07.34-.433.582a2.305 2.305 0 01-.567.267z"/>
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6 7.009 6 8c0 .99.602 1.765 1.324 2.246.48.32 1.054.545 1.676.662v1.941c-.391-.127-.68-.317-.843-.504a1 1 0 10-1.51 1.31c.562.649 1.413 1.076 2.353 1.253V15a1 1 0 102 0v-.092a4.535 4.535 0 001.676-.662C13.398 13.766 14 12.991 14 12c0-.99-.602-1.765-1.324-2.246A4.535 4.535 0 0011 9.092V7.151c.391.127.68.317.843.504a1 1 0 101.511-1.31c-.563-.649-1.413-1.076-2.354-1.253V5z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                <div class="flex-grow">
                                    <p :class="isDark ? 'text-white' : 'text-light-primary'" class="font-medium transition-colors duration-300">Don anonyme</p>
                                    <p :class="isDark ? 'text-primary-300' : 'text-light-secondary'" class="text-sm transition-colors duration-300">Il y a 2 heures</p>
                                </div>
                                <div class="text-right">
                                    <p class="text-emerald-500 font-bold">+500 DH</p>
                                </div>
                            </div>

                            <div :class="isDark ? 'bg-dark-800/30 border-white/5 hover:border-primary-400/30' : 'bg-white/50 border-primary-100 hover:border-primary-300'"
                                 class="flex items-center p-4 rounded-xl border transition-all duration-300">
                                <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-blue-600 rounded-full flex items-center justify-center mr-4">
                                    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M8.433 7.418c.155-.103.346-.196.567-.267v1.698a2.305 2.305 0 01-.567-.267C8.07 8.34 8 8.114 8 8c0-.114.07-.34.433-.582zM11 12.849v-1.698c.22.071.412.164.567.267.364.243.433.468.433.582 0 .114-.07.34-.433.582a2.305 2.305 0 01-.567.267z"/>
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6 7.009 6 8c0 .99.602 1.765 1.324 2.246.48.32 1.054.545 1.676.662v1.941c-.391-.127-.68-.317-.843-.504a1 1 0 10-1.51 1.31c.562.649 1.413 1.076 2.353 1.253V15a1 1 0 102 0v-.092a4.535 4.535 0 001.676-.662C13.398 13.766 14 12.991 14 12c0-.99-.602-1.765-1.324-2.246A4.535 4.535 0 0011 9.092V7.151c.391.127.68.317.843.504a1 1 0 101.511-1.31c-.563-.649-1.413-1.076-2.354-1.253V5z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                <div class="flex-grow">
                                    <p :class="isDark ? 'text-white' : 'text-light-primary'" class="font-medium transition-colors duration-300">Ahmed Benali</p>
                                    <p :class="isDark ? 'text-primary-300' : 'text-light-secondary'" class="text-sm transition-colors duration-300">Il y a 1 jour</p>
                                </div>
                                <div class="text-right">
                                    <p class="text-emerald-500 font-bold">+1,200 DH</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Task Management -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="md:col-span-3 mb-6">
                    <h3 :class="isDark ? 'text-white' : 'text-light-primary'" class="text-2xl font-bold transition-colors duration-300">Gestion des tâches</h3>
                    <p :class="isDark ? 'text-primary-300' : 'text-light-secondary'" class="transition-colors duration-300">Organisez et suivez vos projets</p>
                </div>

                <!-- TO DO -->
                <div :class="isDark ? 'glass border-white/10' : 'glass-light'" class="rounded-2xl p-6 border hover-lift transition-all duration-300">
                    <div class="flex justify-between items-center mb-4">
                        <h4 :class="isDark ? 'text-white' : 'text-light-primary'" class="text-lg font-semibold transition-colors duration-300">À faire</h4>
                        <span class="w-3 h-3 bg-red-500 rounded-full"></span>
                    </div>
                    <div class="space-y-3">
                        <div :class="isDark ? 'bg-dark-800/30 border-white/5 hover:border-primary-400/30' : 'bg-white/50 border-primary-100 hover:border-primary-300'"
                             class="p-3 rounded-lg border transition-all duration-300 cursor-pointer">
                            <p :class="isDark ? 'text-white' : 'text-light-primary'" class="text-sm transition-colors duration-300">Mettre à jour le site web</p>
                        </div>
                        <div :class="isDark ? 'bg-dark-800/30 border-white/5 hover:border-primary-400/30' : 'bg-white/50 border-primary-100 hover:border-primary-300'"
                             class="p-3 rounded-lg border transition-all duration-300 cursor-pointer">
                            <p :class="isDark ? 'text-white' : 'text-light-primary'" class="text-sm transition-colors duration-300">Préparer l'événement de charité</p>
                        </div>
                        <div :class="isDark ? 'bg-dark-800/30 border-white/5 hover:border-primary-400/30' : 'bg-white/50 border-primary-100 hover:border-primary-300'"
                             class="p-3 rounded-lg border transition-all duration-300 cursor-pointer">
                            <p :class="isDark ? 'text-white' : 'text-light-primary'" class="text-sm transition-colors duration-300">Réviser les comptes</p>
                        </div>
                    </div>
                </div>

                <!-- IN PROGRESS -->
                <div :class="isDark ? 'glass border-white/10' : 'glass-light'" class="rounded-2xl p-6 border hover-lift transition-all duration-300">
                    <div class="flex justify-between items-center mb-4">
                        <h4 :class="isDark ? 'text-white' : 'text-light-primary'" class="text-lg font-semibold transition-colors duration-300">En cours</h4>
                        <span class="w-3 h-3 bg-yellow-500 rounded-full"></span>
                    </div>
                    <div class="space-y-3">
                        <div :class="isDark ? 'bg-dark-800/30 border-white/5 hover:border-primary-400/30' : 'bg-white/50 border-primary-100 hover:border-primary-300'"
                             class="p-3 rounded-lg border transition-all duration-300 cursor-pointer">
                            <p :class="isDark ? 'text-white' : 'text-light-primary'" class="text-sm transition-colors duration-300">Campagne de sensibilisation</p>
                            <div :class="isDark ? 'bg-dark-700' : 'bg-gray-200'" class="mt-2 rounded-full h-2 transition-colors duration-300">
                                <div class="bg-yellow-500 h-2 rounded-full progress-bar" style="width: 60%"></div>
                            </div>
                        </div>
                        <div :class="isDark ? 'bg-dark-800/30 border-white/5 hover:border-primary-400/30' : 'bg-white/50 border-primary-100 hover:border-primary-300'"
                             class="p-3 rounded-lg border transition-all duration-300 cursor-pointer">
                            <p :class="isDark ? 'text-white' : 'text-light-primary'" class="text-sm transition-colors duration-300">Formation des bénévoles</p>
                            <div :class="isDark ? 'bg-dark-700' : 'bg-gray-200'" class="mt-2 rounded-full h-2 transition-colors duration-300">
                                <div class="bg-yellow-500 h-2 rounded-full progress-bar" style="width: 30%"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- COMPLETED -->
                <div :class="isDark ? 'glass border-white/10' : 'glass-light'" class="rounded-2xl p-6 border hover-lift transition-all duration-300">
                    <div class="flex justify-between items-center mb-4">
                        <h4 :class="isDark ? 'text-white' : 'text-light-primary'" class="text-lg font-semibold transition-colors duration-300">Terminé</h4>
                        <span class="w-3 h-3 bg-emerald-500 rounded-full"></span>
                    </div>
                    <div class="space-y-3">
                        <div :class="isDark ? 'bg-dark-800/30 border-white/5 hover:border-primary-400/30' : 'bg-white/50 border-primary-100 hover:border-primary-300'"
                             class="p-3 rounded-lg border transition-all duration-300 cursor-pointer">
                            <p :class="isDark ? 'text-white' : 'text-light-primary'" class="text-sm transition-colors duration-300">Rapport mensuel</p>
                            <p class="text-emerald-500 text-xs mt-1">✓ Complété</p>
                        </div>
                        <div :class="isDark ? 'bg-dark-800/30 border-white/5 hover:border-primary-400/30' : 'bg-white/50 border-primary-100 hover:border-primary-300'"
                             class="p-3 rounded-lg border transition-all duration-300 cursor-pointer">
                            <p :class="isDark ? 'text-white' : 'text-light-primary'" class="text-sm transition-colors duration-300">Mise à jour des statuts</p>
                            <p class="text-emerald-500 text-xs mt-1">✓ Complété</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Section -->
            <div :class="isDark ? 'glass border-white/10' : 'glass-light'" class="rounded-2xl border overflow-hidden transition-all duration-300">
                <div :class="isDark ? 'border-white/10' : 'border-primary-100'" class="p-6 border-b transition-all duration-300">
                    <h3 :class="isDark ? 'text-white' : 'text-light-primary'" class="text-2xl font-bold transition-colors duration-300">Nous contacter</h3>
                    <p :class="isDark ? 'text-primary-300' : 'text-light-secondary'" class="transition-colors duration-300">Envoyez-nous un message</p>
                </div>
                <div class="grid grid-cols-1 lg:grid-cols-2">
                    <div class="p-6">
                        <div class="space-y-6">
                            <div class="flex items-center space-x-4">
                                <div class="w-12 h-12 bg-primary-600 rounded-xl flex items-center justify-center">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                </div>
                                <div>
                                    <p :class="isDark ? 'text-white' : 'text-light-primary'" class="font-medium transition-colors duration-300">Adresse</p>
                                    <p :class="isDark ? 'text-primary-300' : 'text-light-secondary'" class="transition-colors duration-300">Casablanca, Maroc</p>
                                </div>
                            </div>

                            <div class="flex items-center space-x-4">
                                <div class="w-12 h-12 bg-primary-600 rounded-xl flex items-center justify-center">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                                <div>
                                    <p :class="isDark ? 'text-white' : 'text-light-primary'" class="font-medium transition-colors duration-300">Email</p>
                                    <p :class="isDark ? 'text-primary-300' : 'text-light-secondary'" class="transition-colors duration-300">contact@ehsan.ma</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div :class="isDark ? 'border-white/10' : 'border-primary-100'" class="p-6 border-l transition-all duration-300">
                        <form class="space-y-4">
                            <div>
                                <input type="text" placeholder="Nom complet"
                                       :class="isDark ? 'bg-dark-800/50 border-white/10 text-white placeholder-gray-400 focus:border-primary-400' : 'bg-white/70 border-primary-200 text-light-primary placeholder-primary-400 focus:border-primary-500'"
                                       class="w-full px-4 py-3 border rounded-xl focus:outline-none transition-all duration-300">
                            </div>
                            <div>
                                <input type="email" placeholder="Email"
                                       :class="isDark ? 'bg-dark-800/50 border-white/10 text-white placeholder-gray-400 focus:border-primary-400' : 'bg-white/70 border-primary-200 text-light-primary placeholder-primary-400 focus:border-primary-500'"
                                       class="w-full px-4 py-3 border rounded-xl focus:outline-none transition-all duration-300">
                            </div>
                            <div>
                                <textarea placeholder="Message" rows="4"
                                          :class="isDark ? 'bg-dark-800/50 border-white/10 text-white placeholder-gray-400 focus:border-primary-400' : 'bg-white/70 border-primary-200 text-light-primary placeholder-primary-400 focus:border-primary-500'"
                                          class="w-full px-4 py-3 border rounded-xl focus:outline-none transition-all duration-300 resize-none"></textarea>
                            </div>
                            <button type="submit"
                                    :class="isDark ? 'bg-gradient-to-r from-primary-600 to-primary-700 hover:from-primary-700 hover:to-primary-800' : 'btn-light'"
                                    class="w-full px-6 py-3 text-white font-medium rounded-xl transition-all duration-300 transform hover:scale-105 glow-blue">
                                Envoyer le message
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.0/dist/alpine.min.js" defer></script>
    <script>
        const setup = () => {
            const getTheme = () => {
                if (window.localStorage.getItem('dark')) {
                    return JSON.parse(window.localStorage.getItem('dark'))
                }
                return !!window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches
            }

            const setTheme = (value) => {
                window.localStorage.setItem('dark', value)
            }

            return {
                loading: true,
                isDark: getTheme(),
                toggleTheme() {
                    this.isDark = !this.isDark
                    setTheme(this.isDark)
                },
            }
        }

        // Add some interactive animations
        document.addEventListener('DOMContentLoaded', function() {
            // Animate progress bars
            const progressBars = document.querySelectorAll('.progress-bar');
            progressBars.forEach(bar => {
                const width = bar.style.width;
                bar.style.width = '0%';
                setTimeout(() => {
                    bar.style.width = width;
                }, 500);
            });

            // Add hover effects to cards
            const cards = document.querySelectorAll('.card-hover');
            cards.forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-8px) scale(1.02)';
                });
                card.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0) scale(1)';
                });
            });
        });
    </script>
</body>
</html>
