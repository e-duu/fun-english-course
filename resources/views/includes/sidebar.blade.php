<div class="flex-col p-10 bg-white h-[665px] 2xl:h-[835px] overflow-y-auto">
  <a href="{{ url('/') }}" class="text-gray-800 hover:text-blue-600 transition-colors duration-200 font-bold text-xl"><i class="fas fa-arrow-left text-lg mb-20"></i> &nbsp; Back to Home</a>
  <div class="flex-col my-12">
    @foreach ($lessons as $lesson)
      @if ($lesson->materials->count() != NULL)
        <h1 class="text-lg text-gray-800 font-semibold 2xl:text-xl">{{ $lesson->name }}</h1> 
        @foreach ($lesson->materials as $material)
          <a href="{{ route('watch', $material->id) }}" class="flex justify-between items-center space-x-2 py-4 px-3 hover:bg-blue-600 hover:text-white transition-all duration-200 rounded-md mt-3 {{ (request()->is('watch/' . $material->id )) ? 'bg-blue-600 text-white' : 'bg-blue-100 text-blue-800' }}">
            <p>{{ $material->title }}</p>
          </a>
        @endforeach
      @endif
    @endforeach
      
      
  </div>
</div>