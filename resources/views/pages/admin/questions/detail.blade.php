@extends('layouts.dash')
@section('title')
  Fun English Course | Question Details
@endsection
@section('sub-title')
  Detail Questions
@endsection
@section('content')
  <form class="mb-5 relative h-5">
    <button formaction="{{ route('exercise.show', $data->exercise->id) }}" class="px-5 py-1 bg-yellow-400 rounded-md font-semibold text-white sm:absolute sm:right-0 w-full sm:w-auto">Back to Exercise</button>
  </form>
  <div class="flex-col">
    <div class="bg-white shadow-md p-6 text-left rounded-lg sm:flex space-x-8">
      <div class="flex-col space-y-3">
        <p class="text-sm sm:text-lg"><b> Question :</b> &nbsp;&nbsp; {{ $data->question }}</p>
        <p class="text-sm sm:text-lg"><b> A . :</b> &nbsp;&nbsp; {{ $data->a }}</p>
        <p class="text-sm sm:text-lg"><b> B . :</b> &nbsp;&nbsp; {{ $data->b }}</p>
        <p class="text-sm sm:text-lg"><b> C . :</b> &nbsp;&nbsp; {{ $data->c }}</p>
        <p class="text-sm sm:text-lg"><b> D . :</b> &nbsp;&nbsp; {{ $data->d }}</p>
        <p class="text-sm sm:text-lg"><b> Answer Key :</b> &nbsp;&nbsp; {{ $data->answer }}</p>
      </div>
    </div>
  </div>
@endsection