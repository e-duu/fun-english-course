@extends('layouts.dash')
@section('title')
  Fun English Course | Recipient Edit
@endsection
@section('sub-title')
  Edit Recipients
@endsection
@section('content')
  <form action="#" method="POST" class="px-4 py-3 bg-white rounded-lg shadow-md dark:bg-gray-800">

    <label class="block text-sm mt-4">
      <span class="text-gray-700 dark:text-gray-400">Bank Name</span>
      <input type="text" name="name" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Bank Name"/>
    </label>
    
    <label class="block text-sm mt-4">
      <span class="text-gray-700 dark:text-gray-400">Code</span>
      <input type="number" name="username" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Jane Doe"/>
    </label>
    
    <button style="padding: 8px 20px; background-color: blueviolet;" class="mt-4 rounded-md text-white">Sumbit</button>

  </form>
@endsection


