@extends('layouts.dash')
@section('title')
  Fun English Course | Material Details
@endsection
@section('sub-title')
  Detail Materials
@endsection
@section('content')
  <div class="flex-col">
    <div class="bg-white shadow-md p-6 text-left rounded-lg flex space-x-8">
      <img src="{{ asset('/materials/' . $data->photo) }}" alt="payment reciept" style="max-width: 400px;" class="rounded-md">
      <div class="flex-col space-y-3">
        <p class="text-lg"><b> Title :</b> &nbsp;&nbsp; {{ $data->title }}</p>
        <p class="text-lg"><b> Lesson :</b> &nbsp;&nbsp; {{ $data->lesson_details->name }}</p>
        <p class="text-lg"><b> Content :</b> &nbsp;&nbsp; {!! $data->content !!}</p>
      </div>
    </div>
  </div>
@endsection