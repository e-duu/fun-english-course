<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  @include('includes.style')
  <title>Fun English Course | Invoice</title>
</head>
<body class="bg-[#e0e0e0]">
  <div class="container-fluid">
    <div class="bg-[#1e3e97] px-24 py-5 flex justify-between items-center">
      <div class="">
        <a href="{{ route('invoice', $data->id) }}" class="text-white">Download Invoice</a>
        <span class="text-white">|</span>
        <a href="{{ URL::previous() }}" class="text-white">Back</a>
      </div>
      <h1 class="text-white font-bold text-right text-4xl uppercase">Invoice</h1>
    </div>
    <div class="container-fluid px-24">
      <div class="flex-col mt-10">
        <div class="flex justify-between items-center mb-12">
          <img src="{{ asset('images/logo.png') }}" class="max-h-16">
          <img src="{{ asset('images/edge-logo.png') }}" class="max-h-28">
        </div>
        <div class="flex-col">
          <p class="text-blue-700 font-bold text-lg mb-5">BILLED TO : </p>
          <div class="flex justify-between items-center">
            <p class="text-blue-700 font-bold">Parent's Name : {{ $data->student->parent }}</p>
            @php
                $num = (str_pad((int)$data->invoice->numberInv , 8, '0', STR_PAD_LEFT));
            @endphp
            <p class="text-blue-700 font-bold">Invoice Number : INV-{{ $data->invoice->dateCode.$num }}</p>
          </div>
          <div class="flex justify-between items-center">
            <p class="text-blue-700 font-bold">Student's Name : {{ $data->student->name }}</p>
            <p class="text-blue-700 font-bold">Invoice Date : {{ $data->created_at->format('d-m-Y') }}</p>
          </div>
          <div class="flex justify-between items-center">
            <p class="text-blue-700 font-bold">City of Residence : {{  $data->student->city }}</p>
            <p class="text-blue-700 font-bold">Billing Period : 
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
              {{'- '.$data->year}}
            </p>
          </div>
          <p class="text-blue-700 font-bold">Country of Residence : {{  $data->student->country }}</p>
          <p class="text-blue-700 font-bold">Email Address : {{  $data->student->email }}</p>
          <div class="w-full overflow-hidden rounded-sm shadow-xs mt-5 mb-10">
            <div class="w-full overflow-x-auto">
              <table class="w-full whitespace-no-wrap">
                <thead>
                  <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800 h-12">
                    <th class="px-4 py-3 bg-blue-800 text-white">Program</th>
                    <th class="px-4 py-3 bg-blue-800 text-white">Level</th>
                    <th class="px-4 py-3 bg-blue-800 text-white">Unit Price</th>
                    <th class="px-4 py-3 bg-blue-800 text-white">Quantity</th>
                    <th class="px-4 py-3 bg-blue-800 text-white">Amount</th>
                  </tr>
                </thead>
                <tbody class="bg-blue-100 divide-y-2 divide-white dark:divide-gray-700 dark:bg-darker">
                  <tr class="text-black dark:text-gray-400 h-12">
                    <td class="px-4 py-3 text-sm">
                      {{ $data->level->program->name }}
                    </td>
                    <td class="px-4 py-3 text-sm">
                      {{ $data->level->name }}
                    </td>
                    <td class="px-4 py-3 text-sm">
                      {{ $data->currency == 'USD' ? '$'.$data->price: 'Rp. '.number_format($data->price, 0, ',', ',') }}
                    </td>
                    <td class="px-4 py-3 text-sm">
                      1
                    </td>
                    <td class="px-4 py-3 text-sm">
                      {{ $data->currency == 'USD' ? '$'.$data->price: 'Rp. '.number_format($data->price, 0, ',', ',') }}
                    </td>
                  </tr>
                  <tr class="text-black dark:text-gray-400 h-10">
                    <td class="px-4 py-3 text-sm">
                    </td>
                    <td class="px-4 py-3 text-sm">
                    </td>
                    <td class="px-4 py-3 text-sm">
                    </td>
                    <td class="px-4 py-3 text-sm">
                    </td>
                    <td class="px-4 py-3 text-sm">
                    </td>
                  </tr>
                  <tr class="text-black dark:text-gray-400 h-10">
                    <td class="px-4 py-3 text-sm">
                    </td>
                    <td class="px-4 py-3 text-sm">
                    </td>
                    <td class="px-4 py-3 text-sm">
                    </td>
                    <td class="px-4 py-3 text-sm">
                    </td>
                    <td class="px-4 py-3 text-sm">
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="grid px-4 py-3 text-xs font-semibold tracking-wide text-white uppercase border-t dark:border-gray-700 bg-blue-800 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
              <div class="col-span-7"></div>
              <div class="flex items-center justify-between space-x-1">
                <p>Total</p>
                <p class="text-lg">
                    {{ $data->currency == 'USD' ? '$'.$data->price: 'Rp. '.number_format($data->price, 0, ',', ',') }}
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
