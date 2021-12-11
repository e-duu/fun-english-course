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
      <img src="{{ asset('/payments/' . $data->evidence) }}" alt="payment reciept" style="max-width: 400px;" class="rounded-md">
      <div class="flex-col space-y-3">
        <p class="text-lg"><b> Student :</b> &nbsp;&nbsp; {{ $data->users->name }}</p>
        <p class="text-lg"><b> Reciepent :</b> &nbsp;&nbsp; {{ $data->recipients->name }}</p>
        <p class="text-lg"><b> Program :</b> &nbsp;&nbsp; {{ $data->programs->name }}</p>
        <p class="text-lg"><b> Level :</b> &nbsp;&nbsp; {{ $data->levels->name }}</p>
        <p class="text-lg"><b> Amount :</b> &nbsp;&nbsp; {{ $data->amount }}</p>
        <p class="text-lg"><b> Note :</b> &nbsp;&nbsp; {{ $data->note }}</p>
      </div>
    </div>
  </div>
@endsection