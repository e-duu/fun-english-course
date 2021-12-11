@extends('layouts.dash')
@section('title')
  Fun English Course | Program Detail
@endsection
@section('sub-title')
Detail Programs - {{ $data->name }}
@endsection
@section('content')

<a href="{{ route('level.create', $data->id) }}" class="px-5 py-1 bg-[blueviolet] rounded-md font-semibold text-white">Add Level</a>

<div class="w-full overflow-hidden rounded-lg shadow-xs mt-4">
  <div class="w-full overflow-x-auto">
    <table class="w-full whitespace-no-wrap">
      <thead>
        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
            <th class="px-4 py-3">Level Name</th>
            <th class="px-4 py-3">Slug</th>
            <th class="px-4 py-3">Actions</th>
        </tr>
      </thead>
      <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-darker">

        @forelse ($data->levels as $item)
          <tr class="text-gray-700 dark:text-gray-400">
            <td class="px-4 py-3 text-sm">
              {{ $item->name }}
            </td>
            <td class="px-4 py-3 text-sm">
              {{ $item->slug }}
            </td>
            <td class="px-4 py-3">
              <div class="flex items-center space-x-4 text-sm">
                <a href="{{ route('level.show', $item->id) }}" class="flex-col text-center px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray">
                  <i class=" fas fa-eye"></i>
                  <p>Detail</p>
                </a>
                <a href="{{ route('level.edit', $item->id) }}" class="flex-col text-center px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray">
                  <i class=" fas fa-edit"></i>
                  <p>Edit</p>
                </a>
                <form action="{{ route('level.delete', $item->id) }}" method="POST" class="d-inline">
                  @csrf
                  @method('DELETE')
                  <button class="flex-col px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray">
                    <i class="fas fa-trash"></i>
                    <p>Delete</p>
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
  <div class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
    
  </div>
</div>
@endsection