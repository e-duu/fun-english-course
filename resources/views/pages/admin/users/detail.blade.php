@extends('layouts.dash')
@section('title')
  Fun English Course | User Details
@endsection
@section('sub-title')
  Detail Users
@endsection
@section('content')
  <div class="flex-col">
    <div class="bg-white shadow-md p-6 text-left rounded-lg flex space-x-8">
      <img src="{{ asset('/users/' . $data->photo) }}" alt="user profile photo" style="max-width: 400px;" class="rounded-md">
      <div class="flex-col space-y-3">
        <p class="text-lg"><b> Name :</b> &nbsp;&nbsp; {{ $data->name }}</p>
        <p class="text-lg"><b> Username :</b> &nbsp;&nbsp; {{ $data->username }}</p>
        <p class="text-lg"><b> Role :</b> &nbsp;&nbsp; {{ $data->role }}</p>
        <p class="text-lg"><b> Email :</b> &nbsp;&nbsp; {{ $data->email }}</p>
        <p class="text-lg"><b> Enroll in Levels :</b> &nbsp;&nbsp; 
          @foreach ($data->levels as $level)
              {{ $level->name }},&nbsp;
          @endforeach
        </p>
      </div>
    </div>
  </div>
@endsection