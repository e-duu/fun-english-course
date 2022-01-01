<nav x-data="{ open: false }" class="fixed sm:hidden z-50">
  <button class="text-gray-500 w-10 h-10 relative focus:outline-none bg-white rounded" @click="open = !open" onclick="toggleSidebar()">
      <span class="sr-only">Open main menu</span>
      <div class="block w-5 absolute left-1/2 top-1/2   transform  -translate-x-1/2 -translate-y-1/2">
          <span aria-hidden="true" class="block absolute h-0.5 w-5 bg-current transform transition duration-500 ease-in-out" :class="{'rotate-45': open,' -translate-y-1.5': !open }"></span>
          <span aria-hidden="true" class="block absolute  h-0.5 w-5 bg-current   transform transition duration-500 ease-in-out" :class="{'opacity-0': open } "></span>
          <span aria-hidden="true" class="block absolute  h-0.5 w-5 bg-current transform  transition duration-500 ease-in-out" :class="{'-rotate-45': open, ' translate-y-1.5': !open}"></span>
      </div>
  </button>
</nav>

<div class="flex-col p-10 bg-white h-screen sm:h-[800px] overflow-y-auto hidden fixed sm:static sm:block z-40 sm:z-0" id="sidebar">
  <a href="{{ route('resource') }}" class="text-gray-800 hover:text-blue-600 transition-colors duration-200 font-bold text-sm sm:text-xl"><i class="fas fa-arrow-left text-lg mb-8 sm:mb-20"></i> &nbsp; Back to Home</a>
  <div class="flex-col my-12">
    @foreach ($lessons as $lesson)
      @if ($lesson->exercises->count() || $lesson->materials->count() != null || $lesson->downloadables->count() != null)
        <h1 class="text-sm sm:text-lg text-gray-800 font-semibold 2xl:text-xl mt-5">{{ $lesson->name }}</h1> 
        @foreach ($lesson->materials as $material)
          @unless (auth()->user()->role === 'student' && !$material->is_accessible_by_student)
            <a href="{{ route('watch', $material->id) }}" class="text-xs sm:text-base flex justify-between items-center space-x-2 py-2 sm:py-4 px-3 hover:bg-blue-600 hover:text-white transition-all duration-200 rounded-md mt-3 {{ (request()->is('watch/' . $material->id )) ? 'bg-blue-600 text-white' : 'bg-blue-100 text-blue-800' }}">
              <p>{{ $material->title }}</p>
            </a>
          @endunless
        @endforeach
        @foreach ($lesson->exercises as $exercise)
          <a href="{{ route('exercise', $exercise->id) }}" class="text-xs sm:text-base flex justify-between items-center space-x-2 py-2 sm:py-4 px-3 hover:bg-blue-600 hover:text-white transition-all duration-200 rounded-md mt-3 {{ (request()->is('exercise/' . $exercise->id )) ? 'bg-blue-600 text-white' : 'bg-blue-100 text-blue-800' }}">
            <p>{{ $exercise->title }}</p>
          </a>
        @endforeach
        @foreach ($lesson->downloadables as $downloadable)
          <a href="{{ route('downloadable', $downloadable->id) }}" class="text-xs sm:text-base flex justify-between items-center space-x-2 py-2 sm:py-4 px-3 hover:bg-blue-600 hover:text-white transition-all duration-200 rounded-md mt-3 {{ (request()->is('downloadable/' . $downloadable->id )) ? 'bg-blue-600 text-white' : 'bg-blue-100 text-blue-800' }}">
            <p>{{ $downloadable->title }}</p>
          </a>
        @endforeach
      @endif
    @endforeach
  </div>
</div>

@push('after-script')
  <script>
    function toggleSidebar () {
      document.querySelector('#sidebar').classList.toggle('hidden')
    }
  </script>
@endpush