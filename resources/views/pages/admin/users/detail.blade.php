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
  <div class="bg-white shadow-md p-6 text-left rounded-lg dark:divide-gray-700 dark:bg-darker">
    <div class="sm:flex space-x-8">
      <img src="{{ asset('/users/' . $data->photo) }}" alt="user profile photo" class="w-60 sm:w-96 rounded-md">
      <div class="flex-col space-y-3">
        <p class="text-sm sm:text-lg"><b> Name :</b> &nbsp;&nbsp; {{ $data->name }}</p>
        <p class="text-sm sm:text-lg"><b> Number :</b> &nbsp;&nbsp; {{ $data->number }}</p>
        <p class="text-sm sm:text-lg"><b> Username :</b> &nbsp;&nbsp; {{ $data->username }}</p>
        <p class="text-sm sm:text-lg"><b> Parent :</b> &nbsp;&nbsp; {{ $data->parent }}</p>
        <p class="text-sm sm:text-lg"><b> City :</b> &nbsp;&nbsp; {{ $data->city }}</p>
        <p class="text-sm sm:text-lg"><b> Country :</b> &nbsp;&nbsp; {{ $data->country }}</p>
        <p class="text-sm sm:text-lg"><b> Status :</b> &nbsp;&nbsp; {{ $data->status }}</p>
        <p class="text-sm sm:text-lg"><b> Role :</b> &nbsp;&nbsp; {{ $data->role }}</p>
        <p class="text-sm sm:text-lg"><b> Email :</b> &nbsp;&nbsp; {{ $data->email }}</p>
        <p class="text-sm sm:text-lg"><b> Enroll in Levels :</b></p>
      </div>
    </div>
        
    <div class="w-full overflow-hidden rounded-lg shadow-xs mx-auto pt-10">
      <div class="w-full overflow-x-auto">
        <table class="w-full whitespace-no-wrap">
          <thead>
            <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-white dark:bg-gray-800">
                <th class="px-4 py-3">Program Name</th>
                <th class="px-4 py-3">Level Name</th>
                <th class="px-4 py-3">Actions</th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-darker dark:border-gray-400">
    
            @forelse ($data->levels as $level)
              <tr class="text-gray-700 dark:text-white">
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
                      <input type="hidden" name="user_id" value="{{ request('id') }}">
                      <input type="hidden" name="level_id" value="{{ $level->id }}">
                      <button class="flex-col px-2 py-2 text-sm font-medium leading-5 text-blue-600 rounded-lg dark:text-white focus:outline-none focus:shadow-outline-gray">
                        <i class="fas fa-trash"></i>
                        <p>Un - Enroll</p>
                      </button>
                    </form>
                  </div>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="3" class="text-center text-gray-500 px-4 py-3">
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
@endsection