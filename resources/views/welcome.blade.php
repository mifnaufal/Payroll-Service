    <!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PayrollPro - Effortless Payroll Solutions</title>
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
                    @if (Route::has('login'))
                        <a href="{{ route('login') }}" class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-200 bg-gray-200 dark:bg-gray-700 rounded-md hover:bg-gray-300 dark:hover:bg-gray-600 transition">Log In</a>
                    @endif
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700 transition">Sign Up</a>
                    @endif
                </div>
            </nav>
        </header>

        <!-- Hero Section -->
        <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 text-center">
            <h1 class="text-4xl sm:text-5xl font-bold mb-4 fade-in">Simplify Payroll with PayrollPro</h1>
            <p class="text-lg sm:text-xl text-gray-600 dark:text-gray-300 mb-8 fade-in">Automate payroll, ensure tax compliance, and empower your employees with our all-in-one payroll solution.</p>
            <div class="flex justify-center space-x-4 fade-in">
                <a href="{{ route('register') }}" class="px-6 py-3 text-lg font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700 transition">Get Started Free</a>
                <a href="#features" class="px-6 py-3 text-lg font-medium text-blue-600 dark:text-blue-400 border border-blue-600 dark:border-blue-400 rounded-md hover:bg-blue-50 dark:hover:bg-gray-800 transition">Learn More</a>
            </div>
        </section>

        <!-- Features Section -->
        <section id="features" class="bg-white dark:bg-gray-800 py-12">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-3xl font-bold text-center mb-8 fade-in">Why Choose PayrollPro?</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    <div class="p-6 bg-gray-50 dark:bg-gray-700 rounded-lg shadow-md fade-in">
                        <svg class="w-12 h-12 text-blue-600 dark:text-blue-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <h3 class="text-xl font-semibold mb-2">Automated Payroll</h3>
                        <p class="text-gray-600 dark:text-gray-300">Process payroll in minutes with accurate calculations and seamless direct deposits.</p>
                    </div>
                    <div class="p-6 bg-gray-50 dark:bg-gray-700 rounded-lg shadow-md fade-in">
                        <svg class="w-12 h-12 text-blue-600 dark:text-blue-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path>
                        </svg>
                        <h3 class="text-xl font-semibold mb-2">Tax Compliance</h3>
                        <p class="text-gray-600 dark:text-gray-300">Stay compliant with automated tax filings and up-to-date regulatory support.</p>
                    </div>
                    <div class="p-6 bg-gray-50 dark:bg-gray-700 rounded-lg shadow-md fade-in">
                        <svg class="w-12 h-12 text-blue-600 dark:text-blue-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        <h3 class="text-xl font-semibold mb-2">Employee Portal</h3>
                        <p class="text-gray-600 dark:text-gray-300">Provide employees with secure access to payslips, tax forms, and more.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="bg-blue-600 dark:bg-blue-700 py-12 text-center">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-3xl font-bold text-white mb-4 fade-in">Ready to Streamline Your Payroll?</h2>
                <p class="text-lg text-blue-100 mb-8 fade-in">Join thousands of businesses using PayrollPro to save time and reduce errors.</p>
                <a href="{{ route('register') }}" class="px-6 py-3 text-lg font-medium text-blue-600 bg-white rounded-md hover:bg-blue-50 transition fade-in">Sign Up Now</a>
            </div>
        </section>

        <!-- Footer -->
        <footer class="bg-gray-100 dark:bg-gray-800 py-6">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-gray-600 dark:text-gray-400">
                <p>&copy; {{ date('Y') }} PayrollPro. All rights reserved.</p>
            </div>
        </footer>
    </body>
    </html>