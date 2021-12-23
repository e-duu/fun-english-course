@extends('layouts.dash')
@section('title')
  Fun English Course | Multiple Enroll
@endsection
@section('sub-title')
  Multiple Enroll
@endsection
@section('content')
  <form action="{{ route('manyEnroll.store') }}" method="POST" class="px-4 py-3 bg-white rounded-lg shadow-md dark:bg-gray-800">
    @csrf
    <div class="flex items-start space-x-10 sm:space-x-20">
      <div class="flex-col">
        <h1 class="text-md sm:text-xl font-bold">List Levels</h1>
        @foreach ($levels as $level)
          <label class="inline-flex items-center mt-3">
            <input type="checkbox" class="form-checkbox rounded-md border-blue-600 h-5 w-5 text-blue-600" value=" {{ $level->id }}" name="levels[]">
            <span class="ml-2 text-xs sm:text-lg text-gray-700 dark:text-white">{{ $level->name }}</span>
          </label>
          <br>
        @endforeach
      </div>  
      
      <div class="flex-col">
        <h1 class="text-md sm:text-xl font-bold">List Teacher & Student</h1>
        @foreach ($users as $user)
          <label class="inline-flex items-center mt-3">
            <input type="checkbox" class="form-checkbox rounded-md border-blue-600 h-5 w-5 text-blue-600" value=" {{ $user->id }}" name="users[]">
            <span class="ml-2 text-xs sm:text-lg text-gray-700 dark:text-white">{{ $user->name }}</span>
          </label>
          <br>
        @endforeach
      </div>  
    </div>  
    <button class="mt-6 bg-blue-600 py-2 w-full rounded-md text-white">Sumbit</button>
  </form>
@endsection