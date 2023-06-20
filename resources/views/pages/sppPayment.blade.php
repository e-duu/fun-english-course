@extends('layouts.app')
@section('title')
    Fun English Course - Payment
@endsection
@section('content')


<div class="container-fluid px-7 sm:px-20 mt-10 sm:mt-16">

  @if (session('failed'))
  <div class="grid mx-auto rounded-lg shadow-xl w-11/12 md:w-9/12 lg:w-1/2 mb-4">
    <div class="py-4 px-5 bg-blue-600 overflow-hidden rounded-lg shadow-xs items-center">
      <div class="flex text-white text-center font-bold text-base">
        <i class="fas fa-bell text-xl mr-3"></i>
        <p>{{ session('failed') }}</p>
      </div>
    </div>
  </div>
  @endif
  <div class="grid bg-gray-50 rounded-lg mx-auto shadow-xl w-11/12 md:w-9/12 lg:w-1/2">
      <div class="bg-blue-600 rounded-t-lg py-3 sm:py-6 sm:mb-5">
        <h1 class="text-white text-center font-bold text-xl sm:text-3xl">Payment Confirmation</h1>
      </div>

      <div class="flex-col mx-5 sm:mx-10 ">
        <div class="grid grid-cols-2 my-4 items-center">
          <p class="text-xs sm:text-lg text-gray-700">Invoice Number</p>
          <p class="font-semibold text-xs sm:text-lg text-gray-700 text-right">
            @php
                $num = (str_pad((int)$data->invoice->numberInv , 8, '0', STR_PAD_LEFT));
            @endphp
            INV-{{ $data->invoice->dateCode.$num }}
          </p>
        </div>
        <div class="grid grid-cols-2 my-4 items-center">
          <p class="text-xs sm:text-lg text-gray-700">Student's Name</p>
          <p class="font-semibold text-xs sm:text-lg text-gray-700 text-right">
            {{ Auth::user()->name }}
          </p>
        </div>
        <div class="grid grid-cols-2 my-4 items-center">
          <p class="text-xs sm:text-lg text-gray-700">Parent's Name</p>
          <p class="font-semibold text-xs sm:text-lg text-gray-700 text-right">
            {{ Auth::user()->parent }}
          </p>
        </div>
        <div class="grid grid-cols-2 my-4 items-center">
          <p class="text-xs sm:text-lg text-gray-700">City</p>
          <p class="font-semibold text-xs sm:text-lg text-gray-700 text-right">
            {{ Auth::user()->city }}
          </p>
        </div>
        <div class="grid grid-cols-2 my-4 items-center">
          <p class="text-xs sm:text-lg text-gray-700">Country</p>
          <p class="font-semibold text-xs sm:text-lg text-gray-700 text-right">
            {{ Auth::user()->country }}
          </p>
        </div>
        <div class="grid grid-cols-2 my-4 items-center">
          <p class="text-xs sm:text-lg text-gray-700">Month</p>
          <p class="font-semibold text-xs sm:text-lg text-gray-700 text-right">
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
          <p class="text-xs sm:text-lg text-gray-700">Year</p>
          <p class="font-semibold text-xs sm:text-lg text-gray-700 text-right">
            {{ $data->year }}
          </p>
        </div>
        <div class="grid grid-cols-2 my-4 items-center">
          <p class="text-xs sm:text-lg text-gray-700">Program</p>
          <p class="font-semibold text-xs sm:text-lg text-gray-700 text-right">
            {{ $data->level->program->name }}
          </p>
        </div>
        <div class="grid grid-cols-2 my-4 items-center">
          <p class="text-xs sm:text-lg text-gray-700">Level</p>
          <p class="font-semibold text-xs sm:text-lg text-gray-700 text-right">
            {{ $data->level->name }}
          </p>
        </div>
        <div class="grid grid-cols-2 my-4 items-center">
          <p class="text-xs sm:text-lg text-gray-700">Status</p>
          <p class="font-semibold text-xs sm:text-lg uppercase @if($data->status == 'paid' || $data->status == 'paid_manually') text-green-500 @else text-red-500 @endif text-right">
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
          <p class="text-xs sm:text-lg text-gray-700">Price Amount</p>
          <p class="font-semibold text-xs sm:text-lg text-gray-700 text-right">
            {{ $data->currency == 'USD' ? '$ '.$data->price: 'Rp '.number_format($data->price, 0, ',', ',') }}
          </p>
        </div>
      </div>
      <div class='w-full bg-blue-600 rounded-b-lg shadow-xl font-bold text-xs sm:text-lg text-white transition-colors duration-100 py-3 sm:py-5 grid grid-cols-2 px-5 sm:px-10 mt-5 sm:mt-10 items-center'>
        <div class=''>Total<br>Payment</div>
        <div class='font-semibold text-sm sm:text-xl text-white text-right'>
            {{ $data->currency == 'USD' ? '$ '.$data->price: 'Rp '.number_format($data->price, 0, ',', ',') }}
        </div>
      </div>
    </div>

    @php
        $transaction = App\Models\Transaction::where('student_id', $data->id)->first();
    @endphp

      {{-- @if (!$transaction && $data->status != 'paid' && $data->status != 'paid_manually')
        <div class="rounded-lg mx-auto w-11/12 md:w-9/12 lg:w-1/2 mt-10 sm:mt-12">
            @if ($data->currency != 'USD')
                NOTE : PAYMENT BY MOOTA
                <a href="{{ route('spp-payment-detail', $data->id) }}">
                    <div class="rounded-full py-3 sm:py-4 bg-blue-600 text-white font-bold text-sm sm:text-xl text-center">
                    <i class="fas fa-money-check"></i>
                    @if ($data->status == 'pending')
                        Continue Payment
                    @else
                        Pay with Bank
                    @endif
                    </div>
                </a>
                
            @else
                @if ($data->status != 'pending')
                  NOTE : PAYMENT BY PAYPAL
                  <div id="smart-button-container">
                    <div style="text-align: center;">
                    <div id="paypal-button-container"></div>
                    </div>
                  </div>
                @endif
            @endif

        </div>
      @endif --}}
    {{-- pay by ipaymu --}}

    
    <div class="rounded-lg mx-auto w-11/12 md:w-9/12 lg:w-1/2 mt-10 sm:mt-12">
      @if (!$transaction && $data->status == 'unpaid')
        <a href="{{ route('createInvoice', $data->id) }}">
          <div class="rounded-full py-3 sm:py-4 sm:mt-10 bg-blue-600 text-white font-bold text-sm sm:text-xl text-center">
          <i class="fas fa-money-check"></i>
          {{-- @if ($data->status == 'pending')
              Continue Payment
          @else
          @endif --}}
            Pay
          </div>
        </a>
      @else
        <a href="{{$transaction->payment_link}}">
          <div class="rounded-full py-3 sm:py-4 sm:mt-10 bg-blue-600 text-white font-bold text-sm sm:text-xl text-center">
          <i class="fas fa-money-check"></i>
              Continue Payment
          </div>
        </a>
      @endif
    </div>
  </div>
