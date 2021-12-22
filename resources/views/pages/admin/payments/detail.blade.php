@extends('layouts.dash')
@section('title')
  Fun English Course | Payment Details
@endsection
@section('sub-title')
  Detail Payments
@endsection
@section('content')
  <form class="mb-5 relative h-5">
    <button formaction="{{ route('payment.all') }}" class="px-5 py-1 bg-yellow-400 rounded-md font-semibold text-white sm:absolute sm:right-0 w-full sm:w-auto">Back to Payment</button>
  </form>
  <div class="flex-col">
    <div class="bg-white shadow-md p-6 text-left rounded-lg sm:flex space-x-8">
      <img src="{{ asset('/payments/' . $data->evidence) }}" alt="payment reciept" class="w-60 sm:w-96 rounded-md">
      <div class="flex-col space-y-3">
        <p class="text-sm sm:text-lg"><b> Student :</b> &nbsp;&nbsp; {{ $data->users->name }}</p>
        <p class="text-sm sm:text-lg"><b> Reciepent :</b> &nbsp;&nbsp; {{ $data->recipients->name }}</p>
        <p class="text-sm sm:text-lg"><b> Program :</b> &nbsp;&nbsp; {{ $data->programs->name }}</p>
        <p class="text-sm sm:text-lg"><b> Level :</b> &nbsp;&nbsp; {{ $data->levels->name }}</p>
        <p class="text-sm sm:text-lg"><b> Amount :</b> &nbsp;&nbsp; {{ $data->amount }}</p>
        <p class="text-sm sm:text-lg"><b> Note :</b> &nbsp;&nbsp; {{ $data->note }}</p>
      </div>
    </div>
  </div>
@endsection