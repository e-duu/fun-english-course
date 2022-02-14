@extends('layouts.dash')
@section('title')
  Fun English Course | Downloadable File Edit
@endsection
@section('sub-title')
  Edit Downloadable Files
@endsection
@section('content')
  <form action="{{ route('downloadable.update', $data->id) }}" method="POST" class="px-4 py-3 bg-white rounded-lg shadow-md dark:bg-gray-800" enctype="multipart/form-data">
    @csrf

    <label class="block text-sm mt-4">
      <span class="text-gray-700 dark:text-gray-400">Downloadable File Title</span>
      <input type="text" name="title" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray rounded-md border-gray-400" placeholder="Greetings I - Downloadable Excel" value="{{ $data->title }}"/>
      @error('title')
        <div class="mt-2 text-red-600">
          <i class="fas fa-dot-circle"></i> {{ $message }}
        </div>
      @enderror
    </label>

    <label class="block text-sm mt-4 prose max-w-full">
      <span class="text-gray-700 dark:text-gray-400">Description</span>
      <textarea name="description" id="editor">{{ $data->description }}</textarea>
    </label>

    <label class="block text-sm mt-4">
      <span class="text-gray-700 dark:text-gray-400">Photo</span>
      <input name="photo_file" value="{{ old('photo_file') }}" type="file" class="border w-full mt-1 text-sm rounded-md border-gray-400 py-1 px-2 dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray" value="{{ $data->photo }}" />
      @error('photo_file')
        <div class="mt-2 text-red-600">
          <i class="fas fa-dot-circle"></i> {{ $message }}
        </div>
      @enderror
    </label>
    
    <label class="block text-sm mt-4">
      <span class="text-gray-700 dark:text-gray-400">Downloadable File Content</span>
      <input name="download_file" value="{{ old('download_file') }}" type="file" class="border w-full mt-1 text-sm rounded-md border-gray-400 py-1 px-2 dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray" value="{{ $data->file }}" />
      @error('download_file')
        <div class="mt-2 text-red-600">
          <i class="fas fa-dot-circle"></i> {{ $message }}
        </div>
      @enderror
    </label>

    <div class="mt-4 text-sm">
      <span class="text-gray-700 dark:text-gray-400">
        Accesible By
      </span>
      <div class="mt-2">
        <label class="inline-flex items-center text-gray-600 dark:text-gray-400">
          <input type="radio" class="text-blue-600 form-radio focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:focus:shadow-outline-gray" name="accessible_by" value="teacher" {{ ($data->accessible_by == 'teacher' ? 'checked' : '') }}/>
          <span class="ml-2">Teacher</span>
        </label>
        <label class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400">
          <input type="radio" class="text-blue-600 form-radio focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:focus:shadow-outline-gray" name="accessible_by" value="student" {{ ($data->accessible_by == 'student' ? 'checked' : '') }}/>
          <span class="ml-2">Student</span>
        </label>
        <label class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400">
          <input type="radio" class="text-blue-600 form-radio focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:focus:shadow-outline-gray" name="accessible_by" value="all" {{ ($data->accessible_by == 'all' ? 'checked' : '') }}/>
          <span class="ml-2">Teacher & Student</span>
        </label>
        @error('accessible_by')
          <div class="mt-2 text-red-600">
            <i class="fas fa-dot-circle"></i> {{ $message }}
          </div>
        @enderror
      </div>
    </div>
    
    <input type="hidden" name="lesson_id" value="{{ $data->lesson_id }}">
    
    <button class="mt-4 bg-blue-600 py-2 px-7 rounded-md text-white">Submit</button>

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
@push('after-style')
    <style>
      .ck-editor__editable_inline {
        min-height: 200px;
      }
    </style>
@endpush


