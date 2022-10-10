@extends('layouts.dash')
@section('title')
  Fun English Course | Program Create
@endsection
@section('sub-title')
  Create Programs
@endsection
@section('content')
@if (session()->has('success'))
  <div class="flex justify-between w-full py-4 px-5 bg-green-200 dark:bg-green-500 overflow-hidden rounded-sm shadow-xs items-center shadow-lg mb-5 sm:mb-7">
      <div class="flex items-center tex-xs sm:text-lg">
          {{session()->get('success')}}
      </div>
  </div>
@endif
  <form action="{{ route('program.store') }}" method="POST" class="px-4 py-3 bg-white rounded-lg shadow-md dark:bg-gray-800">
    @csrf

    <label class="block text-sm mt-4">
      <span class="text-gray-700 dark:text-gray-400">Program</span>
      <input type="text" name="name" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray rounded-md border-gray-400" placeholder="English For Adult"/>
      @error('name')
        <div class="mt-2" style="color: rgb(255, 35, 35);">
          <i class="fas fa-dot-circle"></i> {{ $message }}
        </div>
      @enderror
    </label>

    <button class="mt-4 bg-blue-600 py-2 px-7 rounded-md text-white">Submit</button>

  </form>
@endsection


