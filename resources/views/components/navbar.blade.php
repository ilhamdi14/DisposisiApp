<nav class="bg-gray-800 dark:bg-gray-800/50">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="flex h-16 items-center justify-between">
        <div class="flex items-center">
          <div class="shrink-0">
            <img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company" class="size-8" />
          </div>
          <div class="hidden md:block">
            <div class="ml-10 flex items-baseline space-x-4">
              <!-- Current: "bg-gray-900 dark:bg-gray-950/50 text-white", Default: "text-gray-300 hover:bg-white/5 hover:text-white" -->
              {{-- Pimpinan --}}
              @if (auth()->user()->grade == 'Pimpinan')
                <x-navlink href="/kotakKeluarDispo" :active="request()->is('kotakKeluarDispo')">Kotak Masuk</x-navlink> 
                <x-navlink href="/kotakKeluarPim" :active="request()->is('kotakKeluarPim')">Kotak Keluar</x-navlink>
              @else
              
              <x-navlink href="/home" :active="request()->is('home')">Dashboard</x-navlink>
              
              <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="text-white bg-gray-850/50  hover:bg-white/5 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">Memo <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                  </svg>
                  </button>

                  <!-- Dropdown menu -->
                  <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-44 dark:bg-gray-700">
                      <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                        <li>
                          <a href="/buatMemo" :active="request()->is('buatMemo')" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Buat Memo</a>
                        </li>
                        <li>
                          <a href="/kotakMasuk" :active="request()->is('kotakMasuk')" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Kotak Masuk Memo</a>
                        </li>
                        <li>
                          <a href="/kotakKeluarDispo" :active="request()->is('kotakKeluarDispo')" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Kotak Masuk Disposisi</a>
                        </li>
                      </ul>
                  </div>
              
              <x-navlink href="/kotakKeluar" :active="request()->is('kotakKeluar')">Kotak Keluar</x-navlink>
              <x-navlink href="{{ route('tracking', 0) }}" :active="request()->is('tracking')">Tracking</x-navlink>
              <x-navlink href="/createUser" :active="request()->is('createUser')">Create User</x-navlink>
              <x-navlink href="/dataUser" :active="request()->is('dataUser')">Data User</x-navlink>
              
              @endif
            </div>
          </div>
        </div>
        <div class="hidden md:block">
          <div class="ml-4 flex items-center md:ml-6">
            

            <!-- Profile dropdown -->
            <el-dropdown class="relative ml-3">
              <button class="relative flex max-w-xs items-center rounded-full focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">
                <span class="absolute -inset-1.5"></span>
                <span class="sr-only">Open user menu</span>
                <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" class="size-8 rounded-full outline -outline-offset-1 outline-white/10" />
              </button>

              <el-menu anchor="bottom end" popover class="w-48 origin-top-right rounded-md bg-white py-1 shadow-lg outline-1 outline-black/5 transition transition-discrete [--anchor-gap:--spacing(2)] data-closed:scale-95 data-closed:transform data-closed:opacity-0 data-enter:duration-100 data-enter:ease-out data-leave:duration-75 data-leave:ease-in dark:bg-gray-800 dark:shadow-none dark:-outline-offset-1 dark:outline-white/10">
                <a href="#" class="block px-4 py-2 text-sm text-gray-700 focus:bg-gray-100 focus:outline-hidden dark:text-gray-300 dark:focus:bg-white/5">Welcome, {{ auth()->user()->name }}</a>
                
                <form action="/logout" method="POST">
                  @csrf
                  <button type="submit" class="block px-6 py-1 text-sm text-gray-700 focus:bg-gray-100 focus:outline-hidden dark:text-gray-300 dark:focus:bg-white/5">
                    Logout
                  </button>
                </form>
              </el-menu>
            </el-dropdown>
          </div>
        </div>
        <div class="-mr-2 flex md:hidden">
          <!-- Mobile menu button -->
          <button type="button" command="--toggle" commandfor="mobile-menu" class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-white/5 hover:text-white focus:outline-2 focus:outline-offset-2 focus:outline-indigo-500">
            <span class="absolute -inset-0.5"></span>
            <span class="sr-only">Open main menu</span>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" data-slot="icon" aria-hidden="true" class="size-6 in-aria-expanded:hidden">
              <path d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" data-slot="icon" aria-hidden="true" class="size-6 not-in-aria-expanded:hidden">
              <path d="M6 18 18 6M6 6l12 12" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
          </button>
        </div>
      </div>
    </div>

    <el-disclosure id="mobile-menu" hidden class="block md:hidden">
      <div class="space-y-1 px-2 pt-2 pb-3 sm:px-3">
        <!-- Current: "bg-gray-900 dark:bg-gray-950/50 text-white", Default: "text-gray-300 hover:bg-white/5 hover:text-white" -->
        <x-navlink-mobile href="home" :active="request()->is('home')">Dashboard</x-navlink-mobile>
        <x-navlink-mobile href="buatMemo" :active="request()->is('buatMemo')">Buat Memo</x-navlink-mobile>
        <x-navlink-mobile href="kotakMasuk" :active="request()->is('kotakMasuk')">Kotak Masuk</x-navlink-mobile>
        <x-navlink-mobile href="kotakKeluar" :active="request()->is('kotakKeluar')">Kotak Keluar</x-navlink-mobile>
        <x-navlink-mobile href="tracking" :active="request()->is('tracking')">Tracking</x-navlink-mobile>
        
        
      </div>
      <div class="border-t border-white/10 pt-4 pb-3">
        <div class="flex items-center px-5">
          <div class="shrink-0">
            <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" class="size-10 rounded-full outline -outline-offset-1 outline-white/10" />
          </div>
          <div class="ml-3">
            <div class="text-base/5 font-medium text-white">Tom Cook</div>
            <div class="text-sm font-medium text-gray-400">tom@example.com</div>
          </div>
          <button type="button" class="relative ml-auto shrink-0 rounded-full p-1 text-gray-400 hover:text-white focus:outline-2 focus:outline-offset-2 focus:outline-indigo-500">
            <span class="absolute -inset-1.5"></span>
            <span class="sr-only">View notifications</span>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" data-slot="icon" aria-hidden="true" class="size-6">
              <path d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
          </button>
        </div>
        <div class="mt-3 space-y-1 px-2">
          <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-white/5 hover:text-white">Your profile</a>
          <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-white/5 hover:text-white">Settings</a>
          <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-white/5 hover:text-white">Sign out</a>
        </div>
      </div>
    </el-disclosure>
  </nav>