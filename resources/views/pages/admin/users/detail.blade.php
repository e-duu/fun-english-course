@extends('layouts.dash')
@section('title')
  Fun English Course | User Details
@endsection
@section('sub-title')
  Detail Users
@endsection
@section('content')
  <form class="mb-5 relative h-5">
    <button formaction="{{ route('program.all') }}" class="px-5 py-1 bg-yellow-400 rounded-md font-semibold text-white sm:absolute sm:right-0 w-full sm:w-auto">Back to Program</button>
  </form>
  <div class="bg-white shadow-md p-6 text-left rounded-lg sm:flex space-x-8">
    <img src="{{ asset('/users/' . $data->photo) }}" alt="user profile photo" class="w-60 sm:w-96 rounded-md">
    <div class="flex-col space-y-3">
      <p class="text-sm sm:text-lg"><b> Name :</b> &nbsp;&nbsp; {{ $data->name }}</p>
      <p class="text-sm sm:text-lg"><b> Username :</b> &nbsp;&nbsp; {{ $data->username }}</p>
      <p class="text-sm sm:text-lg"><b> Role :</b> &nbsp;&nbsp; {{ $data->role }}</p>
      <p class="text-sm sm:text-lg"><b> Email :</b> &nbsp;&nbsp; {{ $data->email }}</p>
      <p class="text-sm sm:text-lg"><b> Enroll in Levels :</b> &nbsp;&nbsp; 
        @foreach ($data->levels as $level)
            {{ $level->name }},&nbsp;
        @endforeach
      </p>
    </div>
  </div>
@endsection