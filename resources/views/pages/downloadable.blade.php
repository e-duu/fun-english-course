@extends('layouts.watch')
@section('title')
  Fun English Course | Watch Page
@endsection
@section('content')

  <div class="flex-col mx-auto px-8 sm:px-32">
    <div class="flex justify-between items-center mt-20 mb-7">
      <div class="flex-col">
        <h1 class="font-bold text-md sm:text-2xl text-gray-800">{{ $downloadable->lesson->name }}</h1>
        <p class="text-gray-800 mt-1 sm:mt-2 text-xs sm:text-lg">{{ $downloadable->title }}</p>
      </div>
      @if ($next)
        <a href="{{ $next }}" class="bg-blue-600 hover:shadow-lg transition-shadow duration-200 text-white rounded-md px-3 sm:px-6 py-2 sm:py-2 text-xs sm:text-lg">Next Material</a>
      @endif
    </div>
    
    <div class="flex-col bg-white mt-5 px-3 sm:px-6 py-3 sm:py-6 rounded-md shadow-md">
      <div class="prose mb-10">
        {!! $downloadable->description !!}
      </div>
      <a class="bg-blue-600 hover:shadow-lg transition-shadow duration-200 text-white rounded-md px-3 sm:px-6 py-2 sm:py-2 text-xs sm:text-lg" href="{{ asset('/downloadables/' . $downloadable->file) }}">Download</a>
    </div>
  </div>
@endsection