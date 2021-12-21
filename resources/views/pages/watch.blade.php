@extends('layouts.watch')
@section('title')
  Fun English Course | Watch Page
@endsection
@section('content')
  <div class="flex-col mx-auto px-8 sm:px-32">
    <div class="flex justify-between items-center mt-8 sm:mt-20 mb-4 sm:mb-7">
      <div class="flex-col">
        <h1 class="font-bold text-md sm:text-2xl text-gray-800">{{ $material->lesson->name }}</h1>
        <p class="text-gray-800 mt-1 sm:mt-2 text-xs sm:text-lg">{{ $material->title }}</p>
      </div>
      @if ($next)
        <a href="{{ $next }}" class="bg-blue-600 hover:shadow-lg transition-shadow duration-200 text-white rounded-md px-3 sm:px-6 py-2 sm:py-2 text-xs sm:text-lg">Next Material</a>
      @endif
    </div>
    @if ($material->description)
      <div class="bg-white mt-5 px-3 sm:px-6 py-3 sm:py-6 mb-5 rounded-md shadow-md prose sm:max-w-full">
        {!! $material->description !!}
      </div>
    @endif
    @if ($material->content)
      <iframe class="mt-4 sm:mt-7 mb-10 w-full h-[215px] sm:h-[460px] 2xl:h-[620px] rounded-md" src="{{ $material->content }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    @endif
  </div>
@endsection