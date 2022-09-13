<nav class="bg-gray-800" x-data="{ open: false }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex items-center justify-between h-16">
        <div class="flex items-center">
          {{-- Logotipo --}}
          <a href="{{route('posts.index')}}" class="flex-shrink-0">
            <img class="h-8 w-8" src="https://tailwindui.com/img/logos/workflow-mark.svg?color=indigo&shade=500" alt="Workflow">
          </a>
          <div class="hidden md:block">
            <div class="ml-10 flex items-baseline space-x-4">
              <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
              {{-- <a href="#" class="bg-gray-900 text-white px-3 py-2 rounded-md text-sm font-medium" aria-current="page">Dashboard</a> --}}
              @foreach ($categories as $item)
                <a href="{{route('posts.category',$item)}}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">{{ ucfirst($item->name)}}</a>
              @endforeach
          </div>
          </div>
        </div>

        {{-- ProfilePhoto and Notifications --}}
        @auth
          <div class="hidden md:block">
            <div class="ml-4 flex items-center md:ml-6">
              <button type="button" class="bg-gray-800 p-1 rounded-full text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white">
                <span class="sr-only">View notifications</span>
                <!-- Heroicon name: outline/bell -->
                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                </svg>
              </button>

              <!-- Profile dropdown -->
              <div class="ml-3 relative" x-data="{open:false}">
                <div>
                  <button x-on:click="open = true" type="button" class="max-w-xs bg-gray-800 rounded-full flex items-center text-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                    <span class="sr-only">Open user menu</span>
                    <img class="h-8 w-8 rounded-full" src="data:image/jpeg;base64,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" alt="">
                  </button>
                </div>
                <div x-show="open" x-on:click.away="open = false" class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                  <!-- Active: "bg-gray-100", Not Active: "" -->
                  <a href="{{route('profile.show')}}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Tu Perfil</a>
                  
                  @can('admin.home')
                    <a href="{{route('admin.home')}}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Dashboard</a>
                  @endcan

                 <form method="POST" action="{{ route('logout') }}" x-data>
                    @csrf
                  <a href="{{ route('logout') }}" @click.prevent="$root.submit();" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-2">Cerrar Sesión</a>
                </form>
                </div>
              </div>
            </div>
          </div>
        @else
        <div>
          <a href="{{route('login')}}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">
            Log In
          </a>
          <a href="{{route('register')}}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">
            Sign Up
          </a>

        </div>
        @endauth
        <!-- Mobile menu button -->
        <div class="-mr-2 flex md:hidden">
          <button x-on:click="open = true" type="button" class="bg-gray-800 inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <!--
              Heroicon name: outline/bars-3

              Menu open: "hidden", Menu closed: "block"
            -->
            <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
            <!--
              Heroicon name: outline/x-mark

              Menu open: "block", Menu closed: "hidden"
            -->
            <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
      </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div class="md:hidden" id="mobile-menu" x-show="open" x-on:click.away="open = false">
      <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
       {{--  <a href="#" class="bg-gray-900 text-white block px-3 py-2 rounded-md text-base font-medium" aria-current="page">Dashboard</a> --}}
       @foreach ($categories as $item)
        <a href="{{route('posts.category',$item)}}" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">{{ucfirst($item->name)}}</a>
       @endforeach 
      </div>
      <div class="pt-4 pb-3 border-t border-gray-700">
        <div class="flex items-center px-5">
          <div class="flex-shrink-0">
            <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
          </div>
          <div class="ml-3">
            <div class="text-base font-medium leading-none text-white">Tom Cook</div>
            <div class="text-sm font-medium leading-none text-gray-400">tom@example.com</div>
          </div>
          <button type="button" class="ml-auto bg-gray-800 flex-shrink-0 p-1 rounded-full text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white">
            <span class="sr-only">View notifications</span>
            <!-- Heroicon name: outline/bell -->
            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
            </svg>
          </button>
        </div>
        <div class="mt-3 px-2 space-y-1">
          <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-gray-400 hover:text-white hover:bg-gray-700">Your Profile</a>

          <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-gray-400 hover:text-white hover:bg-gray-700">Settings</a>

          <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-gray-400 hover:text-white hover:bg-gray-700">Sign out</a>
        </div>
      </div>
    </div>
  </nav>