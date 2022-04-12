@extends('layouts.dash')
@section('title')
  Fun English Course | Setting Moota
@endsection
@section('sub-title')
  Moota Settings
@endsection

@section('content')
  {{-- <form id="payments" action="{{ route('moota.store') }}" method="POST" class="px-4 py-3 bg-white rounded-lg shadow-md dark:bg-gray-800" enctype="multipart/form-data">
    @csrf

    <label class="block text-sm mt-4">
      <span class="text-gray-700 dark:text-gray-400">API Key</span>
      <input type="text" name="api_key" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray rounded-md border-gray-400" value="{{ $data == null ? '' : $data->api_key }}"/>
      @error('api_key')
        <div class="mt-1 text-sm text-[red]">
          <i class="fas fa-dot-circle text-xs"></i> {{ $message }}
        </div>
      @enderror
    </label>

    <label class="block text-sm mt-4">
      <span class="text-gray-700 dark:text-gray-400">Webhook URL</span>
      <input value="https://funenglishcourse.com/payment/moota" type="text" name="webhook_url" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray rounded-md border-gray-400" placeholder="" value="{{ $data == null ? '' : $data->webhook_url }}"/>
      @error('webhook_url')
        <div class="mt-1 text-sm text-[red]">
          <i class="fas fa-dot-circle text-xs"></i> {{ $message }}
        </div>
      @enderror
    </label>

    <button class="mt-4 bg-blue-600 py-2 px-7 rounded-md text-white">Submit</button>


  </form> --}}

  <div class="flex justify-between items-center">
    <div class="flex-col">
      <span class="text-gray-700 dark:text-gray-400">Webhook URL</span>
      <p class="font-semibold text-lg text-gray-700">
        {{ route('cek-notif-transfer') }}
      </p>
      <input id="copyText" class="border-0 bg-transparent text-xl font-bold text-gray-800 -ml-3 hidden" type="text" value="{{ route('cek-notif-transfer') }}" disabled>
    </div>
    <button id="copyBtn" class="text-blue-600 font-semibold text-lg">Copy</button>
  </div>

  @php
      $banks = App\Models\AccountBank::get();
  @endphp
  
  @if ($data)
  {{-- <label class="block text-sm mt-4">
    <div class="text-gray-700 dark:text-gray-400">Nama pemilik rekening</div>
    <div class="bg-blue-400 rounded inline-block p-2">{{ $banks->first()->account_name }}</div>
    <input type="text" name="account_name" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray rounded-md border-gray-400" placeholder="John Duck" value="{{ $data == null ? '' : $data->account_name }}"/>
    @error('account_name')
      <div class="mt-1 text-sm text-[red]">
        <i class="fas fa-dot-circle text-xs"></i> {{ $message }}
      </div>
    @enderror
  </label> --}}
  <div class="block text-sm mt-4">
    <div class="text-gray-700 dark:text-gray-400">Nomor rekening yg di gunakan:</div>
      <div class="d-flex justify-between">
        <div>
          @foreach ($banks as $bank)
            <div class="bg-blue-400 rounded inline-block p-2">
              {{-- <p>Name : {{ $bank->account_name }}</p>
              <p>Type : {{ $bank->type }}</p>
              <p>No Rekening : {{ $bank->account_number }}</p> --}}
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
    {{-- <select name="account" id="js-choice" multiple class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray rounded-md border-gray-400 -600 dark:bg-gray-700 form-select focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:focus:shadow-outline-gray">
      @foreach ($banks as $bank)
        <option value="{{ $bank->account_number}} {{ $bank->account_number ? 'selected' : '' }}">{{ $bank->type }} {{ $bank->account_number }}</option>
      @endforeach
    </select>
    @error('account_number')
      <div class="mt-1 text-sm text-[red]">
        <i class="fas fa-dot-circle text-xs"></i> {{ $message }}
      </div>
    @enderror --}}
    
  </div>
  @endif
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