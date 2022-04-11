@extends('layouts.dash')
@section('title')
  Fun English Course | Spp Edit
@endsection
@section('sub-title')
  Edit Spp
@endsection
@section('content')
  <form action="{{ route('spp.update', $data->id) }}" method="POST" class="px-4 py-3 bg-white rounded-lg shadow-md dark:bg-gray-800">
    @csrf

    <label class="block mt-4 text-sm">
      <span class="text-gray-700 dark:text-gray-400">
        Student Name
      </span>
      <select name="user_id" class="block w-full mt-1 text-sm rounded-md border-gray-400  dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:focus:shadow-outline-gray">
        @foreach ($users as $user)
          <option value="{{ $user->id }}" {{ $user->id == $data->user_id ? 'selected' : '' }}>{{ $user->name }}</option>
        @endforeach
      </select>
      @error('user_id')
        <div class="mt-1 text-sm text-[red]">
          <i class="fas fa-dot-circle text-xs"></i> {{ $message }}
        </div>
      @enderror
    </label>

    <label class="block mt-4 text-sm">
        <span class="text-gray-700 dark:text-gray-400">
          Level
        </span>
        <select name="level_id" class="block w-full mt-1 text-sm rounded-md border-gray-400  dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:focus:shadow-outline-gray">
          @foreach ($levels as $level)
            <option value="{{ $level->level->id }}" {{ $level->id == $data->level_id ? 'selected' : '' }}>{{ $level->level->name }}</option>
          @endforeach
        </select>
        @error('level_id')
          <div class="mt-1 text-sm text-[red]">
            <i class="fas fa-dot-circle text-xs"></i> {{ $message }}
          </div>
        @enderror
    </label>

    {{-- Coba --}}
    <input type="hidden" value="unpaid" name="status">

    <label class="block mt-4 text-sm">
      <span class="text-gray-700 dark:text-gray-400">
        Month
      </span>
      <select name="month" class="block w-full mt-1 text-sm rounded-md border-gray-400  dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:focus:shadow-outline-gray">
        <option value="1" {{$data->month == '1' ? 'selected' : ''}}>January</option>
        <option value="2" {{$data->month == '2' ? 'selected' : ''}}>February</option>
        <option value="3" {{$data->month == '3' ? 'selected' : ''}}>March</option>
        <option value="4" {{$data->month == '4' ? 'selected' : ''}}>April</option>
        <option value="5" {{$data->month == '5' ? 'selected' : ''}}>May</option>
        <option value="6" {{$data->month == '6' ? 'selected' : ''}}>June</option>
        <option value="7" {{$data->month == '7' ? 'selected' : ''}}>July</option>
        <option value="8" {{$data->month == '8' ? 'selected' : ''}}>August</option>
        <option value="9" {{$data->month == '9' ? 'selected' : ''}}>September</option>
        <option value="10" {{$data->month == '10' ? 'selected' : ''}}>October</option>
        <option value="11" {{$data->month == '11' ? 'selected' : ''}}>November</option>
        <option value="12" {{$data->month == '12' ? 'selected' : ''}}>December</option>
      </select>
      @error('month')
        <div class="mt-1 text-sm text-[red]">
          <i class="fas fa-dot-circle text-xs"></i> {{ $message }}
        </div>
      @enderror
    </label>

    <label class="block text-sm mt-4">
      <span class="text-gray-700 dark:text-gray-400">Price</span>
      <input type="number" name="price" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray rounded-md border-gray-400" placeholder="30000" value="{{ $data->price }}"/>
      @error('price')
        <div class="mt-1 text-sm text-[red]">
          <i class="fas fa-dot-circle text-xs"></i> {{ $message }}
        </div>
      @enderror
    </label>

    <button class="mt-4 bg-blue-600 py-2 px-7 rounded-md text-white">Submit</button>

  </form>
@endsection


