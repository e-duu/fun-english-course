@extends('layouts.dash')
@section('title')
  Fun English Course | Program Edit
@endsection
@section('sub-title')
  Edit Programs
@endsection
@section('content')
  <form action="{{ route('program.edit', $data->id) }}" method="POST" class="px-4 py-3 bg-white rounded-lg shadow-md dark:bg-gray-800">
    @csrf

    <label class="block text-sm mt-4">
      <span class="text-gray-700 dark:text-white">Program</span>
      <input type="text" name="name" value="{{ $data->name }}" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray rounded-md border-gray-400" placeholder="Program"/>
      @error('name')
        <div class="mt-2" style="color: rgb(255, 35, 35);">
          <i class="fas fa-dot-circle"></i> {{ $message }}
        </div>
      @enderror
    </label>

    <button class="mt-4 bg-blue-600 py-2 px-7 rounded-md text-white">Submit</button>

  </form>
@endsection


