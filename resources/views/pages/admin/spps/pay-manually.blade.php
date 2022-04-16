@extends('layouts.dash')
@section('title')
  Fun English Course | Spp Pay Manually
@endsection
@section('sub-title')
  Pay Spp Manually
@endsection
@section('content')
    @php
        // Convertion IDR to USD
        try {
            $req_url = "https://v6.exchangerate-api.com/v6/4de7938f23bbd34918b9c82c/latest/IDR";
            $response_json = file_get_contents($req_url);
            if(false !== $response_json) {
                try {
                    $response = json_decode($response_json);
                        if('success' === $response->result) {
                            $base_price = $data->price;
                            $result = round(($base_price * $response->conversion_rates->USD), 2);
                        }
                    }
                catch(Exception $e) {
                    dd('Convertion Failed!');
                }
            }
        } catch (\Throwable $th) {
            $result = null;
            echo 'an error occurred on the server';
        }
    @endphp
    <div class="container-fluid w-full mt-5">
        <div class="w-full md:w-9/12 mx-auto">
            <div class="grid bg-gray-50 rounded-lg shadow-xl w-full mx-auto">
                <div class="bg-blue-600 rounded-t-lg py-3 sm:py-6 sm:mb-5">
                    <h1 class="text-white text-center font-bold text-lg sm:text-2xl">
                        @if ($data->status == 'paid')
                            Payment Info
                        @elseif ($data->status == 'paid_manually')
                            Payment Info
                        @elseif ($data->status == 'unpaid')
                            Payment Confirmation
                        @elseif ($data->status == 'pending')
                            Payment Confirmation
                        @endif
                    </h1>
                </div>

                <div class="flex-col mx-10">
                    <form id="currency" method="POST" action="{{ route('spp.pay-manually.prosses', $data->id) }}">
                        @csrf
                        @method('POST')
                        <input type="hidden" value="{{$data->price}}" name="IDR">
                        <input type="hidden" value="{{$result}}" name="USD">
                        <label class="block mt-4 text-sm">
                            <span class="text-gray-700 dark:text-gray-400">
                            Select Currecy
                            </span>
                            <select onchange="getVal(this)" name="currency" class="block w-full mt-1 text-sm rounded-md border-gray-400  dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:focus:shadow-outline-gray">
                            <option>Select Currency</option>
                            <option value="IDR" >IDR</option>
                            <option value="USD" >USD</option>
                            </select>
                        </label>
                    </form>
                    <div class="grid grid-cols-2 my-4 items-center">
                        <p class="text-md text-gray-700">Student Name</p>
                        <p class="font-semibold text-lg text-gray-700 text-right">
                            {{ $data->student->name }}
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
                    <div class="grid grid-cols-2 my-4 items-center" id="printUsd" style="display: none">
                        <p class="text-md text-gray-700">Price Amount (USD)</p>
                        <p class="font-semibold text-lg text-gray-700 text-right -mt-6">
                            {{'$'.$result }}
                        </p>
                    </div>
                    <div class="grid grid-cols-2 my-4 items-center" id="printIdr" style="display: none">
                        <p class="text-md text-gray-700">Price Amount (IDR)</p>
                        <p class="font-semibold text-lg text-gray-700 text-right -mt-6">
                            {{'Rp. '.number_format($data->price) }}
                        </p>
                    </div>
                </div>
                <div class='w-full bg-blue-600 rounded-b-lg shadow-xl font-bold text-md text-white transition-colors duration-100 py-3 sm:py-5 grid grid-cols-2 px-10 mt-10 items-center'>
                    <div class=''>Total<br>Payment</div>
                    {{-- IDR --}}
                    <div id="totalIdr" class='font-semibold text-xl text-white text-right' style="display: none">
                        {{'Rp. '.number_format($data->price)}}
                    </div>

                    {{-- USD --}}
                    <div id="totalUsd" class='font-semibold text-xl text-white text-right' style="display: none">
                        {{'$'.$result}}
                    </div>
                </div>
            </div>
            @if ($data->status != 'paid')
                @if ($data->status != 'paid_manually')
                    <div class="mx-auto">
                        <button form="currency" type="submit" class="rounded-full w-full py-4 mt-10 bg-blue-600 text-white font-bold text-xl text-center">
                            <i class="fas fa-money-check"></i> Pay
                        </button>
                    </div>
                @endif
            @endif
        </div>
    </div>
@endsection

@push('after-script')
    <script>
        function getVal(sel) {
            if (sel.value == 'IDR') {
                document.getElementById('printIdr').style.display = 'inline';
                document.getElementById('totalIdr').style.display = 'inline';

                document.getElementById('printUsd').style.display = 'none';
                document.getElementById('totalUsd').style.display = 'none';
            } else if (sel.value == 'USD') {
                document.getElementById('printIdr').style.display = 'none';
                document.getElementById('totalIdr').style.display = 'none';

                document.getElementById('printUsd').style.display = 'inline';
                document.getElementById('totalUsd').style.display = 'inline';
            }
        }
    </script>
@endpush
