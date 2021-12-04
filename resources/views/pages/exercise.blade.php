@extends('layouts.watch')
@section('title')
  Fun English Course | Watch Page
@endsection
@section('content')
  <div class="flex-col mx-auto px-32">
    <div class="flex justify-between items-center mt-20 mb-7">
      <div class="flex-col">
        <h1 class="font-bold text-2xl text-gray-800">{{ $exercise->lesson->name }}</h1>
        <p class="text-gray-800 mt-2">{{ $exercise->title }}</p>
      </div>
    </div>
    <div class="flex-col bg-white p-5 rounded-md shadow-md">
      @foreach ($exercise->questions as $item)
        <h1 class="text-lg"><strong>1.</strong> {{ $item->question }}</h1>
          <form class="ml-5 mt-5 flex-col" action="">

            <label class="flex my-2 items-center dark:text-gray-400 mr-4">
              <input type="radio" class="text-blue-600 form-radio focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:focus:shadow-outline-gray" name="role" />
              <span class="ml-2"><strong>A.</strong> {{ $item->a }}</span>
            </label>
            
            <label class="flex my-2 items-center dark:text-gray-400 mr-4">
              <input type="radio" class="text-blue-600 form-radio focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:focus:shadow-outline-gray" name="role" />
              <span class="ml-2"><strong>B.</strong> {{ $item->b }}</span>
            </label>
            
            <label class="flex my-2 items-center dark:text-gray-400 mr-4">
              <input type="radio" class="text-blue-600 form-radio focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:focus:shadow-outline-gray" name="role" />
              <span class="ml-2"><strong>C.</strong> {{ $item->c }}</span>
            </label>
            
            <label class="flex my-2 items-center dark:text-gray-400 mr-4">
              <input type="radio" class="text-blue-600 form-radio focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:focus:shadow-outline-gray" name="role" />
              <span class="ml-2"><strong>D.</strong> {{ $item->d }}</span>
            </label>

            <button class="mt-6 bg-blue-600 py-2 px-7 rounded-md text-white ml-[600px]">Sumbit</button>
            
          </form>
      @endforeach
    </div>
  </div>
@endsection