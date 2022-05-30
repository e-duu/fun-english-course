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
            @php
                $num = (str_pad((int)$data->invoice->numberInv , 8, '0', STR_PAD_LEFT));
            @endphp
            INV-{{ $data->invoice->dateCode.$num }}
          </p>
          {{-- <p class="text-lg text-gray-500">
            {{ $data->created_at }} WIB
          </p> --}}
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
          <div class="flex justify-between items-center">
            <div class="flex-col">
              <img src="{{ asset('images/mandiri.png') }}" class="max-h-8 mb-2">
              <p class="font-semibold text-lg text-gray-700">
                PT Edukasi Diversitas Global Excelsia 
              </p>
              <input id="copyText" class="border-0 bg-transparent text-xl font-bold text-gray-800 -ml-3" type="text" value="0700010372956" disabled>
            </div>
            <button id="copyBtn" class="text-blue-600 font-semibold text-lg">Copy</button>
          </div>
          <div class="border-b-[3px] border-gray-400 my-3"></div>
          <div class="flex justify-between items-center">
            <div class="flex-col">
              <img src="{{ asset('images/bca.png') }}" class="max-h-8 mb-2">
              <p class="font-semibold text-lg text-gray-700">
                PT Edukasi Diversitas Global Excelsia 
              </p>
              <input id="copyText1" class="border-0 bg-transparent text-xl font-bold text-gray-800 -ml-3" type="text" value="5865408754" disabled>
            </div>
            <button id="copyBtn1" class="text-blue-600 font-semibold text-lg">Copy</button>
          </div>
          @endforelse
        </div>
        <div class="border-b-[3px] border-gray-400 my-3"></div>
        <div class="grid grid-cols-1 my-4 items-center">
          <div class="flex justify-between items-center">
            <div class="flex-col">
              <p class="font-bold text-lg text-gray-500">
                Transfer Deadline
              </p>
              @php
                $date = date('Y-m-d H:i:s', strtotime($data->date)); 
              @endphp
              <p class="text-lg font-bold text-gray-800">
                {{-- {{ date('Y-m-d H:i:s A', strtotime($date . ' +1 day')); }}  --}}
                {{ $data->dateEnd->format('d M Y H:i A') }}
              </p>
              <div class="flex">
                {{-- <div class="flex text-md font-bold text-gray-800 mr-2">
                  <p id="days" class="mr-2">00</p>
                  <span>Days</span>
                </div> --}}
                <div class="flex text-md font-bold text-gray-800 mr-2">
                  <p id="hours" class="mr-2">00</p>
                  <span>hours</span>
                </div>
                <div class="flex text-md font-bold text-gray-800 mr-2">
                  <p id="mins" class="mr-2">00</p>
                  <span>minutes</span>
                </div>
                <div class="flex text-md font-bold text-gray-800 mr-2">
                  <p id="secs" class="mr-2">00</p>
                  <span>seconds</span>
                  <p class="ml-2">left</p>
                </div>
              </div>
            </div>

            <a href="#" class="text-blue-600 font-semibold text-lg transition duration-150 ease-in-out" data-bs-toggle="tooltip" data-bs-placement="left" title="The transaction will be automatically canceled if it exceeds the transfer time limit"><i class="fas fa-exclamation-circle text-xl text-red-500"></i></a>
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
            </div>
            <button id="copyBtnPrice" class="text-blue-600 font-semibold text-lg -ml-10">Copy</button>
          </div>
        </div>

      </div>
      <div class='pt-10'>
        <a href="{{ route('spp-payment-cancel', $data->id) }}" class='block w-full border-2 border-blue-600 hover:bg-blue-700 hover:text-white mb-2 shadow-xl font-bold text-md sm:text-xl text-blue-600 transition-colors duration-100 py-3 sm:py-5 text-center'>Cancel transaction</a>
        <a href="{{ route('spp-payment', $data->id) }}" class='block w-full bg-blue-600 hover:bg-blue-700 rounded-b-lg shadow-xl font-bold text-md sm:text-xl text-white transition-colors duration-100 py-3 sm:py-5 text-center'>Back</a>
        
        {{-- <a href="{{ route('payment-webhook') }}" class='w-full bg-blue-600 hover:bg-blue-700 rounded-b-lg shadow-xl font-bold text-md sm:text-xl text-white transition-colors duration-100 py-3 sm:py-5 text-center'>Done</a> --}}
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
  const copyBtn1 = document.getElementById('copyBtn1');
  const copyText = document.getElementById("copyText");
  const copyText1 = document.getElementById("copyText1");
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

  copyBtn1.onclick = () => {
    copyText1.select();    // Selects the text inside the input
    navigator.clipboard.writeText(copyText1.value);
      Swal.fire({         //displays a pop up with sweetalert
        icon: 'success',
        title: 'Text copied to clipboard',
        showConfirmButton: false,
        timer: 1000
    });
  }
</script>

<script>
    
    var countDownDate = new Date("{{$data['dateEnd']}}").getTime();

    var myfunc = setInterval(function() {
        var now = new Date().getTime();
        var timeleft = countDownDate - now;
    
        // var days = Math.floor(timeleft / (1000 * 60 * 60 * 24));
        var hours = Math.floor((timeleft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((timeleft % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((timeleft % (1000 * 60)) / 1000);


        // document.getElementById("days").innerHTML = days
        document.getElementById("hours").innerHTML = hours
        document.getElementById("mins").innerHTML = minutes
        document.getElementById("secs").innerHTML = seconds

        if (timeleft < 0) {
            clearInterval(myfunc);
            // document.getElementById("days").innerHTML = "00"
            document.getElementById("hours").innerHTML = "00" 
            document.getElementById("mins").innerHTML = "00"
            document.getElementById("secs").innerHTML = "00"
            // document.getElementById("end").innerHTML = "TIME UP!!";
        }
    }, 1000)
</script>

@endpush