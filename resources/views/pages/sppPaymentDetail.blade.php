@extends('layouts.app')
@section('title')
    Fun English Course - Payment
@endsection
@section('content')
    <div class="container-fluid px-7 sm:px-20 mt-10 sm:mt-16">
    <div class="grid bg-gray-50 rounded-lg mx-auto shadow-xl w-11/12 md:w-9/12 lg:w-1/2">
      <div class="bg-blue-600 rounded-t-lg py-3 sm:py-6 sm:mb-5">
        <h1 class="text-white text-center font-bold text-xl sm:text-3xl">Payment Confirmation</h1>
      </div>
      
      <div class="flex-col mx-5 sm:mx-10 mt-5">
        <div class="flex-col">
          <p class="font-semibold text-sm sm:text-xl text-gray-700">
            @php
                $num = (str_pad((int)$data->invoice->numberInv , 8, '0', STR_PAD_LEFT));
            @endphp
            #INV-{{ $data->invoice->dateCode.$num }}
          </p>
          {{-- <p class="text-lg text-gray-500">
            {{ $data->created_at }} WIB
          </p> --}}
        </div>
        <div class="border-b-[3px] border-gray-400 my-1 sm:my-3"></div>
        <div class="grid grid-cols-1 my-4 items-center">
          @forelse ($dataBanks as $index => $bank)
            <div class="flex justify-between items-center">
              <div class="flex items-center">
                <img src="{{ $bank->icon }}" class="w-14 sm:w-28 h-6 sm:h-12">
                <div class="flex-col">
                  <p class="font-semibold text-[12px] sm:text-lg text-gray-700">
                    {{ $bank->atas_nama }}
                  </p>
                  <p class="font-semibold italic text-[10px] sm:text-sm text-gray-700">
                    {{ $bank->label }}
                  </p>
                  <input class="border-0 bg-transparent text-sm sm:text-xl font-bold text-gray-800 -ml-3" type="text" id="copy_{{ $index }}" value="{{ $bank->account_number }}">
                </div>
              </div>
              <button onclick="copyToClipboard('copy_{{ $index }}')" class="text-blue-600 font-semibold text-sm sm:text-lg">Copy</button>
            </div>
            <div class="border-b-[3px] border-gray-400 my-1 sm:my-3"></div>
          @empty
            <div class="text-center">
              <i class="fas fa-exclamation text-lg sm:text-xl text-red-500"> Warning...</i>
              <p class="text-red-500 font-semibold text-sm sm:text-lg">If there are problems when making payments or the account number does not appear, please contact the following Whatsapp number.</p>
              <div class="mt-6 my-2 ">
                <a href="https://api.whatsapp.com/send?phone=6281288882780" target="_blank" class='bg-blue-600 hover:bg-blue-700 rounded-lg shadow-xl font-bold text-md sm:text-xl text-white transition-colors duration-100 py-2 px-4 text-center'>0812 8888 2780</a>
              </div>
            </div>
          @endforelse

        </div>
        {{-- <div class="border-b-[3px] border-gray-400 my-1 sm:my-3"></div> --}}
        <div class="grid grid-cols-1 my-4 items-center">
          <div class="flex justify-between items-center">
            <div class="flex-col">
              <p class="font-bold text-sm sm:text-lg text-gray-500">
                Transfer Deadline
              </p>
              @php
                $date = date('Y-m-d H:i:s', strtotime($data->date)); 
              @endphp
              <p class="text-sm sm:text-lg font-bold text-gray-800">
                {{-- {{ date('Y-m-d H:i:s A', strtotime($date . ' +1 day')); }}  --}}
                {{ $data->dateEnd->format('d M Y H:i A') }}
              </p>
              <div class="flex">
                {{-- <div class="flex text-md font-bold text-gray-800 mr-2">
                  <p id="days" class="mr-2">00</p>
                  <span>Days</span>
                </div> --}}
                <div class="flex text-xs sm:text-md font-bold text-gray-800 mr-2">
                  <p id="hours" class="mr-2">00</p>
                  <span>hours</span>
                </div>
                <div class="flex text-xs sm:text-md font-bold text-gray-800 mr-2">
                  <p id="mins" class="mr-2">00</p>
                  <span>minutes</span>
                </div>
                <div class="flex text-xs sm:text-md font-bold text-gray-800 mr-2">
                  <p id="secs" class="mr-2">00</p>
                  <span>seconds</span>
                  <p class="ml-2">left</p>
                </div>
              </div>
            </div>

            <a href="#" class="text-blue-600 font-semibold text-sm sm:text-lg transition duration-150 ease-in-out" data-bs-toggle="tooltip" data-bs-placement="left" title="The transaction will be automatically canceled if it exceeds the transfer time limit"><i class="fas fa-exclamation-circle text-lg sm:text-xl text-red-500"></i></a>
          </div>
        </div>
        <div class="border-b-[3px] border-gray-400 my-1 sm:my-3"></div>
        <div class="grid grid-cols-1 my-4 items-center">
          <div class="flex justify-between items-center">
            <div class="flex-col">
              <p class="font-semibold text-sm sm:text-lg text-gray-500">
                Total Payment
              </p>
                @php
                    $price = $data->price + $data->code;
                @endphp
                <p class="text-xl sm:text-3xl text-gray-800 font-bold">
                  Rp {{ number_format(substr($price,0, -3), 0, '.', '.') }}.<span class="text-xl sm:text-3xl text-red-500 font-bold">{{ substr($price, -3) }}</span>
                </p>
              {{-- <p class="text-3xl font-bold text-yellow-500">
                Rp. {{ number_format($price) }}
              </p> --}}
              <input id="copyTextPrice" class="border-0 bg-transparent font-bold text-gray-800 -ml-3" type="hidden" value="{{ $price }}" disabled>
              <p class="text-red-500 text-xs sm:text-lg font-semibold">
                *Transfer up to the last 3 digits (unique code)
              </p>
            </div>
            <button id="copyBtnPrice" class="text-blue-600 font-semibold text-sm sm:text-lg -ml-10">Copy</button>
          </div>
        </div>

      </div>
      <div class='pt-2 sm:pt-10'>
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
    function copyToClipboard(id) {
        document.getElementById(id).select();
        document.execCommand('copy');
        Swal.fire({         //displays a pop up with sweetalert
          icon: 'success',
          title: 'Text copied to clipboard',
          showConfirmButton: false,
          timer: 1000
      });
    }
</script>

<script>
  const copyBtnPrice = document.getElementById('copyBtnPrice')
  const copyTextPrice = document.getElementById('copyTextPrice')
  
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