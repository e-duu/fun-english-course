@extends('layouts.app')
@section('title')
    Fun English Course - Payment
@endsection
@section('content')
    <div class="container-fluid px-7 sm:px-20 mt-10 sm:mt-16">

      <div class="w-full overflow-hidden rounded-lg shadow-xs mt-5">
        <h2 class="text-white rounded-md font-bold text-center text-3xl py-5 bg-blue-500">Need Payment</h2>
        <div class="w-full overflow-x-auto">
        <table class="w-full whitespace-no-wrap">
          <thead>
          <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
            <th class="px-4 py-3">Parent Name</th>
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
            @if ($needPay)
                
              <tr class="text-gray-700 dark:text-gray-400">
                <td class="px-4 py-3 text-sm">
                  {{ $needPay->student->parent }}
                </td>
                <td class="px-4 py-3 text-sm">
                  {{ $needPay->student->name }}
                </td>
                <td class="px-4 py-3 text-sm">
                  {{ $needPay->level->program->name }}
                </td>
                <td class="px-4 py-3 text-sm">
                  {{ $needPay->level->name }}
                </td>
                <td class="px-4 py-3 text-sm">
                  @if ($needPay->month == 1)
                      January
                  @elseif ($needPay->month == 2)
                      February
                  @elseif ($needPay->month == 3)
                      March
                  @elseif ($needPay->month == 4)
                      April
                  @elseif ($needPay->month == 5)
                      May
                  @elseif ($needPay->month == 6)
                      June
                  @elseif ($needPay->month == 7)
                      July
                  @elseif ($needPay->month == 8)
                      August
                  @elseif ($needPay->month == 9)
                      September
                  @elseif ($needPay->month == 10)
                      October
                  @elseif ($needPay->month == 11)
                      November
                  @elseif ($needPay->month == 12)
                      December
                  @endif
                </td>
                <td class="px-4 py-3 text-sm">
                  {{'Rp '.number_format($needPay->price) }}
                </td>
                <td class="px-4 py-3 text-sm">
                  <div class="font-semibold uppercase p-[1px] rounded-lg @if($needPay->status == 'paid') bg-green-500 @elseif ($needPay->status == 'paid_manually') bg-green-500 @elseif ($needPay->status == 'unpaid') bg-red-500 @elseif ($needPay->status == 'pending') bg-yellow-500 @endif">
                    <p class="text-white text-center">
                      @if ($needPay->status == 'paid')
                        PAID
                      @elseif ($needPay->status == 'paid_manually')
                        PAID(Manually)
                      @elseif ($needPay->status == 'unpaid')
                        UNPAID
                      @elseif ($needPay->status == 'pending')
                        PENDING
                      @endif
                    </p>
                  </div>
                </td>
                <td class="px-4 py-3">
                  <div class="flex items-center space-x-4 text-sm">
                    @if ($needPay->status == 'unpaid')
                      <a href="{{ route('spp-payment', $needPay->id) }}" class="flex-col text-center px-2 py-2 text-sm font-medium leading-5 text-blue-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray">
                        <i class="fas fa-money-check"></i>
                        <p>Pay</p>
                      </a>
                    @endif
                    @if ($needPay->status == 'paid' or $needPay->status == 'paid_manually')
                      <a href="{{ route('page-receipt', $needPay->id) }}" class="flex-col text-center px-2 py-2 text-sm font-medium leading-5 text-blue-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray">
                        <i class="fas fa-print"></i>
                        <p>Receipt</p>
                      </a>
                    @elseif ($needPay->status == 'unpaid' or $needPay->status == 'pending')
                      <a href="{{ route('page-invoice', $needPay->id) }}" class="flex-col text-center px-2 py-2 text-sm font-medium leading-5 text-blue-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray">
                        <i class="fas fa-print"></i>
                        <p>Invoice</p>
                      </a>
                    @endif
                  </div>
                </td>
              </tr>
            @else
              <tr>
                <td colspan="8" class="text-center text-gray-500 px-4 py-3">
                  <p>
                    Data is empty..
                  </p>
                </td>
              </tr>
            @endif
      
          </tbody>
        </table>
        </div>
        {{-- <div class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
          <div class="text-center w-auto sm:w-[565px] md:w-[1160px] 2xl:w-[1495px] ">
            {{ $data->links() }}
          </div>
        </div> --}}
      </div>

      <div class="w-full overflow-hidden rounded-lg shadow-xs mt-5">
        <h2 class="text-white rounded-md font-bold text-center text-3xl py-5 bg-blue-500">History Payment</h2>
        <div class="w-full overflow-x-auto">
        <table class="w-full whitespace-no-wrap">
          <thead>
          <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
            <th class="px-4 py-3">Parent Name</th>
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
                  {{ $item->student->parent }}
                </td>
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
                    {{ $item->currency == 'USD' ? '$ '.$item->price: 'Rp '.number_format($item->price, 0, ',', ',') }}
                </td>
                <td class="px-4 py-3 text-sm">
                  <div class="font-semibold uppercase p-[1px] rounded-lg @if($item->status == 'paid') bg-green-500 @elseif ($item->status == 'paid_manually') bg-green-500 @elseif ($item->status == 'unpaid') bg-red-500 @elseif ($item->status == 'pending') bg-yellow-500 @endif">
                    <p class="text-white text-center">
                      @if ($item->status == 'paid')
                        PAID
                      @elseif ($item->status == 'paid_manually')
                        PAID(Manually)
                      @elseif ($item->status == 'unpaid')
                        UNPAID
                      @elseif ($item->status == 'pending')
                        PENDING
                      @endif
                    </p>
                  </div>
                </td>
                <td class="px-4 py-3">
                  <div class="flex items-center space-x-4 text-sm">
                    @if ($item->status == 'unpaid')
                      <a href="{{ route('spp-payment', $item->id) }}" class="flex-col text-center px-2 py-2 text-sm font-medium leading-5 text-blue-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray">
                        <i class="fas fa-money-check"></i>
                        <p>Pay</p>
                      </a>
                    @endif
                    @if ($item->status == 'paid' or $item->status == 'paid_manually')
                      <a href="{{ route('page-receipt', $item->id) }}" class="flex-col text-center px-2 py-2 text-sm font-medium leading-5 text-blue-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray">
                        <i class="fas fa-print"></i>
                        <p>Receipt</p>
                      </a>
                    @elseif ($item->status == 'unpaid' or $item->status == 'pending')
                      <a href="{{ route('page-invoice', $item->id) }}" class="flex-col text-center px-2 py-2 text-sm font-medium leading-5 text-blue-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray">
                        <i class="fas fa-print"></i>
                        <p>Invoice</p>
                      </a>
                    @endif
                  </div>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="8" class="text-center text-gray-500 px-4 py-3">
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
          <div class="text-center w-auto sm:w-[565px] md:w-[1160px] 2xl:w-[1495px] ">
            {{ $data->links() }}
          </div>
        </div>
      </div>
  </div>
@endsection
