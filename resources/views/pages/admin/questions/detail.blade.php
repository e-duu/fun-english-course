@extends('layouts.dash')
@section('title')
  Fun English Course | Payment Details
@endsection
@section('sub-title')
  Detail Payments
@endsection
@section('content')
  <div class="flex-col">
    <div class="bg-white shadow-md p-6 text-left rounded-lg flex space-x-8">
      <div class="flex-col space-y-3">
        <p class="text-lg"><b> Question :</b> &nbsp;&nbsp; {{ $data->question }}</p>
        <p class="text-lg"><b> A . :</b> &nbsp;&nbsp; {{ $data->a }}</p>
        <p class="text-lg"><b> B . :</b> &nbsp;&nbsp; {{ $data->b }}</p>
        <p class="text-lg"><b> C . :</b> &nbsp;&nbsp; {{ $data->c }}</p>
        <p class="text-lg"><b> D . :</b> &nbsp;&nbsp; {{ $data->d }}</p>
        <p class="text-lg"><b> Answer Key :</b> &nbsp;&nbsp; {{ $data->answer }}</p>
      </div>
    </div>
  </div>
@endsection