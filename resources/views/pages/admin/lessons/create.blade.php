@extends('layouts.dash')
@section('title')
  Fun English Course | Level Create
@endsection
@section('sub-title')
  Create Levels
@endsection
@section('content')
  <form action="{{ route('lesson.store') }}" method="POST" class="px-4 py-3 bg-white rounded-lg shadow-md dark:bg-gray-800">
    @csrf

    <label class="block text-sm mt-4">
      <span class="text-gray-700 dark:text-gray-400">Lesson Name</span>
      <input value="{{ old('name') }}" type="text" name="name" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Level 1 Greetings - Presentation"/>
    </label>
    
    <input type="hidden" name="level_id" value="{{ $data->id }}" />

    <button style="background-color: blueviolet;" class="px-5 py-2 mt-4 rounded-md text-white">Sumbit</button>

  </form>
@endsection