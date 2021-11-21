<aside class="flex-shrink-0 hidden w-64 bg-white border-r dark:border-primary-darker dark:bg-darker md:block">
  <div class="flex flex-col h-full">
    <!-- Sidebar links -->
    <nav aria-label="Main" class="flex-1 px-2 py-4 space-y-2 overflow-y-hidden hover:overflow-y-auto">

      <!-- Program -->
      <div>
        <!-- active & hover classes 'bg-primary-100 dark:bg-primary' -->
        <a href="{{ url('/dashboard') }}" class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary" role="button">
          <span>
            <i class="fas fa-paw"></i>
          </span>
          <span class="ml-2 text-sm"> Dashboard </span>
        </a>
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

      <!-- Authentication links -->
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

      <!-- Authentication links -->
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

      <!-- Authentication links -->
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

    </nav>

    <!-- Sidebar footer -->
    <div class="flex-shrink-0 px-2 py-4 space-y-2">
      <button
        @click="openSettingsPanel"
        type="button"
        class="flex items-center justify-center w-full px-4 py-2 text-sm text-white rounded-md bg-primary hover:bg-primary-dark focus:outline-none focus:ring focus:ring-primary-dark focus:ring-offset-1 focus:ring-offset-white dark:focus:ring-offset-dark"
      >
        <span aria-hidden="true">
          <svg
            class="w-4 h-4 mr-2"
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"
            />
          </svg>
        </span>
        <span>Customize</span>
      </button>
    </div>
  </div>
</aside>