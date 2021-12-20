@extends('layouts.dash')
@section('title')
  Fun English Course | Exercise Create
@endsection
@section('sub-title')
  Create Exercises
@endsection
@section('content')
  <form action="{{ route('exercise.store', $data->id) }}" method="POST" class="px-4 py-3 bg-white rounded-lg shadow-md dark:bg-gray-800" enctype="multipart/form-data">
    @csrf

    <label class="block text-sm mt-4">
      <span class="text-gray-700 dark:text-gray-400">Exercise Title</span>
      <input type="text" name="title" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray rounded-md border-gray-400" placeholder="Greetings I - Multiple Choices"/>
      @error('title')
        <div class="mt-2 text-red-600">
          <i class="fas fa-dot-circle"></i> {{ $message }}
        </div>
      @enderror
    </label>

    <label class="block text-sm mt-4">
      <span class="text-gray-700 dark:text-gray-400">Description</span>
      <textarea name="description" id="editor" ></textarea>
    </label>

    <label class="block text-sm mt-4">
      <span class="text-gray-700 dark:text-gray-400">Photo</span>
      <input name="photo_file" value="{{ old('photo_file') }}" type="file" class="border w-full mt-1 text-sm rounded-md border-gray-400 py-1 px-2 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray" />
      @error('photo_file')
        <div class="mt-2 text-red-600">
          <i class="fas fa-dot-circle"></i> {{ $message }}
        </div>
      @enderror
    </label>
    
    <input type="hidden" name="lesson_id" value="{{ $data->id }}">
    
    <button class="mt-4 bg-purple-600 py-2 px-7 rounded-md text-white">Sumbit</button>

  </form>
@endsection
@push('after-script')
  <script src="https://cdn.ckeditor.com/ckeditor5/31.1.0/classic/ckeditor.js"></script>
  <script>
    ClassicEditor
      .create( document.querySelector( '#editor' ))
      .then( editor => {
              console.log( editor );
      })
      .catch( error => {
              console.error( error );
      });
  </script>
@endpush


