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
      <input type="text" value="{{ old('title') }}" name="title" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray rounded-md border-gray-400" placeholder="Lesson 1 Greetings - Presentation"/>
      @error('title')
        <div class="mt-2" style="color: rgb(255, 35, 35);">
          <i class="fas fa-dot-circle"></i> {{ $message }}
        </div>
      @enderror
    </label>

    <label class="block text-sm mt-4">
      <span class="text-gray-700 dark:text-gray-400">Content</span>
      <input type="text" name="content" value="{{ old('content') }}" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray rounded-md border-gray-400" placeholder="https://docs.google.com/presentation"/>
      @error('content')
        <div class="mt-2" style="color: rgb(255, 35, 35);">
          <i class="fas fa-dot-circle"></i> {{ $message }}
        </div>
      @enderror
    </label>

    <label class="block text-sm mt-4">
      <span class="text-gray-700 dark:text-gray-400">Photo</span>
      <input name="photo_file" value="{{ old('photo') }}" type="file" class="border w-full mt-1 text-sm rounded-md border-gray-400 py-1 px-2 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray" />
      @error('photo')
        <div class="mt-2" style="color: rgb(255, 35, 35);">
          <i class="fas fa-dot-circle"></i> {{ $message }}
        </div>
      @enderror
    </label>

    <div class="mt-4 text-sm">
      <span class="text-gray-700 dark:text-gray-400">
        Accesible By Student
      </span>
      <div class="mt-2">
        <label class="inline-flex items-center text-gray-600 dark:text-gray-400">
          <input type="radio" class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" name="is_accessible_by_student" value="1" />
          <span class="ml-2">Yes</span>
        </label>
        <label class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400">
          <input type="radio" class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" name="is_accessible_by_student" value="0"/>
          <span class="ml-2">No</span>
        </label>
        @error('is_accessible_by_student')
          <div class="mt-2" style="color: rgb(255, 35, 35);">
            <i class="fas fa-dot-circle"></i> {{ $message }}
          </div>
        @enderror
      </div>
    </div>

    <input type="hidden" name="lesson_id" value="{{ $data->id }}" />

    <button class="mt-4 bg-purple-600 py-2 px-7 rounded-md text-white">Sumbit</button>

  </form>
@endsection


