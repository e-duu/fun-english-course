@extends('layouts.dash')
@section('title')
  Fun English Course | Level Edit
@endsection
@section('sub-title')
  Edit Levels
@endsection
@section('content')
<div class="px-10" style="padding-top: 20px; padding-bottom: 30px">
  <form action="{{ route('level.update', $data->id) }}" method="POST" class="px-4 py-3 bg-white rounded-lg shadow-md dark:bg-gray-800">
    @csrf

    <label class="block text-sm mt-4">
      <span class="text-gray-700 dark:text-white">Level Name</span>
      <input type="text" name="name" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray rounded-md border-gray-400" value="{{ $data->name }}" placeholder="EFC Beginner - Level 1"/>
      @error('name')
        <div class="mt-2" style="color: rgb(255, 35, 35);">
          <i class="fas fa-dot-circle"></i> {{ $message }}
        </div>
      @enderror
    </label>
    
    <input type="hidden" name="program_id" value="{{ $data->program_id }}" />

    <button class="mt-4 bg-blue-600 py-2 px-7 rounded-md text-white">Submit</button>

  </form>
</div>
@endsection


