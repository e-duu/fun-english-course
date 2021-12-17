<div class="flex-col p-10 bg-white h-screen sm:h-[665px] 2xl:h-[835px] overflow-y-auto hidden sm:block">
  <a href="{{ route('resource') }}" class="text-gray-800 hover:text-blue-600 transition-colors duration-200 font-bold text-xl"><i class="fas fa-arrow-left text-lg mb-20"></i> &nbsp; Back to Home</a>
  <div class="flex-col my-12">
    @foreach ($lessons as $lesson)
      @if ($lesson->exercises->count() || $lesson->materials->count() != null)
        <h1 class="text-lg text-gray-800 font-semibold 2xl:text-xl mt-5">{{ $lesson->name }}</h1> 
        @foreach ($lesson->materials as $material)
          @unless (auth()->user()->role === 'student' && !$material->is_accessible_by_student)
            <a href="{{ route('watch', $material->id) }}" class="flex justify-between items-center space-x-2 py-4 px-3 hover:bg-blue-600 hover:text-white transition-all duration-200 rounded-md mt-3 {{ (request()->is('watch/' . $material->id )) ? 'bg-blue-600 text-white' : 'bg-blue-100 text-blue-800' }}">
              <p>{{ $material->title }}</p>
            </a>
          @endunless
        @endforeach
        @foreach ($lesson->exercises as $exercise)
          <a href="{{ route('exercise', $exercise->id) }}" class="flex justify-between items-center space-x-2 py-4 px-3 hover:bg-blue-600 hover:text-white transition-all duration-200 rounded-md mt-3 {{ (request()->is('exercise/' . $exercise->id )) ? 'bg-blue-600 text-white' : 'bg-blue-100 text-blue-800' }}">
            <p>{{ $exercise->title }}</p>
          </a>
        @endforeach
      @endif
    @endforeach
  </div>
</div>
  