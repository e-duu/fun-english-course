@extends('layouts.dash')
@section('title')
  Fun English Course | Payment Creates
@endsection
@section('sub-title')
  Create Payments
@endsection
@section('content')
  <form action="{{ route('payment.store') }}" method="POST" class="px-4 py-3 bg-white rounded-lg shadow-md dark:bg-gray-800" enctype="multipart/form-data">
    @csrf

    <label class="block mt-4 text-sm">
      <span class="text-gray-700 dark:text-gray-400">
        Student Name
      </span>
      <select name="user_id" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
        @foreach ($users as $user)
          <option value="{{ $user->id }}" >{{ $user->name }}</option>
        @endforeach
      </select>
    </label>


    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-8 mt-5 mx-7">
      <div class="grid grid-cols-1">
        <label class="block mt-4 text-sm">
          <span class="text-gray-700 dark:text-gray-400">
            Program
          </span>
          <select name="program_id" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
            @foreach ($programs as $program)
              <option value="{{ $program->id }}" >{{ $program->name }}</option>
            @endforeach
          </select>
        </label>
      </div>

      <div class="grid grid-cols-1">
        <label class="block mt-4 text-sm">
          <span class="text-gray-700 dark:text-gray-400">
            Level
          </span>
          <select name="level_id" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
            @foreach ($levels as $level)
              <option value="{{ $level->id }}" >{{ $level->name }}</option>
            @endforeach
          </select>
        </label>
      </div>
    </div>
    
    <label class="block mt-4 text-sm">
      <span class="text-gray-700 dark:text-gray-400">
        Recipient Bank
      </span>
      <select name="recipient_id" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
        @foreach ($recipients as $recipient)
          <option value="{{ $recipient->id }}" >{{ $recipient->name }}</option>
        @endforeach
      </select>
    </label>

    <label class="block text-sm" style="margin-top: 20px">
      <span class="text-gray-700 dark:text-gray-400">Amount</span>
      <input type="number" name="amount" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="3"/>
    </label>

    <label class="block text-sm" style="margin-top: 20px">
      <span class="text-gray-700 dark:text-gray-400">Payment Receipt</span>
      <input type="file" name="evidence" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"/>
    </label>

    <label class="block mt-4 text-sm">
      <span class="text-gray-700 dark:text-gray-400">Notes</span>
      <textarea name="note" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" rows="3" placeholder="Enter some long content."
      ></textarea>
    </label>
    
    <button style="padding: 8px 20px; background-color: blueviolet; margin-top: 20px;" class="rounded-md text-white">Sumbit</button>

  </form>
@endsection


