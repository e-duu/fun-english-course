@extends('layouts.dash')
@section('title')
  Fun English Course | Spp Details
@endsection
@section('sub-title')
  Detail Spp
@endsection
@section('content')
  <form class="mb-5 relative h-5">
    <button formaction="{{ route('dashboard.user') }}" class="px-5 py-1 bg-yellow-400 rounded-md font-semibold text-white sm:absolute sm:right-0 w-full sm:w-auto">Back to Spp</button>
  </form>
  <div class="grid bg-gray-50 rounded-lg mx-auto shadow-xl w-11/12 sm:w-full">
    <div class="bg-[rgb(244,182,1)] flex justify-between px-10 items-center rounded-t-lg py-3 sm:py-6 sm:mb-5">
      <img src="{{ asset('/images/logo.png') }}" class="mx-auto sm:mx-0 w-32 sm:w-48" alt="fun english course logo">
      <img src="{{ asset('/images/edge-logo.png') }}" class="w-16 hidden sm:block" alt="edge logo">
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
    <div class='w-full bg-[rgb(244,182,1)] rounded-b-lg shadow-xl font-bold text-md text-white transition-colors duration-100 py-3 sm:py-5 grid grid-cols-2 px-10 mt-10 items-center'>
      <div class=''>Total<br>Payment</div>
      <div class='font-semibold text-2xl text-white text-right'>
        {{'Rp. '.number_format($data->price) }}
      </div>
    </div>
  </div>
@endsection

@push('after-script')
  <script>
    window.print();
  </script>
@endpush