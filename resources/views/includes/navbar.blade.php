<header class="bg-[#fff563]">
  <div class="container-fluid px-4 sm:px-20">
    <div class="flex justify-between items-center py-5">
      <a href="https://funenglishcourse.com/" target="_blank">
        <img src="{{ asset('/images/logo.png') }}" class="w-40 sm:w-80" alt="fun english course logo">
      </a>
      <img src="{{ asset('/images/edge-logo.png') }}" class="w-14 sm:w-28" alt="edge logo">
    </div>
  </div>
  <nav class="flex justify-between relative sm:justify-end bg-[rgb(244,182,1)] py-3 sm:py-7">
    <ul class="flex space-x-3 sm:space-x-20 sm:mr-32 items-center px-6 sm:px-20">
      <li class="font-bold text-white text-xs sm:text-xl"><a href="https://funenglishcourse.com/" target="_blank">HOME</a></li>
      <li class="font-bold text-white text-xs sm:text-xl"><a href="{{ route('resource') }}">LEARNING RESOURCES</a></li>
      <li class="font-bold text-white text-xs sm:text-xl"><a href="{{ url('payment') }}">PAYMENT</a></li>
      <li class="absolute right-4 top-1 sm:top-5 sm:right-20">
        <div x-data="{ dropdownOpen: false }" class="relative">
          <button @click="dropdownOpen = !dropdownOpen" class="relative z-10 ml-8 sm:ml-0">
            <img src="{{ asset('/users/' . Auth::user()->photo) }}" alt="user profile photo" class="w-8 sm:w-12 rounded-full">
          </button>
      
          <div x-show="dropdownOpen" @click="dropdownOpen = false" class="fixed inset-0 h-full w-full z-10"></div>
      
          <div x-show="dropdownOpen" class="absolute right-0 w-32 sm:w-48 bg-white rounded-md overflow-hidden shadow-xl z-20">
            <div class="flex items-center space-x-2 px-2 sm:px-4 py-2 text-xs sm:text-lg text-gray-800 border-b cursor-default">
              <i class="fas fa-user-circle mr-2"></i>
              Hello!, {{ Auth::user()->name }}
            </div>
            @if (Auth::user()->role == 'admin')
              <a href="{{ route('dashboard') }}" class="flex items-center space-x-2 px-2 sm:px-4 py-2 text-xs sm:text-lg text-gray-800 border-b hover:text-blue-700 hover:bg-blue-100 transition-colors duration-150">
                <i class="fas fa-paw mr-2"></i>
                Dashboard
              </a>
            @endif
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="block px-2 sm:px-4 py-2 text-xs sm:text-lg text-gray-800 border-b hover:text-[red] hover:bg-blue-100 transition-colors duration-150">
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
                </form>
              <i class="fas fa-sign-out-alt"></i>
              &nbsp;
              Logout
            </a>
          </div>
        </div>
      </li>
    </ul>
  </nav>
  <div class="py-1 sm:py-2 bg-blue-600"></div>
</header>