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
        @if (auth()->user()->role === 'admin')
        @if ($program->levels->count() != null)
        <div class="px-6 my-8">
          <div class="shadow-lg">
            <h2 class="bg-[rgb(1,131,215)] pl-4 py-3 text-white text-2xl rounded-t-sm font-bold">{{ $program->name }}</h2>
          </div>
        </div>
        @endif
        @else
        @if ($program->levels->count() != null && $program->levels()->whereHas('accounts', fn ($q) => $q->where('accounts.id', auth()->user()->id))->count() != null)
              <div class="px-6 my-8">
                <div class="shadow-lg">
                  <h2 class="bg-[rgb(1,131,215)] pl-4 py-3 text-white text-2xl rounded-t-sm font-bold">{{ $program->name }}</h2>
                </div>
              </div>
            @endif
          @endif
          @endforeach
        </aside>

        <section class="col-span-12 sm:col-span-8">
        {{-- Notification --}}
        @if (auth()->user()->role === 'student')
          @isset($spp)
            @if ($spp->status == 'unpaid')
              <div class="flex justify-between w-full py-4 px-5 bg-yellow-200 dark:bg-yellow-500 overflow-hidden rounded-sm shadow-xs items-center shadow-lg mb-5 sm:mb-7">
                <div class="flex items-center tex-xs sm:text-lg">
                  <i class="fas fa-bell text-lg sm:text-xl mr-3"></i>
                  <p>Reminder for your payment bill, please pay immediately. Thank You!</p>
                </div>
                <a href="{{ route('payment') }}" class="font-bold text-center text-green-500  dark:text-green-500 mr-5"><i class="fas fa-money-check"></i> PAY</a>
              </div>
            @endif
          @endisset
        @endif
        <header>
          <h1 class="bg-[rgb(1,131,215)] text-white text-center py-4 sm:py-5 text-xl sm:text-5xl rounded-t-sm font-bold shadow-lg">LEARNING RESOURCES</h1>
        </header>
        <main>
          @foreach ($programs as $program)
            @if (auth()->user()->role === 'admin')
              @if ($program->levels->count() != null)
                <div class="mt-5 sm:mt-10">
                  <div class="shadow-lg">
                    <h2 class="bg-[rgb(1,131,215)] pl-2 sm:pl-4 py-2 sm:py-3 text-white text-lg sm:text-2xl rounded-t-sm font-bold">{{ $program->name }}</h2>
                    <div class="bg-blue-100 py-2 sm:py-3 flex-col rounded-b-sm">
                      @if (auth()->user()->role === 'admin')
                        @foreach ($program->levels()->get() as $programLevel)
                          <a href="{{ route('resource.detail', $programLevel->slug) }}">
                            <li class="pl-4 sm:pl-14 py-1 sm:py-3 text-sm sm:text-xl my-1 items-center hover:text-white hover:bg-blue-400 transition-colors duration-100">
                              {{ $programLevel->name }}
                            </li>
                          </a>
                        @endforeach
                      @else
                        @foreach ($program->levels()->whereHas('users', fn ($q) => $q->where('users.id', auth()->user()->id))->get() as $programLevel)
                          <a href="{{ route('resource.detail', $programLevel->slug) }}">
                            <li class="pl-4 sm:pl-14 py-1 sm:py-3 text-sm sm:text-xl my-1 items-center hover:text-white hover:bg-blue-400 transition-colors duration-100">
                              {{ $programLevel->name }}
                            </li>
                          </a>
                        @endforeach
                      @endif
                    </div>
                  </div>
                </div>
              @endif
            @else
              @if ($program->levels->count() != null && $program->levels()->whereHas('accounts', fn ($q) => $q->where('accounts.id', auth()->user()->id))->count() != null)
                <div class="mt-5 sm:mt-10">
                  <div class="shadow-lg">
                    <h2 class="bg-[rgb(1,131,215)] pl-2 sm:pl-4 py-2 sm:py-3 text-white text-lg sm:text-2xl rounded-t-sm font-bold">{{ $program->name }}</h2>
                    <div class="bg-blue-100 py-2 sm:py-3 flex-col rounded-b-sm
                    ">
                      @if (auth()->user()->role === 'admin')
                        @foreach ($program->levels()->get() as $programLevel)
                          <a href="{{ route('resource.detail', $programLevel->slug) }}">
                            <li class="pl-4 sm:pl-14 py-1 sm:py-3 text-sm sm:text-xl my-1 items-center hover:text-white hover:bg-blue-400 transition-colors duration-100">
                              {{ $programLevel->name }}
                            </li>
                          </a>
                        @endforeach
                      @else
                        @foreach ($program->levels()->whereHas('users', fn ($q) => $q->where('users.id', auth()->user()->id))->get() as $programLevel)
                          <a href="{{ route('resource.detail', $programLevel->slug) }}">
                            <li class="pl-4 sm:pl-14 py-1 sm:py-3 text-sm sm:text-xl my-1 items-center hover:text-white hover:bg-blue-400 transition-colors duration-100">
                              {{ $programLevel->name }}
                            </li>
                          </a>
                        @endforeach
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
