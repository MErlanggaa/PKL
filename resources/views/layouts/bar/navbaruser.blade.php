@php
    $dashboardRoute = '';
    if (auth()->check()) {
        $userRole = auth()->user()->role;
        if ($userRole === 'erlangga') {
            $dashboardRoute = route('dashboard.erlangga');
        } elseif ($userRole === 'hilmi') {
            $dashboardRoute = route('dashboard.hilmi');
        } else {
            $dashboardRoute = route('home'); // Default route if role not defined
        }
    }
@endphp


<div class="min-h-full">
    <nav class="bg-gray-800">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <img class="h-8 w-8" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company" />
                    </div>
                    <div class="hidden md:block">
                        <div class="ml-10 flex items-baseline space-x-4">
                            <a href="{{ $dashboardRoute }}" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white {{ in_array(Route::currentRouteName(), ['dashboard.erlangga', 'dashboard.hilmi']) ? 'bg-gray-900 text-white' : '' }}" aria-current="page">Dashboard</a>
                            
                                                    </div>
                    </div>
                </div>


                <div class="-mr-2 flex md:hidden">
                    <!-- Mobile menu button -->
                    <button id="mobile-menu-button" type="button" class="inline-flex items-center justify-center rounded-md bg-gray-800 p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" aria-controls="mobile-menu" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <!-- Menu open: "hidden", Menu closed: "block" -->
                        <svg id="menu-open-icon" class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16m-7 6h7"></path>
                        </svg>
                        <!-- Menu open: "block", Menu closed: "hidden" -->
                        <svg id="menu-close-icon" class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile menu, show/hide based on menu state. -->
        <div class="md:hidden" id="mobile-menu">
            <div class="px-2 pt-2 pb-3 sm:px-3 space-y-1">
                <a href="{{ $dashboardRoute }}" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white {{ in_array(Route::currentRouteName(), ['dashboard.erlangga', 'dashboard.hilmi']) ? 'bg-gray-900 text-white' : '' }}" aria-current="page">Dashboard</a>
               
            </div>
         
        </div>
    </nav>
</div>
