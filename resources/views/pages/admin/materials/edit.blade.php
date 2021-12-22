@extends('layouts.dash')
@section('title')
  Fun English Course | Material Edit
@endsection
@section('sub-title')
  Edit Materials
@endsection
@section('content')
  <form action="{{ route('material.update', $data->id) }}" method="POST" class="px-4 py-3 bg-white rounded-lg shadow-md dark:bg-gray-800" enctype="multipart/form-data">
    @csrf
    @method("POST")
    
    <label class="block text-sm mt-4">
      <span class="text-gray-700 dark:text-gray-400">Title</span>
      <input type="text" name="title" value="{{ $data->title }}" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray rounded-md border-gray-400" placeholder="Lesson 1 Greetings - Presentation"/>
      @error('name')
        <div class="mt-2" style="color: rgb(255, 35, 35);">
          <i class="fas fa-dot-circle"></i> {{ $message }}
        </div>
      @enderror
    </label>

    <label class="block text-sm mt-4">
      <span class="text-gray-700 dark:text-gray-400">Content</span>
      <input type="text" name="content" value="{{ $data->content }}" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray rounded-md border-gray-400" placeholder="https://docs.google.com/presentation"/>
      @error('content')
        <div class="mt-2" style="color: rgb(255, 35, 35);">
          <i class="fas fa-dot-circle"></i> {{ $message }}
        </div>
      @enderror
    </label>

    <label class="block text-sm mt-4">
      <span class="text-gray-700 dark:text-gray-400">Description</span>
      <textarea name="description" id="editor">{{ $data->description }}</textarea>
    </label>

    <label class="block text-sm mt-4">
      <span class="text-gray-700 dark:text-gray-400">Photo</span>
      <input type="file" name="photo_file" class="border w-full mt-1 text-sm rounded-md border-gray-400 py-1 px-2 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray" value="{{ old('photo_file') }}" />
    </label>

    <div class="mt-4 text-sm">
      <span class="text-gray-700 dark:text-gray-400">
        Accesible By Student
      </span>
      <div class="mt-2">
        <label class="inline-flex items-center text-gray-600 dark:text-gray-400">
          <input type="radio" class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" name="is_accessible_by_student" value="1" {{ ($data->is_accessible_by_student == 1 ? 'checked' : '') }} />
          <span class="ml-2">Yes</span>
        </label>
        <label class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400">
          <input type="radio" class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" name="is_accessible_by_student" value="0" {{ ($data->is_accessible_by_student == 0 ? 'checked' : '') }} />
          <span class="ml-2">No</span>
        </label>
        @error('is_accessible_by_student')
          <div class="mt-2" style="color: rgb(255, 35, 35);">
            <i class="fas fa-dot-circle"></i> {{ $message }}
          </div>
        @enderror
      </div>
    </div>

    <input type="hidden" name="lesson_id" value="{{ $data->lesson_id }}" />

    <button class="mt-4 bg-purple-600 py-2 px-7 rounded-md text-white">Sumbit</button>

  </form>
@endsection
@push('after-script')
  <script src="https://cdn.ckeditor.com/ckeditor5/31.1.0/classic/ckeditor.js"></script>
  <script>
    ClassicEditor
      .create( document.querySelector( '#editor' ), {
          toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote' ],
          heading: {
              options: [
                  { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                  { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                  { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' }
              ]
          }
      } )
      .catch( error => {
              console.error( error );
      });
  </script>
@endpush


