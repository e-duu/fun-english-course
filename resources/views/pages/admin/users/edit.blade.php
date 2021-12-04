@extends('layouts.dash')
@section('title')
  Fun English Course | User Edit
@endsection
@section('sub-title')
  Edit Users
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

    $roles = [$admin, $teacher, $student];
  @endphp

  <form action="{{ route('user.update', $data->id) }}" method="POST" class="px-4 py-3 bg-white rounded-lg shadow-md dark:bg-gray-800" enctype="multipart/form-data">
    @csrf

    <label class="block text-sm mt-4">
      <span class="text-gray-700 dark:text-gray-400">Name</span>
      <input type="text" name="name" value="{{ $data->name }}" class="block w-full mt-1 text-sm rounded-md border-gray-400 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Jane Doe"/>
    </label>
    
    <label class="block text-sm mt-4">
      <span class="text-gray-700 dark:text-gray-400">Username</span>
      <input type="text" name="username" value="{{ $data->username }}" class="block w-full mt-1 text-sm rounded-md border-gray-400 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Jane Doe"/>
    </label>

    <label class="block text-sm mt-4">
      <span class="text-gray-700 dark:text-gray-400">Password</span>
      <input type="password" name="password" class="block w-full mt-1 text-sm rounded-md border-gray-400 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="*******"/>
      <p class="text-gray-600 text-xs">Let this field blank to keep the password unchanged</p>
    </label>

    <div class="mt-4 text-sm">
      <span class="text-gray-700 dark:text-gray-400">
        Role
      </span>
      <div class="mt-2">
        @foreach ($roles as $role)
          <label class="inline-flex items-center text-gray-600 dark:text-gray-400 mr-4">
            <input type="radio" class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" name="role" value="{{ $role['value'] }}" {{ ($data->role == $role['value'] ? 'checked' : '') }} />
            <span class="ml-2">{{ $role['name'] }}</span>
          </label>
        @endforeach
      </div>
    </div>
    
    <label class="block text-sm mt-4">
      <span class="text-gray-700 dark:text-gray-400">Email</span>
      <input type="email" name="email" value="{{ $data->email }}" class="block w-full mt-1 text-sm rounded-md border-gray-400 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="janedoe@gmail.com"/>
    </label>

    <label class="block text-sm mt-4">
      <span class="text-gray-700 dark:text-gray-400">Profile Photo</span>
      <input type="file" name="photo_file" class="border w-full mt-1 text-sm border-gray-400 py-1 px-2  dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray rounded-md" />
    </label>
    
    <button class="mt-4 bg-purple-600 py-2 px-7 rounded-md text-white">Sumbit</button>

  </form>
@endsection


