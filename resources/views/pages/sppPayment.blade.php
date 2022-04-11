@extends('layouts.app')
@section('title')
    Fun English Course - Payment
@endsection
@section('content')
    <div class="container-fluid px-7 sm:px-20 mt-10 sm:mt-16">
    <div class="grid bg-gray-50 rounded-lg mx-auto shadow-xl w-11/12 md:w-9/12 lg:w-1/2">
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

    <div class="rounded-lg mx-auto w-11/12 md:w-9/12 lg:w-1/2 mt-12">
      {{-- NOTE : PAYMENT BY MOOTA --}}
      <a href="{{ route('spp-payment-detail', $data->id) }}">
        <div class="rounded-full py-4 bg-blue-600 text-white font-bold text-xl text-center">
          <i class="fas fa-money-check"></i> Pay with Bank
        </div>
      </a>

      <h3 class="text-black font-medium text-center text-lg my-4">Or</h3>
      
      {{-- NOTE : PAYMENT BY PAYPAL --}}
      <div id="smart-button-container">
       <div style="text-align: center;">
         <div id="paypal-button-container"></div>
       </div>
     </div>
    </div>
  </div>
@endsection

@push('after-script')
<script src="https://www.paypal.com/sdk/js?client-id=sb&enable-funding=venmo&currency=USD" data-sdk-integration-source="button-factory"></script>
<script>
  function initPayPalButton() {
    paypal.Buttons({
      style: {
        shape: 'pill',
        layout: 'horizontal',
        label: 'paypal',
        tagline: false
      },

      createOrder: function(data, actions) {
        return actions.order.create({
          purchase_units: [{"amount":{"currency_code":"USD","value":1}}]
        });
      },

      onApprove: function(data, actions) {
        return actions.order.capture().then(function(orderData) {
          
          // Full available details
          console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));

          // Show a success message within this page, e.g.
          const element = document.getElementById('paypal-button-container');
          element.innerHTML = '';
          element.innerHTML = '<h3>Thank you for your payment!</h3>';
        });
      },

      onError: function(err) {
        console.log(err);
      }
    }).render('#paypal-button-container');
  }
  initPayPalButton();
</script>
@endpush