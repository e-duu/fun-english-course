@extends('layouts.dash')
@section('title')
  Fun English Course | Setting Moota
@endsection
@section('sub-title')
  Moota Settings
@endsection
@section('content')
  <form id="payments" action="{{ route('moota.store') }}" method="POST" class="px-4 py-3 bg-white rounded-lg shadow-md dark:bg-gray-800" enctype="multipart/form-data">
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
      <span class="text-gray-700 dark:text-gray-400">Account Holder Name</span>
      <input type="text" name="account_name" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray rounded-md border-gray-400" placeholder="John Duck" value="{{ $data == null ? '' : $data->account_name }}"/>
      @error('account_name')
        <div class="mt-1 text-sm text-[red]">
          <i class="fas fa-dot-circle text-xs"></i> {{ $message }}
        </div>
      @enderror
    </label>

    <label class="block text-sm mt-4">
      <span class="text-gray-700 dark:text-gray-400">Webhook URL</span>
      <input type="text" name="webhook_url" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray rounded-md border-gray-400" placeholder="John Duck" value="{{ $data == null ? '' : $data->webhook_url }}"/>
      @error('webhook_url')
        <div class="mt-1 text-sm text-[red]">
          <i class="fas fa-dot-circle text-xs"></i> {{ $message }}
        </div>
      @enderror
    </label>

    <div class="container">
      <h5>Province:</h5>
      <select id="js-choice" multiple>
        <option value="Sindh">Sindh</option>
        <option value="Punjab">Punjab</option>
        <option value="Balochistan">Balochistan</option>
        <option value="Fata">Fata</option>
        <option value="Federal Capital Territory">Federal Capital Territory</option>
        <option value="Khyber Pakhtunkhwa">Khyber Pakhtunkhwa</option>
      </select>
    </div>
    
    <button class="mt-4 bg-blue-600 py-2 px-7 rounded-md text-white">Submit</button>

  </form>
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
@endpush

@push('after-script')
  <script>
    const choices = new Choices("#js-choice", {
      removeItems: true,
      removeItemButton: true
    });
  </script>
@endpush