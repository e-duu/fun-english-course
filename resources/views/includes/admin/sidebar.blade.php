<aside class="flex-shrink-0 hidden w-64 bg-white border-r dark:border-primary-darker dark:bg-darker md:block">
  <div class="flex flex-col h-full">
    <!-- Sidebar links -->
    <nav aria-label="Main" class="flex-1 px-2 py-4 space-y-2 overflow-y-hidden hover:overflow-y-auto">

      {{-- @if (Auth::user()->role == 'student')
        <!-- Dashboard -->
        <div>
          <!-- active & hover classes 'bg-primary-100 dark:bg-primary' -->
          <a href="{{ route('dashboard.user') }}" class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary" role="button">
            <span>
              <i class="fas fa-paw"></i>
            </span>
            <span class="ml-2 text-sm"> Dashboard </span>
          </a>
        </div>
      @else --}}
        <!-- Dashboard -->
        <div>
          <!-- active & hover classes 'bg-primary-100 dark:bg-primary' -->
          <a href="{{ route('dashboard') }}" class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary" role="button">
            <span>
              <i class="fas fa-paw"></i>
            </span>
            <span class="ml-2 text-sm"> Dashboard </span>
          </a>
        </div>

        <!-- Spp Payment -->
        <div x-data="{ isActive: false, open: false}">
          <!-- active & hover classes 'bg-primary-100 dark:bg-primary' -->
          <a
            href="#"
            @click="$event.preventDefault(); open = !open"
            class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary"
            :class="{'bg-primary-100 dark:bg-primary': isActive || open}"
            role="button"
            aria-haspopup="true"
            :aria-expanded="(open || isActive) ? 'true' : 'false'"
          >
            <span aria-hidden="true">
              <i class="fas fa-comments-dollar"></i>
            </span>
            <span class="ml-2 text-sm"> Student Spps </span>
            <span aria-hidden="true" class="ml-auto">
              <!-- active class 'rotate-180' -->
              <svg
                class="w-4 h-4 transition-transform transform"
                :class="{ 'rotate-180': open }"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
              >
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </span>
          </a>
          <div x-show="open" class="mt-2 space-y-2 px-7" role="menu" aria-label="Authentication">
            <!-- active & hover classes 'text-gray-700 dark:text-light' -->
            <!-- inActive classes 'text-gray-400 dark:text-gray-400' -->
            <a
              href="{{ route('spp.all') }}"
              role="menuitem"
              class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700"
            >
              List Student Spp
            </a>
            <a
              href="{{ route('spp.create') }}"
              role="menuitem"
              class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700"
            >
              Add Student Spp
            </a>
          </div>
        </div>

        <!-- Program -->
        <div x-data="{ isActive: false, open: false}">
          <!-- active & hover classes 'bg-primary-100 dark:bg-primary' -->
          <a
            href="#"
            @click="$event.preventDefault(); open = !open"
            class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary"
            :class="{'bg-primary-100 dark:bg-primary': isActive || open}"
            role="button"
            aria-haspopup="true"
            :aria-expanded="(open || isActive) ? 'true' : 'false'"
          >
            <span aria-hidden="true">
              <i class="fas fa-desktop"></i>
            </span>
            <span class="ml-2 text-sm"> Programs </span>
            <span aria-hidden="true" class="ml-auto">
              <!-- active class 'rotate-180' -->
              <svg
                class="w-4 h-4 transition-transform transform"
                :class="{ 'rotate-180': open }"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
              >
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </span>
          </a>
          <div x-show="open" class="mt-2 space-y-2 px-7" role="menu" aria-label="Authentication">
            <!-- active & hover classes 'text-gray-700 dark:text-light' -->
            <!-- inActive classes 'text-gray-400 dark:text-gray-400' -->
            <a
              href="{{ route('program.all') }}"
              role="menuitem"
              class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700"
            >
              List Program
            </a>
            <a
              href="{{ route('program.create') }}"
              role="menuitem"
              class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700"
            >
              Create Program
            </a>
          </div>
        </div>

        <!-- Payment -->
        <div x-data="{ isActive: false, open: false}">
          <!-- active & hover classes 'bg-primary-100 dark:bg-primary' -->
          <a
            href="#"
            @click="$event.preventDefault(); open = !open"
            class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary"
            :class="{'bg-primary-100 dark:bg-primary': isActive || open}"
            role="button"
            aria-haspopup="true"
            :aria-expanded="(open || isActive) ? 'true' : 'false'"
          >
            <span aria-hidden="true">
              <i class="fas fa-credit-card"></i>
            </span>
            <span class="ml-2 text-sm"> Payments </span>
            <span aria-hidden="true" class="ml-auto">
              <!-- active class 'rotate-180' -->
              <svg
                class="w-4 h-4 transition-transform transform"
                :class="{ 'rotate-180': open }"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
              >
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </span>
          </a>
          <div x-show="open" class="mt-2 space-y-2 px-7" role="menu" aria-label="Authentication">
            <!-- active & hover classes 'text-gray-700 dark:text-light' -->
            <!-- inActive classes 'text-gray-400 dark:text-gray-400' -->
            <a
              href="{{ route('payment.all') }}"
              role="menuitem"
              class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700"
            >
              List Payment
            </a>
            <a
              href="{{ route('payment.create') }}"
              role="menuitem"
              class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700"
            >
              Create Payment
            </a>
          </div>
        </div>

        <!-- Recipient -->
        <div x-data="{ isActive: false, open: false}">
          <!-- active & hover classes 'bg-primary-100 dark:bg-primary' -->
          <a
            href="#"
            @click="$event.preventDefault(); open = !open"
            class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary"
            :class="{'bg-primary-100 dark:bg-primary': isActive || open}"
            role="button"
            aria-haspopup="true"
            :aria-expanded="(open || isActive) ? 'true' : 'false'"
          >
            <span aria-hidden="true">
              <i class="fas fa-university text-lg"></i>
            </span>
            <span class="ml-2 text-sm"> Recipients </span>
            <span aria-hidden="true" class="ml-auto">
              <!-- active class 'rotate-180' -->
              <svg
                class="w-4 h-4 transition-transform transform"
                :class="{ 'rotate-180': open }"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
              >
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </span>
          </a>
          <div x-show="open" class="mt-2 space-y-2 px-7" role="menu" aria-label="Authentication">
            <!-- active & hover classes 'text-gray-700 dark:text-light' -->
            <!-- inActive classes 'text-gray-400 dark:text-gray-400' -->
            <a
              href="{{ route('recipient.all') }}"
              role="menuitem"
              class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700"
            >
              List Recipient
            </a>
            <a
              href="{{ route('recipient.create') }}"
              role="menuitem"
              class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700"
            >
              Create Recipient
            </a>
          </div>
        </div>

        <!-- User -->
        <div x-data="{ isActive: false, open: false}">
          <!-- active & hover classes 'bg-primary-100 dark:bg-primary' -->
          <a
            href="#"
            @click="$event.preventDefault(); open = !open"
            class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary"
            :class="{'bg-primary-100 dark:bg-primary': isActive || open}"
            role="button"
            aria-haspopup="true"
            :aria-expanded="(open || isActive) ? 'true' : 'false'"
          >
            <span aria-hidden="true">
              <svg
                class="w-5 h-5"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                />
              </svg>
            </span>
            <span class="ml-2 text-sm"> Users </span>
            <span aria-hidden="true" class="ml-auto">
              <!-- active class 'rotate-180' -->
              <svg
                class="w-4 h-4 transition-transform transform"
                :class="{ 'rotate-180': open }"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
              >
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </span>
          </a>
          <div x-show="open" class="mt-2 space-y-2 px-7" role="menu" aria-label="Authentication">
            <!-- active & hover classes 'text-gray-700 dark:text-light' -->
            <!-- inActive classes 'text-gray-400 dark:text-gray-400' -->
            <a
              href="{{ route('user.all') }}"
              role="menuitem"
              class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700"
            >
              List User
            </a>
            <a
              href="{{ route('user.create') }}"
              role="menuitem"
              class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700"
            >
              Create User
            </a>
          </div>
        </div>

        <!-- Multiple Enroll -->
        <div>
          <!-- active & hover classes 'bg-primary-100 dark:bg-primary' -->
          <a href="{{ route('manyEnroll') }}" class="flex items-center py-2 px-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary" role="button">
            <span>
              <i class="fas fa-cart-plus"></i>
            </span>
            <span class="ml-2 text-sm"> Multiple Enrolls </span>
          </a>
        </div>

        <!-- Exercise Results -->
        <div>
          <!-- active & hover classes 'bg-primary-100 dark:bg-primary' -->
          <a href="{{ route('score.all') }}" class="flex items-center py-2 px-3 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary" role="button">
            <span>
              <i class="fas fa-list-alt"></i>
            </span>
            <span class="ml-2 text-sm"> Exercise Results </span>
          </a>
        </div>

        <!-- Moota Setting -->
        {{-- <div>
          <!-- active & hover classes 'bg-primary-100 dark:bg-primary' -->
          <a href="{{ route('moota') }}" class="flex items-center py-2 px-3 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary" role="button">
            <span>
              <i class="fas fa-cog"></i>
            </span>
            <span class="ml-2 text-sm"> Setting Moota </span>
          </a>
        </div> --}}
      {{-- @endif --}}
    </nav>
  </div>
</aside>