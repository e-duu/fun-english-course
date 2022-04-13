@extends('layouts.dash')
@section('title')
    Fun English Course | Dashboard
@endsection
@section('content')
  <main>
    {{-- Notification --}}
    <div class="w-full py-4 px-5 bg-yellow-200 overflow-hidden rounded-lg shadow-xs mt-5 flex space-x-3 items-center text-lg">
      <i class="fas fa-bell text-xl"></i>
      <p>Reminder for monthly subscription payment</p>
    </div>
    
    <!-- Content header -->
    <div class="flex items-center justify-between px-4 py-4 border-b lg:py-6 dark:border-primary-darker">
      <h1 class="text-2xl font-semibold">Dashboard</h1>
    </div>

    <!-- Content -->
    <div class="w-full overflow-hidden rounded-lg shadow-xs mt-5">
      <div class="w-full overflow-x-auto">
      <table class="w-full whitespace-no-wrap">
        <thead>
        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
          <th class="px-4 py-3">Student Name</th>
          <th class="px-4 py-3">Program</th>
          <th class="px-4 py-3">Level</th>
          <th class="px-4 py-3">Month</th>
          <th class="px-4 py-3">Price</th>
          <th class="px-4 py-3">Status</th>
          <th class="px-4 py-3">Actions</th>
        </tr>
        </thead>
        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-darker">
          @forelse ($data as $item)
            <tr class="text-gray-700 dark:text-gray-400">
              <td class="px-4 py-3 text-sm">
                {{ $item->student->name }}
              </td>
              <td class="px-4 py-3 text-sm">
                {{ $item->level->program->name }}
              </td>
              <td class="px-4 py-3 text-sm">
                {{ $item->level->name }}
              </td>
              <td class="px-4 py-3 text-sm">
                @if ($item->month == 1)
                    January
                @elseif ($item->month == 2)
                    February
                @elseif ($item->month == 3)
                    March
                @elseif ($item->month == 4)
                    April
                @elseif ($item->month == 5)
                    May
                @elseif ($item->month == 6)
                    June
                @elseif ($item->month == 7)
                    July
                @elseif ($item->month == 8)
                    August
                @elseif ($item->month == 9)
                    September
                @elseif ($item->month == 10)
                    October
                @elseif ($item->month == 11)
                    November
                @elseif ($item->month == 12)
                    December
                @endif
              </td>
              <td class="px-4 py-3 text-sm">
                {{'Rp '.number_format($item->price) }}
              </td>
              <td class="px-4 py-3 text-sm">
                <div class="font-semibold uppercase p-[1px] rounded-lg @if($item->status == 'paid') bg-green-500 @elseif ($item->status == 'paid_manually') bg-green-500 @elseif ($item->status == 'unpaid') bg-red-500 @endif">
                  <p class="text-white text-center">
                    @if ($item->status == 'paid')
                      PAID
                    @elseif ($item->status == 'paid_manually')
                      PAID(Manually)
                    @elseif ($item->status == 'unpaid')
                      UNPAID
                    @endif
                  </p>
                </div>
              </td>
              <td class="px-4 py-3">
                <div class="flex items-center space-x-4 text-sm">
                  {{-- @if ($item->status != 'paid') --}}
                  <a href="{{ route('spp-payment', $item->id) }}" class="flex-col text-center px-2 py-2 text-sm font-medium leading-5 text-blue-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray">
                    <i class="fas fa-cart-plus"></i>
                    <p>Pay</p>
                  </a>
                  {{-- @endif --}}
                  <a href="{{ route('spp.invoice', $item->id) }}" class="flex-col text-center px-2 py-2 text-sm font-medium leading-5 text-blue-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray">
                    <i class=" fas fa-eye"></i>
                    <p>Detail</p>
                  </a>
                </div>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="6" class="text-center text-gray-500 px-4 py-3">
                <p>
                  Data is empty..
                </p>
              </td>
            </tr>
          @endforelse

        </tbody>
      </table>
      </div>
      <div class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
        <div class="text-center w-auto sm:w-[565px] md:w-[980px] 2xl:w-[1335px] ">
        </div>
      </div>
    </div>
  </main>
@endsection
