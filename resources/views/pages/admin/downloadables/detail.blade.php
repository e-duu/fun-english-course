@extends('layouts.dash')
@section('title')
  Fun English Course | Downloadable File Details
@endsection
@section('sub-title')
  Detail Downloadable Files
@endsection
@section('content')
  <div class="flex-col">
    <div class="bg-white shadow-md p-6 text-left rounded-lg flex space-x-8">
      <img src="{{ asset('/downloadables/' . $data->photo) }}" alt="payment reciept" style="max-width: 400px;" class="rounded-md">
      <div class="flex-col space-y-3">
        <p class="text-lg"><b> Title :</b> &nbsp;&nbsp; {{ $data->title }}</p>
        <p class="text-lg"><b> Lesson :</b> &nbsp;&nbsp; {{ $data->lesson->name }}</p>
        <p class="text-lg"><b> Description :</b> &nbsp;&nbsp; {!! $data->description !!}</p>
      </div>
    </div>
  </div>
@endsection