@endsection

@push('after-script')
<script src="https://www.paypal.com/sdk/js?client-id=AVGe_Clbw8MyQC-AyvivdfBtQoeXKWEXdRbakt9dCGD6av_HLW8_wjxTs6MARf1mBQ-rVyvSF7AhHDnt&enable-funding=venmo&currency=USD" data-sdk-integration-source="button-factory"></script>
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
        return fetch('{{route("create.order.spp", $data->id)}}', {
            method: 'post',
        }).then(function(res) {
            return res.json()
        }).then(function(orderData) {
            return orderData.id
        });
      },

      onApprove: function(data, actions) {
        return fetch('{{route("capture.order.spp", $data->id)}}', {
            method: 'post',
            body:JSON.stringify({
                orderId:data.orderID,
            })
        }).then(function(res) {
            return res.json();
        }).then(function(orderData) {
            var errorDetail = Array.isArray(orderData.details) && orderData.details[0];

            if (errorDetail && errorDetail.issue === 'INSTRUMENT_DECLINED') {
                return actions.restart();
            }

            if (errorDetail) {
                var msg = 'Maaf, transaksi Anda tidak dapat diproses.';
                if(errorDetail.description) msg += '\n\n' + errorDetail.description;
                if(orderData.debug_id) msg += ' ('+ orderData.debug_id +')';
                return alert(msg);
            }

            console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
            // var transaction = orderData.purchase_units[0].payments.captures[0];
            // alert('Transaction ' + transaction.status + ': ' + transaction.id + '\n\nSee console for all available details');

            // const element = document.getElementById('paypal-button-container');
            // element.innerHTML = '';
            // element.innerHTML = '<h3>Thank you for your payment!</h3>'

            window.location.replace("{{route('spp-payment-success')}}");
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
