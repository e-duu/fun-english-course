@extends('layouts.dash')
@section('title')
  Fun English Course | User Create
@endsection
@section('sub-title')
  Create Users
@endsection
@section('content')

  @php
    $admin = [
      'value' => 'admin',
      'name' => 'Admin',
    ];

    $teacher = [
      'value' => 'teacher',
      'name' => 'Teacher',
    ];

    $student = [
      'value' => 'student',
      'name' => 'Student',
    ];

    $active = [
      'value' => 'active',
      'name' => 'Active',
    ];

    $nonActive = [
      'value' => 'non-active',
      'name' => 'Non-active',
    ];

    $roles = [$admin, $teacher, $student];
    $statuses = [$active, $nonActive];
  @endphp

  <form action="{{ route('user.store') }}" method="POST" class="px-4 py-3 bg-white rounded-lg shadow-md dark:bg-gray-800" enctype="multipart/form-data">
    @csrf

    <label class="block text-sm" style="margin-top: 20px">
      <span class="text-gray-700 dark:text-gray-400">Name</span>
      <input type="text" name="name" class="border w-full mt-1 text-sm border-gray-400  dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray rounded-md" value="{{ old('name') }}" placeholder="John Doe"/>
      @error('name')
        <div class="mt-2 text-[red]">
          <i class="fas fa-dot-circle"></i> {{ $message }}
        </div>
      @enderror
    </label>

    <label class="block text-sm" style="margin-top: 20px">
      <span class="text-gray-700 dark:text-gray-400">Number</span>
      <input type="text" name="number" class="border w-full mt-1 text-sm border-gray-400  dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray rounded-md" value="{{ old('number') }}" placeholder="000000"/>
      <span class="text-gray-500 dark:text-gray-200">*student numbers cannot start with zero</span>
      @error('number')
        <div class="mt-2 text-[red]">
          <i class="fas fa-dot-circle"></i> {{ $message }}
        </div>
      @enderror
      @if (session()->has('error'))
        <div class="mt-2 text-[red]">
            <i class="fas fa-dot-circle"></i> {{ session()->get('error') }}
        </div>
      @endif
    </label>

    <label class="block text-sm" style="margin-top: 20px">
      <span class="text-gray-700 dark:text-gray-400">Parent</span>
      <input type="text" name="parent" class="border w-full mt-1 text-sm border-gray-400  dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray rounded-md" value="{{ old('parent') }}" placeholder="John Doe"/>
      @error('parent')
        <div class="mt-2 text-[red]">
          <i class="fas fa-dot-circle"></i> {{ $message }}
        </div>
      @enderror
    </label>

    <label class="block text-sm" style="margin-top: 20px">
      <span class="text-gray-700 dark:text-gray-400">City</span>
      <input type="text" name="city" class="border w-full mt-1 text-sm border-gray-400  dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray rounded-md" value="{{ old('city') }}" placeholder="John Doe"/>
      @error('city')
        <div class="mt-2 text-[red]">
          <i class="fas fa-dot-circle"></i> {{ $message }}
        </div>
      @enderror
    </label>

    <label class="block text-sm" style="margin-top: 20px">
      <span class="text-gray-700 dark:text-gray-400">Country</span>
      <input type="text" name="country" class="border w-full mt-1 text-sm border-gray-400  dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray rounded-md" value="{{ old('country') }}" placeholder="John Doe"/>
      @error('country')
        <div class="mt-2 text-[red]">
          <i class="fas fa-dot-circle"></i> {{ $message }}
        </div>
      @enderror
    </label>

    <div class="mt-4 text-sm">
      <span class="text-gray-700 dark:text-gray-400">
        Status
      </span>
      <div class="mt-2">
        @foreach ($statuses as $status)
          <label class="inline-flex items-center text-gray-600 dark:text-gray-400 mr-4">
            <input {{$status['value'] == old('status') ? 'checked' : ''}} type="radio" class="text-blue-600 form-radio focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:focus:shadow-outline-gray" name="status" value="{{ $status['value'] }}" />
            <span class="ml-2">{{ $status['name'] }}</span>
          </label>
        @endforeach
      </div>
    </div>

    <label class="block text-sm" style="margin-top: 20px">
      <span class="text-gray-700 dark:text-gray-400">Username</span>
      <input type="text" name="username" class="border w-full mt-1 text-sm border-gray-400  dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray rounded-md" value="{{ old('username') }}" placeholder="johndoeck"/>
      @error('username')
        <div class="mt-2 text-[red]">
          <i class="fas fa-dot-circle"></i> {{ $message }}
        </div>
      @enderror
    </label>

    <label class="block text-sm" style="margin-top: 20px">
      <span class="text-gray-700 dark:text-gray-400">Password</span>
      <input type="password" name="password" class="border w-full mt-1 text-sm border-gray-400  dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray rounded-md" value="{{ old('password') }}" placeholder="********"/>
      <span class="text-gray-500 dark:text-gray-200">Password combination of at least 6 characters</span>
      @error('password')
      <div class="mt-2 text-[red]">
        <i class="fas fa-dot-circle"></i> {{ $message }}
      </div>
      @enderror
    </label>
    
    <div class="mt-4 text-sm">
      <span class="text-gray-700 dark:text-gray-400">
        Role
      </span>
      <div class="mt-2">
        @foreach ($roles as $role)
          <label class="inline-flex items-center text-gray-600 dark:text-gray-400 mr-4">
            <input {{$role['value'] == old('role') ? 'checked' : ''}} type="radio" class="text-blue-600 form-radio focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:focus:shadow-outline-gray" name="role" value="{{ $role['value'] }}" />
            <span class="ml-2">{{ $role['name'] }}</span>
          </label>
        @endforeach
      </div>
    </div>

    <label class="block text-sm mt-4">
      <span class="text-gray-700 dark:text-gray-400">Email</span>
      <input type="email" name="email" class="border w-full mt-1 text-sm border-gray-400  dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray rounded-md" value="{{ old('email') }}" placeholder="johndoe@gmail.com"/>
      <span class="text-gray-500 dark:text-gray-200">Enter an active email</span>
      @error('email')
      <div class="mt-2 text-[red]">
        <i class="fas fa-dot-circle"></i> {{ $message }}
        </div>
      @enderror
    </label>

    <label class="block text-sm mt-4">
      <span class="text-gray-700 dark:text-gray-400">Profile Photo</span>
      <input type="file" name="photo_file" class="border w-full mt-1 text-sm rounded-md border-gray-400 py-1 px-2 dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray" value="{{ old('photo_file') }}" />
      @error('photo_file')
        <div class="mt-2 text-[red]">
          <i class="fas fa-dot-circle"></i> {{ $message }}
        </div>
      @enderror
    </label>

    <button class="mt-4 bg-blue-600 py-2 px-7 rounded-md text-white">Submit</button>

  </form>
@endsection


