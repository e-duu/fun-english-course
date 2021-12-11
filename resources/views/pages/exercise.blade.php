@extends('layouts.watch')
@section('title')
  Fun English Course | Watch Page
@endsection
@section('content')

  @php
      $incerement = 1;
  @endphp
  
  <div class="flex-col mx-auto px-32">
    <div class="flex justify-between items-center mt-20 mb-7">
      <div class="flex-col">
        <h1 class="font-bold text-2xl text-gray-800">{{ $exercise->lesson->name }}</h1>
        <p class="text-gray-800 mt-2">{{ $exercise->title }}</p>
      </div>
      @if ($next)
        <a href="{{ $next }}" class="bg-blue-600 hover:shadow-lg transition-shadow duration-200 text-white rounded-md px-6 py-2">Next Material</a>
      @endif
    </div>
    <div class="flex-col bg-white p-5 pb-20 mb-10 rounded-md shadow-md">
      <form class="ml-5 mt-5 flex-col relative" action="{{ route('score.store', $exercise->id) }}" method="POST">
        @csrf
        @method('POST')
        @foreach ($exercise->questions as $item)
          <h1 class="text-lg mt-5"><strong>{{ $incerement++ }}.</strong> {{ $item->question }}</h1>

          <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

          <div class="ml-5">
            <label class="flex my-2 items-center dark:text-gray-400 mr-4">
              <input name="answer[{{ $item->id }}]" id="{{ $item->id }}a" type="radio" class="text-blue-600 form-radio focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:focus:shadow-outline-gray" value="a" />
              <span class="ml-2"><strong>A.</strong> {{ $item->a }}</span>
            </label>
            
            <label class="flex my-2 items-center dark:text-gray-400 mr-4">
              <input name="answer[{{ $item->id }}]" id="{{ $item->id }}b" type="radio" class="text-blue-600 form-radio focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:focus:shadow-outline-gray" value="b" />
              <span class="ml-2"><strong>B.</strong> {{ $item->b }}</span>
            </label>
            
            <label class="flex my-2 items-center dark:text-gray-400 mr-4">
              <input name="answer[{{ $item->id }}]" id="{{ $item->id }}c" type="radio" class="text-blue-600 form-radio focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:focus:shadow-outline-gray" value="c" />
              <span class="ml-2"><strong>C.</strong> {{ $item->c }}</span>
            </label>
            
            <label class="flex my-2 items-center dark:text-gray-400 mr-4">
              <input name="answer[{{ $item->id }}]" id="{{ $item->id }}d" type="radio" class="text-blue-600 form-radio focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:focus:shadow-outline-gray" value="d" />
              <span class="ml-2"><strong>D.</strong> {{ $item->d }}</span>
            </label>

            @unless (auth()->user()->role === 'student')
              <h1 class="text-md text-gray-600 flex space-x-2">
                <strong>Answer Key</strong> &nbsp; : 
                <p class="text-red-500">{{ $item->answer }}</p>
              </h1>
            @endunless
          </div>
        @endforeach
          
        <button class="bg-blue-600 py-2 px-7 rounded-md text-white absolute -bottom-16 right-0">Sumbit</button>
      </form>
    </div>
  </div>
@endsection