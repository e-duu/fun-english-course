@extends('layouts.dash')
@section('title')
  Fun English Course | Downloadable File Details
@endsection
@section('sub-title')
  Detail Downloadable Files
@endsection
@section('content')
  <form class="mb-5 relative h-5">
    <button formaction="{{ route('lesson.show', $data->lesson->id) }}" class="px-5 py-1 bg-yellow-400 rounded-md font-semibold text-white sm:absolute sm:right-0 w-full sm:w-auto">Back to Lesson</button>
  </form>
  <div class="flex-col">
    <div class="bg-white shadow-md p-6 text-left rounded-lg flex-col sm:flex-row space-x-8">
      <img src="{{ asset('/downloadables/' . $data->photo) }}" alt="payment reciept" class="w-60 sm:w-96 rounded-md">
      <div class="flex-col space-y-3">
        <p class="text-sm sm:text-lg"><b> Title :</b> &nbsp;&nbsp; {{ $data->title }}</p>
        <p class="text-sm sm:text-lg"><b> Lesson :</b> &nbsp;&nbsp; {{ $data->lesson->name }}</p>
        <p class="text-sm sm:text-lg"><b> Description :</b> &nbsp;&nbsp; {!! $data->description !!}</p>
      </div>
    </div>
  </div>
@endsection