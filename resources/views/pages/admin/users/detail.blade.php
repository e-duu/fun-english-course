@extends('layouts.dash')
@section('title')
  Fun English Course | User Details
@endsection
@section('sub-title')
  Detail Users
@endsection
@section('content')
  <form class="mb-5 relative h-5">
    <button formaction="{{ route('user.all') }}" class="px-5 py-1 bg-yellow-400 rounded-md font-semibold text-white sm:absolute sm:right-0 w-full sm:w-auto">Back to User</button>
  </form>
  <div class="bg-white shadow-md p-6 text-left rounded-lg sm:flex space-x-8">
    <img src="{{ asset('/users/' . $data->photo) }}" alt="user profile photo" class="w-60 sm:w-96 rounded-md">
    <div class="flex-col space-y-3">
      <p class="text-sm sm:text-lg"><b> Name :</b> &nbsp;&nbsp; {{ $data->name }}</p>
      <p class="text-sm sm:text-lg"><b> Username :</b> &nbsp;&nbsp; {{ $data->username }}</p>
      <p class="text-sm sm:text-lg"><b> Role :</b> &nbsp;&nbsp; {{ $data->role }}</p>
      <p class="text-sm sm:text-lg"><b> Email :</b> &nbsp;&nbsp; {{ $data->email }}</p>
      <p class="text-sm sm:text-lg"><b> Enroll in Levels :</b></p>

      <div class="w-full overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto">
          <table class="w-full whitespace-no-wrap">
            <thead>
              <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                  <th class="px-4 py-3">Program Name</th>
                  <th class="px-4 py-3">Level Name</th>
                  <th class="px-4 py-3">Actions</th>
              </tr>
            </thead>
            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-darker">
      
              @forelse ($data->levels as $level)
                <tr class="text-gray-700 dark:text-gray-400">
                  <td class="px-4 py-3 text-sm">
                    {{ $level->program->name  }}
                  </td>
                  <td class="px-4 py-3 text-sm">
                    {{ $level->name  }}
                  </td>
                  <td class="px-4 py-3">
                    <div class="flex items-center space-x-4 text-sm">
                      <form action="{{ route('enroll.delete', $level->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('POST')
                        <button class="flex-col px-2 py-2 text-sm font-medium leading-5 text-blue-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray">
                          <i class="fas fa-trash"></i>
                          <p>Un - Enroll</p>
                        </button>
                      </form>
                    </div>
                  </td>
                </tr>
              @empty
                <tr>
                  <td colspan="2" class="text-center text-gray-500 px-4 py-3">
                    <p>
                      Data is empty..
                    </p>
                  </td>
                </tr>
              @endforelse
      
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection