<div class="sticky top-0 z-10 flex-shrink-0 flex h-16 bg-white shadow">
    <button type="button" class="px-4 border-r border-gray-200 text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500 md:hidden">
        <span class="sr-only">Open sidebar</span>
        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
        </svg>
    </button>
    <div class="flex-1 px-4 flex justify-between">
      <div class="flex-1 flex items-center text-xl font-bold">
        <h2>Welcome Admin!</h2>
      </div>
      <div class="ml-4 flex items-center md:ml-6">
        <!-- Profile dropdown -->
        <div x-data="{ isMenuOpen: false }" class="ml-3 relative">
            <div>
                <button @click="isMenuOpen=!isMenuOpen" type="button" class="w-10 h-10 p-1 border bg-white flex items-center text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                    <span class="sr-only">Open user menu</span>
                    <img class=" w-9 aspect-square" src="{{ asset('/img/admin-logo.png') }}" alt="">
                </button>
            </div>
            <div x-show="isMenuOpen" class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Your Profile</a>

                <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-1">Settings</a>
                <form action="{{ route('logout') }}" method="POST">
                  @csrf
                  @method('delete')
                  <button type="submit" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-2">Sign out</button>
                </form>
            </div>
        </div>
      </div>
    </div>
  </div>