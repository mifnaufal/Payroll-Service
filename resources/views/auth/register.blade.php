<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PayrollPro - Sign Up</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Custom Tailwind styles */
        .fade-in {
            animation: fadeIn 1s ease-in-out;
        }
        @keyframes fadeIn {
            0% { opacity: 0; transform: translateY(10px); }
            100% { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body class="bg-gray-50 dark:bg-gray-900 text-gray-900 dark:text-gray-100 min-h-screen flex flex-col">
    <!-- Header -->
    <header class="bg-white dark:bg-gray-800 shadow-sm">
        <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 flex justify-between items-center">
            <div class="flex items-center space-x-2">
                <svg class="w-8 h-8 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <span class="text-xl font-bold">PayrollPro</span>
            </div>
            <div class="flex space-x-4">
                <a href="{{ route('login') }}" class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-200 bg-gray-200 dark:bg-gray-700 rounded-md hover:bg-gray-300 dark:hover:bg-gray-600 transition">Log In</a>
                <a href="{{ route('register') }}" class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700 transition">Sign Up</a>
            </div>
        </nav>
    </header>

    <!-- Main Content -->
    <main class="flex-grow flex items-center justify-center py-12">
        <div class="max-w-md w-full mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-8 fade-in">
                <h2 class="text-2xl font-bold text-center mb-6">Sign Up for PayrollPro</h2>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- Name -->
                    <div class="mb-5">
                        <x-input-label for="name" :value="__('Name')" class="block text-sm font-semibold text-gray-800 dark:text-gray-200 mb-1.5 transition-colors duration-200" />
                        <x-text-input 
                            id="name" 
                            class="block mt-1 w-full rounded-lg border border-gray-300 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-100 py-2.5 px-3 text-sm shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 hover:border-gray-400 dark:hover:border-gray-500" 
                            type="text" 
                            name="name" 
                            :value="old('name')" 
                            required 
                            autofocus 
                            autocomplete="name" 
                        />
                        <x-input-error :messages="$errors->get('name')" class="mt-2 text-xs text-red-600 dark:text-red-400 font-medium" />
                    </div>

                    <!-- Email Address -->
                    <div class="mb-5">
                        <x-input-label for="email" :value="__('Email')" class="block text-sm font-semibold text-gray-800 dark:text-gray-200 mb-1.5 transition-colors duration-200" />
                        <x-text-input 
                            id="email" 
                            class="block mt-1 w-full rounded-lg border border-gray-300 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-100 py-2.5 px-3 text-sm shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 hover:border-gray-400 dark:hover:border-gray-500" 
                            type="email" 
                            name="email" 
                            :value="old('email')" 
                            required 
                            autocomplete="username" 
                        />
                        <x-input-error :messages="$errors->get('email')" class="mt-2 text-xs text-red-600 dark:text-red-400 font-medium" />
                    </div>

                    <!-- Password -->
                    <div class="mb-5">
                        <x-input-label for="password" :value="__('Password')" class="block text-sm font-semibold text-gray-800 dark:text-gray-200 mb-1.5 transition-colors duration-200" />
                        <x-text-input 
                            id="password" 
                            class="block mt-1 w-full rounded-lg border border-gray-300 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-100 py-2.5 px-3 text-sm shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 hover:border-gray-400 dark:hover:border-gray-500" 
                            type="password" 
                            name="password" 
                            required 
                            autocomplete="new-password" 
                        />
                        <x-input-error :messages="$errors->get('password')" class="mt-2 text-xs text-red-600 dark:text-red-400 font-medium" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="mb-5">
                        <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="block text-sm font-semibold text-gray-800 dark:text-gray-200 mb-1.5 transition-colors duration-200" />
                        <x-text-input 
                            id="password_confirmation" 
                            class="block mt-1 w-full rounded-lg border border-gray-300 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-100 py-2.5 px-3 text-sm shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 hover:border-gray-400 dark:hover:border-gray-500" 
                            type="password" 
                            name="password_confirmation" 
                            required 
                            autocomplete="new-password" 
                        />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-xs text-red-600 dark:text-red-400 font-medium" />
                    </div>

                    <!-- Submit and Login Link -->
                    <div class="flex items-center justify-between mt-6">
                        <a class="text-sm text-blue-600 dark:text-blue-400 hover:underline" href="{{ route('login') }}">
                            {{ __('Already registered?') }}
                        </a>
                        <button class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700 transition">
                            {{ __('Register') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-100 dark:bg-gray-800 py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-gray-600 dark:text-gray-400">
            <p>© {{ date('Y') }} PayrollPro. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>