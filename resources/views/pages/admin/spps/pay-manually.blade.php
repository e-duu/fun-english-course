@extends('layouts.dash')
@section('title')
  Fun English Course | Spp Pay Manually
@endsection
@section('sub-title')
  Pay Spp Manually
@endsection
@section('content')
    <div class="container-fluid px-7 sm:px-20 mt-5">
    <div class="grid bg-gray-50 rounded-lg mx-auto shadow-xl w-11/12 md:w-9/12 lg:w-full">
      <div class="bg-blue-600 rounded-t-lg py-3 sm:py-6 sm:mb-5">
        <h1 class="text-white text-center font-bold text-lg sm:text-2xl">Payment Confirmation</h1>
      </div>

      <div class="flex-col mx-10">
        <div class="grid grid-cols-2 my-4 items-center">
          <p class="text-md text-gray-700">Student Name</p>
          <p class="font-semibold text-lg text-gray-700 text-right">
            {{ Auth::user()->name }}
          </p>
        </div>
        <div class="grid grid-cols-2 my-4 items-center">
          <p class="text-md text-gray-700">Month</p>
          <p class="font-semibold text-lg text-gray-700 text-right">
            @if ($data->month == 1)
                January
            @elseif ($data->month == 2)
                February
            @elseif ($data->month == 3)
                March
            @elseif ($data->month == 4)
                April
            @elseif ($data->month == 5)
                May
            @elseif ($data->month == 6)
                June
            @elseif ($data->month == 7)
                July
            @elseif ($data->month == 8)
                August
            @elseif ($data->month == 9)
                September
            @elseif ($data->month == 10)
                October
            @elseif ($data->month == 11)
                November
            @elseif ($data->month == 12)
                December
            @endif
          </p>
        </div>
        <div class="grid grid-cols-2 my-4 items-center">
          <p class="text-md text-gray-700">Program</p>
          <p class="font-semibold text-lg text-gray-700 text-right">
            {{ $data->level->program->name }}
          </p>
        </div>
        <div class="grid grid-cols-2 my-4 items-center">
          <p class="text-md text-gray-700">Level</p>
          <p class="font-semibold text-lg text-gray-700 text-right">
            {{ $data->level->name }}
          </p>
        </div>
        <div class="grid grid-cols-2 my-4 items-center">
          <p class="text-md text-gray-700">Status</p>
          <p class="font-semibold text-lg uppercase @if($data->status == 'paid' || $data->status == 'paid_manually') text-green-500 @else text-red-500 @endif text-right">
            @if ($data->status == 'paid')
              PAID
            @elseif ($data->status == 'paid_manually')
              PAID(Manually)
            @elseif ($data->status == 'unpaid')
              UNPAID
            @elseif ($data->status == 'pending')
              PENDING
            @endif
          </p>
        </div>
        <div class="grid grid-cols-2 my-4 items-center">
          <p class="text-md text-gray-700">Price Amount</p>
          <p class="font-semibold text-lg text-gray-700 text-right">
            {{'Rp. '.number_format($data->price) }}
          </p>
        </div>
      </div>
      <div class='w-full bg-blue-600 rounded-b-lg shadow-xl font-bold text-md text-white transition-colors duration-100 py-3 sm:py-5 grid grid-cols-2 px-10 mt-10 items-center'>
        <div class=''>Total<br>Payment</div>
        <div class='font-semibold text-xl text-white text-right'>
          {{'Rp. '.number_format($data->price) }}
        </div>
      </div>
    </div>
    <a href="{{ route('spp.all') }}">
      <div class="rounded-full py-4 mt-10 bg-blue-600 text-white font-bold text-xl text-center">
      <i class="fas fa-money-check"></i> Pay
      </div>
    </a>
  </div>

@endsection