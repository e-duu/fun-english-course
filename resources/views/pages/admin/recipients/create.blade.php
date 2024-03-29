@extends('layouts.dash')
@section('title')
  Fun English Course | Recipient Create
@endsection
@section('sub-title')
  Create Recipients
@endsection
@section('content')
  <form action="{{ route('recipient.store') }}" method="POST" class="px-4 py-3 bg-white rounded-lg shadow-md dark:bg-gray-800">
    @csrf

    <label class="block text-sm mt-4">
      <span class="text-gray-700 dark:text-white">Bank Name</span>
      <input type="text" name="name" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray rounded-md border-gray-400" placeholder="Bank Name"/>
      @error('name')
        <div class="mt-2" style="color: rgb(255, 35, 35);">
          <i class="fas fa-dot-circle"></i> {{ $message }}
        </div>
      @enderror
    </label>
    
    <label class="block text-sm mt-4">
      <span class="text-gray-700 dark:text-white">Code</span>
      <input type="text" name="code" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray rounded-md border-gray-400" pattern="[0-9]+" placeholder="008"/>
      @error('code')
        <div class="mt-2" style="color: rgb(255, 35, 35);">
          <i class="fas fa-dot-circle"></i> {{ $message }}
        </div>
      @enderror
    </label>
    
    <button class="mt-4 bg-blue-600 py-2 px-7 rounded-md text-white">Submit</button>

  </form>
@endsection


