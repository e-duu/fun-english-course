@extends('layouts.app')
@section('title')
    Fun English Course - Learning Resources
@endsection
@section('content')
  <div class="container-fluid px-4 sm:px-20 mt-10 sm:mt-16">
    <div class="grid grid-cols-12 sm:gap-14 items-start">
      <aside class="col-span-0 sm:col-span-4 h-full bg-blue-200 flex-col py-8 rounded-sm hidden sm:block">
        <div class="px-14">
          <img src="{{ asset('/users/' . Auth::user()->photo) }}" class="w-60 mx-auto rounded-md shadow-md" alt="user profile photo">
          <h3 class="text-center py-3 text-black font-bold text-2xl mt-5 bg-blue-100 rounded-sm shadow-lg">{{ auth()->check() ? auth()->user()->name : 'Please login first' }}</h3>
        </div>
        <h2 class="bg-[rgb(244,182,1)] mt-14 mb-10 pl-6 py-3 text-2xl font-bold">LEARNING RESOURCES</h2>
        @foreach ($programs as $program)
          @if ($program->levels->count() != NULL)
            <div class="px-6 my-8">
              <div class="shadow-lg">
                <h2 class="bg-[rgb(1,131,215)] pl-4 py-3 text-white text-2xl rounded-t-sm font-bold">{{ $program->name }}</h2>
                <div class="bg-blue-100 py-3 rounded-b-sm">
                  @if (auth()->user()->role === 'admin_head' || auth()->user()->role === 'admin_staff')
                    @foreach ($program->levels()->get() as $programLevel)
                      <a href="{{ route('resource.detail', $programLevel->slug) }}">
                        <li class="pl-4 py-3 text-xl my-1 items-center hover:text-white hover:bg-blue-400 transition-colors duration-100">
                          {{ $programLevel->name }}
                        </li>
                      </a>
                    @endforeach
                  @else
                    @foreach ($program->levels()->whereHas('users', fn ($q) => $q->where('users.id', auth()->user()->id))->get() as $programLevel)
                      <a href="{{ route('resource.detail', $programLevel->slug) }}">
                        <li class="pl-4 py-3 text-xl my-1 items-center hover:text-white hover:bg-blue-400 transition-colors duration-100">
                        {{ $programLevel->name }}
                        </li>
                      </a>
                    @endforeach
                  @endif
                </div>
              </div>
            </div>
          @endif
        @endforeach
      </aside>

      <section class="col-span-12 sm:col-span-8">
        <header>
          <h1 class="bg-[rgb(1,131,215)] text-white text-center py-4 sm:py-5 text-xl sm:text-5xl rounded-t-sm font-bold shadow-lg">LEARNING RESOURCES</h1>
          <div class="flex-col bg-[rgb(244,182,1)] p-3 sm:p-5 mt-5 sm:mt-10 shadow-lg">
            <h3 class="text-[rgb(1,131,215)] font-bold sm:text-xl uppercase"> Program : {{ $level->program->name }}</h3>
            <h3 class="text-[rgb(1,131,215)] mt-3 sm:mt-5 font-bold sm:text-xl uppercase"> Level : {{ $level->name }}</h3>
          </div>
        </header>
        <main>
          @foreach ($lessons as $lesson)
            @if (auth()->user()->role === 'admin_head' || auth()->user()->role === 'admin_staff')
              @if ($lesson->exercises->count() || $lesson->materials->count() != null || $lesson->downloadables->count() != null)
                <div class="mt-5 sm:mt-10">
                  <div class="shadow-lg">
                    <h2 class="bg-[rgb(1,131,215)] pl-2 sm:pl-4 py-2 sm:py-3 text-white text-lg sm:text-2xl rounded-t-sm font-bold">{{ $lesson->name }}</h2>
                    <div class="bg-blue-100 py-2 sm:py-3 flex-col rounded-b-sm">
                      @foreach ($lesson->materials as $material)
                        @unless (auth()->user()->role === 'student' && !$material->is_accessible_by_student)
                          <a href="{{ route('watch', $material->id) }}" class="flex items-center space-x-3 sm:space-x-5 py-2 sm:py-3 text-[rgb(1,131,215)] hover:text-white hover:bg-blue-400 transition-colors duration-150 px-4 sm:px-20">
                            <img src="{{ asset('/materials/' . $material->photo) }}" class="rounded-full w-10 sm:w-16 shadow-md" alt="lesson thumbnail / photo">
                            <h3 class="text-sm sm:text-2xl font-bold">{{ $material->title }}</h3>
                          </a>
                        @endunless
                      @endforeach
                      @foreach ($lesson->exercises as $exercise)
                        <a href="{{ route('exercise', $exercise->id) }}" class="flex items-center space-x-3 sm:space-x-5 py-2 sm:py-3 text-[rgb(1,131,215)] hover:text-white hover:bg-blue-400 transition-colors duration-150 px-4 sm:px-20">
                          <img src="{{ asset('/exercises/' . $exercise->photo) }}" class="rounded-full w-10 sm:w-16 shadow-md" alt="lesson thumbnail / photo">
                          <h3 class="text-sm sm:text-2xl font-bold">{{ $exercise->title }}</h3>
                        </a>
                      @endforeach
                      @foreach ($lesson->downloadables as $downloadable)
                        <a href="{{ route('downloadable', $downloadable->id) }}" class="flex items-center space-x-3 sm:space-x-5 py-2 sm:py-3 text-[rgb(1,131,215)] hover:text-white hover:bg-blue-400 transition-colors duration-150 px-4 sm:px-20">
                          <img src="{{ asset('/downloadables/' . $downloadable->photo) }}" class="rounded-full w-10 sm:w-16 shadow-md" alt="lesson thumbnail / photo">
                          <h3 class="text-sm sm:text-2xl font-bold">{{ $downloadable->title }}</h3>
                        </a>
                      @endforeach
                    </div>
                  </div>
                </div>
              @endif
            @else
              @if ($lesson->exercises->count() || $lesson->materials->count() != null || $lesson->downloadables->count() != null)
                <div class="mt-5 sm:mt-10">
                  <div class="shadow-lg">
                    <h2 class="bg-[rgb(1,131,215)] pl-2 sm:pl-4 py-2 sm:py-3 text-white text-lg sm:text-2xl rounded-t-sm font-bold">{{ $lesson->name }}</h2>
                    <div class="bg-blue-100 py-2 sm:py-3 flex-col rounded-b-sm">
                      @foreach ($lesson->materials as $material)
                        @unless (auth()->user()->role === 'student' && !$material->is_accessible_by_student)
                          <a href="{{ route('watch', $material->id) }}" class="flex items-center space-x-3 sm:space-x-5 py-2 sm:py-3 text-[rgb(1,131,215)] hover:text-white hover:bg-blue-400 transition-colors duration-150 px-4 sm:px-20">
                            <img src="{{ asset('/materials/' . $material->photo) }}" class="rounded-full w-10 sm:w-16 shadow-md" alt="lesson thumbnail / photo">
                            <h3 class="text-sm sm:text-2xl font-bold">{{ $material->title }}</h3>
                          </a>
                        @endunless
                      @endforeach
                      @foreach ($lesson->exercises as $exercise)
                        <a href="{{ route('exercise', $exercise->id) }}" class="flex items-center space-x-3 sm:space-x-5 py-2 sm:py-3 text-[rgb(1,131,215)] hover:text-white hover:bg-blue-400 transition-colors duration-150 px-4 sm:px-20">
                          <img src="{{ asset('/exercises/' . $exercise->photo) }}" class="rounded-full w-10 sm:w-16 shadow-md" alt="lesson thumbnail / photo">
                          <h3 class="text-sm sm:text-2xl font-bold">{{ $exercise->title }}</h3>
                        </a>
                      @endforeach
                      @if ($lesson->downloadables()->count() != null)
                        @foreach ($lesson->downloadables as $download)
                        @endforeach
                        @if (auth()->user()->role == 'teacher' && $download->accessible_by == 'teacher' || auth()->user()->role == 'student' && $download->accessible_by == 'student' || $download->accessible_by == 'all')
                          @foreach ($lesson->downloadables as $downloadable)
                            <a href="{{ route('downloadable', $downloadable->id) }}" class="flex items-center space-x-3 sm:space-x-5 py-2 sm:py-3 text-[rgb(1,131,215)] hover:text-white hover:bg-blue-400 transition-colors duration-150 px-4 sm:px-20">
                              <img src="{{ asset('/downloadables/' . $downloadable->photo) }}" class="rounded-full w-10 sm:w-16 shadow-md" alt="lesson thumbnail / photo">
                              <h3 class="text-sm sm:text-2xl font-bold">{{ $downloadable->title }}</h3>
                            </a>
                          @endforeach
                        @endif
                      @endif
                    </div>
                  </div>
                </div>
              @endif
            @endif
          @endforeach
        </main>
      </section>
    </div>
  </div>
@endsection