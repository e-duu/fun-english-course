@extends('layouts.dash')
@section('title')
  Fun English Course | Setting Moota
@endsection
@section('sub-title')
  Moota Settings
@endsection

@section('content')
  <label class="block text-sm mt-4">
    <span class="text-gray-700 dark:text-white">Webhook URL</span>
    <div class="flex justify-between items-center bg-blue-400 rounded py-2 px-5">
      <div class="bg-blue-400 rounded">
        <p class="font-semibold text-lg text-white">
          {{ route('payment-webhook') }}
        </p>
        <input id="copyText" class="border-0 bg-transparent text-xl font-bold text-gray-800 -ml-3 hidden" type="text" value="{{ route('payment-webhook') }}" disabled>
      </div>
      <button id="copyBtn" class="text-white font-semibold text-lg">Copy</button>
    </div>
    @error('price')
      <div class="mt-1 text-sm text-[red]">
        <i class="fas fa-dot-circle text-xs"></i> {{ $message }}
      </div>
    @enderror
  </label>

  @php
      $banks = App\Models\AccountBank::get();
  @endphp
  
  <div class="block text-sm mt-4">
    <div class="text-gray-700 dark:text-white">Nomor rekening yg di gunakan:</div>
      <div class="d-flex justify-between">
        <div>
          @foreach ($banks as $bank)
            <div class="bg-blue-400 rounded inline-block p-2">
              <table>
                <tr>
                  <td>Nama</td>
                  <td class="pl-2">:</td>
                  <td class="pl-2">{{ $bank->account_name }}</td>
                </tr>
                <tr>
                  <td>Type</td>
                  <td class="pl-2">:</td>
                  <td class="pl-2">{{ $bank->type }}</td>
                </tr>
                <tr>
                  <td>No Rekening</td>
                  <td class="pl-2">:</td>
                  <td class="pl-2">{{ $bank->account_number }}</td>
                </tr>
              </table>
            </div>
          @endforeach
        </div>

        <div class="mt-4">
          <a href="{{ route('moota.get-bank') }}" class="bg-blue-600 py-2 px-4 rounded-md text-white">Tautankan rekening di moota</a>
        </div>
      </div>
  </div>
  {{-- @endif --}}
@endsection

@push('after-style')
  <style>
    .container {
      margin-top: 50px;
    }
    .choices__inner {
      border-radius: 0px;
    }
    .choices__list--multiple .choices__item {
      background-color: #0071BC;
      border: 1px solid #0071BC;
      border-radius: 0px;
    }
  </style>
  <!-- choices css -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css"/>
  <!-- choices script -->
  <script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>

@endpush

@push('after-script')
  <script>
    const choices = new Choices("#js-choice", {
      removeItems: true,
      removeItemButton: true
    });
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