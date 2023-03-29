<nav class="bg-{{ bgColor() }}-200">

    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <img class="h-8 w-8" src="{{ asset('Images\note-2-svgrepo-com.svg') }}" alt="Notes logo">
                </div>
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        <a href="{{ route('home') }}" class="{{ Request::is("home") ? "bg-green-700 text-white block rounded-md px-3 py-2 text-base font-medium" : "text-black hover:bg-".bgColor()."-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium" }}" aria-current="page">Home</a>

                        <a href="{{ route('about') }}" class="{{ Request::is('about') ? "bg-pink-700 text-white block rounded-md px-3 py-2 text-base font-medium" : "text-black hover:bg-".bgColor()."-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium" }}"> About </a>

                        <a href="{{ route('contact') }}" class="{{ Request::is("contact") ? "bg-blue-900 text-white block rounded-md px-3 py-2 text-base font-medium" : "text-black hover:bg-".bgColor()."-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium" }}"> Contact</a>

                        @auth
                            <a href="{{ route('notes.index') }}" class="{{ Request::is("notes*") ? "bg-yellow-700 text-white block rounded-md px-3 py-2 text-base font-medium mr-4" : "text-black hover:bg-".bgColor()."-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium mr-4" }}"> Notes </a>
                        @endauth
                    </div>
                </div>
            </div>
            @auth
           
                <div class="hidden md:block">
                    <div class="ml-4 flex items-center md:ml-6">
                        <!-- Search -->
                        
        
                        <div class="mt-5 flex lg:mt-0 lg:ml-4">
                         <a href="{{ route('profile.edit') }}" class="inline-flex items-center rounded-md bg-{{ bgColor() }}-400 px-3 py-2 text-sm font-semibold text-black shadow-sm hover:bg-{{ bgColor() }}-500 mr-2">Edit profile </a>
                        </div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="inline-flex items-center rounded-md bg-{{ bgColor() }}-400 px-3 py-2 text-sm font-semibold text-black shadow-sm hover:bg-{{ bgColor() }}-500">Log out</button>
                        </form>
                    </div>
                </div>  
            @endauth
            @guest
                <div class="ml-4 flex items-center md:ml-6">
                    <div class="mt-5 flex lg:mt-0 lg:ml-4">
                        <a href="{{ route('register') }}" class="inline-flex items-center rounded-md bg-{{ bgColor() }}-400 px-3 py-2 text-sm font-semibold text-black shadow-sm hover:bg-{{ bgColor() }}-400 mr-2">Sign Up </a>
                    </div>
                    <div class="mt-5 flex lg:mt-0 lg:ml-4">
                        <a href="{{ route('login') }}" class="inline-flex items-center rounded-md bg-{{ bgColor() }}-400 px-3 py-2 text-sm font-semibold text-black shadow-sm hover:bg-{{ bgColor() }}-400">Log in <span aria-hidden="true">&rarr;</span></a>
                    </div>
                </div>
            @endguest
        </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div class="md:hidden" id="mobile-menu">
        <div class="space-y-1 px-2 pt-2 pb-3 sm:px-3">
            <a href="{{ route('home') }}" class="{{ Request::is("home") ? "bg-green-700 text-white block rounded-md px-3 py-2 text-base font-medium" : "text-black hover:bg-".bgColor()."-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium" }}" aria-current="page">Home</a>

                        <a href="{{ route('about') }}" class="{{ Request::is('about') ? "bg-pink-700 text-white block rounded-md px-3 py-2 text-base font-medium" : "text-black hover:bg-".bgColor()."-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium" }}"> About </a>

                        @auth 
                            <a href="{{ route('notes.index') }}" class="{{ Request::is("notes*") ? "bg-yellow-700 text-white block rounded-md px-3 py-2 text-base font-medium" : "text-black hover:bg-".bgColor()."-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium" }}"> Notes </a>
                        @endauth

                        <a href="{{ route('contact') }}" class="{{ Request::is("contact") ? "bg-blue-900 text-white block rounded-md px-3 py-2 text-base font-medium" : "text-black hover:bg-".bgColor()."-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium" }}"> Contact</a>
        </div>
           @auth
            <div class="hidden md:block">
                <div class="ml-4 flex items-center md:ml-6">
                    <div class="mt-5 flex lg:mt-0 lg:ml-4">
                        <a href="{{ route('profile.edit') }}" class="inline-flex items-center rounded-md bg-{{ bgColor() }}-400 px-3 py-2 text-sm font-semibold text-black shadow-sm hover:bg-{{ bgColor() }}-500 mr-2">Edit profile </a>
                        </div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="inline-flex items-center rounded-md bg-{{ bgColor() }}-400 px-3 py-2 text-sm font-semibold text-black shadow-sm hover:bg-{{ bgColor() }}-500">Log out</button>
                        </form>
                </div>
            </div>
            @endauth
    </div> 
</nav>