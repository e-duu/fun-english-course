@extends('layouts.dash')
@section('title')
  Fun English Course | Material Create
@endsection
@section('sub-title')
  Create Materials
@endsection
@section('content')
  <form action="{{ route('material.store') }}" method="POST" class="px-4 py-3 bg-white rounded-lg shadow-md dark:bg-gray-800" enctype="multipart/form-data">
    @csrf
    
    <label class="block text-sm mt-4">
      <span class="text-gray-700 dark:text-gray-400">Title</span>
      <input type="text" value="{{ old('title') }}" name="title" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Lesson 1 Greetings - Presentation"/>
    </label>

    <label class="block mt-4 text-sm">
      <span class="text-gray-700 dark:text-gray-400">Content</span>
      <textarea id="editor" name="content" value="{{ old('content') }}"></textarea>
    </label>

    <label class="block text-sm mt-4">
      <span class="text-gray-700 dark:text-gray-400">Photo</span>
      <input name="photo" value="{{ old('photo') }}" type="file" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
    </label>

    <input type="hidden" name="lesson_id" value="{{ $data->id }}" />

    <button style="padding: 8px 20px; background-color: blueviolet; margin-top: 20px;" class="rounded-md text-white">Sumbit</button>

  </form>
@endsection


