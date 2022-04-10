@extends('layouts.dash')
@section('title')
    Fun English Course | Dashboard
@endsection
@section('content')
  <main>
    <!-- Content header -->
    <div class="flex items-center justify-between px-4 py-4 border-b lg:py-6 dark:border-primary-darker">
      <h1 class="text-2xl font-semibold">Dashboard</h1>
    </div>

    <!-- Content -->
    <div class="w-full overflow-hidden rounded-lg shadow-xs mt-5">
      <div class="w-full overflow-x-auto">
      <table class="w-full whitespace-no-wrap">
        <thead>
        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
          <th class="px-4 py-3">Photo</th>
          <th class="px-4 py-3">Name</th>
          <th class="px-4 py-3">Email</th>
          <th class="px-4 py-3">Role</th>
          <th class="px-4 py-3">Actions</th>
        </tr>
        </thead>
        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-darker">
          <tr class="text-gray-700 dark:text-gray-400">
            <td class="px-4 py-3">
              <img src="{{ asset('/users/' . $data->photo) }}" style="width: 70px;" class="rounded-full" alt="profile photo">
            </td>
            <td class="px-4 py-3 text-sm">
              {{ $data->name }}
            </td>
            <td class="px-4 py-3 text-sm">
              {{ $data->email }}
            </td>
            <td class="px-4 py-3 text-sm">
              {{ $data->role }}
            </td>
            <td class="px-4 py-3">
            <div class="flex items-center space-x-4 text-sm">
              <a href="{{ route('user.show', $data->id) }}" class="flex-col text-center px-2 py-2 text-sm font-medium leading-5 text-blue-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray">
                <i class=" fas fa-eye"></i>
                <p>Detail</p>
              </a>
              <a href="{{ route('payment', $data->id) }}" class="flex-col text-center px-2 py-2 text-sm font-medium leading-5 text-blue-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray">
                <i class="fas fa-cart-plus"></i>
                <p>Pay</p>
              </a>
            </div>
            </td>
          </tr>
        </tbody>
      </table>
      </div>
      <div class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
        <div class="text-center w-auto sm:w-[565px] md:w-[980px] 2xl:w-[1335px] ">
        </div>
      </div>
    </div>
  </main>
@endsection