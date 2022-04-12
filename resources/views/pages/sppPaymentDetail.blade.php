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
        <div class="flex-col">
          <p class="font-semibold text-xl text-gray-700">
            #KPPTM13702
          </p>
          <p class="text-lg text-gray-500">
            {{ $data->created_at }} WIB
          </p>
        </div>
        <div class="border-b-[3px] border-gray-400 my-3"></div>
        <div class="grid grid-cols-1 my-4 items-center">
          @forelse ($account_banks as $bank)
          <div class="flex justify-between items-center">
            <div class="flex-col">
              <img src="{{ asset('images/mandiri.png') }}" class="max-h-8 mb-2">
              <p class="font-semibold text-lg text-gray-700">
                {{ $bank->account_name }}
              </p>
              <input id="copyText" class="border-0 bg-transparent text-xl font-bold text-gray-800 -ml-3" type="text" value="{{ $bank->account_number }}" disabled>
            </div>
            <button id="copyBtn" class="text-blue-600 font-semibold text-lg">Copy</button>
          </div>
          @empty
          <p class="text-xl font-bold text-gray-800">
            Account bank not found
          </p>
          @endforelse
        </div>
        <div class="border-b-[3px] border-gray-400 my-3"></div>
        <div class="grid grid-cols-1 my-4 items-center">
          <div class="flex justify-between items-center">
            <div class="flex-col">
              <p class="font-bold text-lg text-gray-500">
                Transfer Deadline
              </p>
              <p class="text-lg font-bold text-gray-800">
                {{ $data->created_at }} WIB
              </p>
              <p class="text-md font-bold text-gray-800">
                11 hour 59 minute 56 second left
              </p>
            </div>
            <a href="#" class="text-blue-600 font-semibold text-lg"><i class="fas fa-exclamation-circle text-xl text-red-500"></i></a>
          </div>
        </div>
        <div class="border-b-[3px] border-gray-400 my-3"></div>
        <div class="grid grid-cols-1 my-4 items-center">
          <div class="flex justify-between items-center">
            <div class="flex-col">
              <p class="font-semibold text-gray-500">
                Total Payment
              </p>
                @php
                    // $price = substr($data->price, 0, -3);
                    $price = $data->price + $data->code;
                @endphp
              <p class="text-3xl font-bold text-gray-800">
                Rp. {{ number_format($price) }}
              </p>
              <input id="copyTextPrice" class="border-0 bg-transparent text-3xl font-bold text-gray-800 -ml-3" type="hidden" value="{{ $price }}" disabled>
              <p class="text-red-500 font-semibold">
                *Transfer up to the last 3 digits
              </p>
              <p class="text-gray-500 font-semibold">
                Unique code nominal still goes to the bone
              </p>
            </div>
            <button id="copyBtnPrice" class="text-blue-600 font-semibold text-lg -ml-10">Copy</button>
          </div>
        </div>

      </div>
      <div class='flex items-center justify-center pt-10'>
        {{-- <button class='w-full bg-blue-600 hover:bg-blue-700 rounded-b-lg shadow-xl font-bold text-md sm:text-xl text-white transition-colors duration-100 py-3 sm:py-5' type="submit">Done</button> --}}
<<<<<<< HEAD
        <a href="{{ route('cek-notif-transfer') }}" class='w-full bg-blue-600 hover:bg-blue-700 rounded-b-lg shadow-xl font-bold text-md sm:text-xl text-white transition-colors duration-100 py-3 sm:py-5'>Done</a>
=======
        <a href="{{ route('payment-webhook') }}" class='w-full bg-blue-600 hover:bg-blue-700 rounded-b-lg shadow-xl font-bold text-md sm:text-xl text-white transition-colors duration-100 py-3 sm:py-5 text-center'>Done</a>
>>>>>>> ff2d37bd4cc1ad67a89f908edccc302612d2fccc
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
  const copyBtn = document.getElementById('copyBtn');
  const copyText = document.getElementById("copyText");
  const copyBtnPrice = document.getElementById('copyBtnPrice')
  const copyTextPrice = document.getElementById('copyTextPrice')
  
  // NOTE : COPY TO CLIPBOARD
  copyBtn.onclick = () => {
    copyText.select();    // Selects the text inside the input
    navigator.clipboard.writeText(copyText.value);
      Swal.fire({         //displays a pop up with sweetalert
        icon: 'success',
        title: 'Text copied to clipboard',
        showConfirmButton: false,
        timer: 1000
    });
  }

  // NOTE : COPY TO CLIPBOARD PRICE
  copyBtnPrice.onclick = () => {
    copyTextPrice.select();    // Selects the text inside the input
    navigator.clipboard.writeText(copyTextPrice.value);
      Swal.fire({         //displays a pop up with sweetalert
        icon: 'success',
        title: 'Text copied to clipboard',
        showConfirmButton: false,
        timer: 1000
    });
  }
</script>
@endpush