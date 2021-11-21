@extends('layouts.dash')
@section('title')
  Fun English Course | Program Detail
@endsection
@section('sub-title')
Detail Programs - {{ $data->name }}
@endsection
@section('content')

<a href="{{ route('level.create', $data->id) }}" style="background-color: blueviolet" class="px-5 py-2 rounded-md font-semibold text-white">Add Level</a>

<div class="w-full overflow-hidden rounded-lg shadow-xs mt-4">
  <div class="w-full overflow-x-auto">
    <table class="w-full whitespace-no-wrap">
      <thead>
        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-100 bg-gray-50 dark:text-gray-100 dark:bg-darker">
            <th class="px-4 py-3">Level Name</th>
            <th class="px-4 py-3">Actions</th>
        </tr>
      </thead>
      <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-darker">

        @forelse ($data->levels as $item)
          <tr class="text-gray-700 dark:text-gray-400">
            <td class="px-4 py-3 text-sm">
              {{ $item->name }}
            </td>
            <td class="px-4 py-3">
              <div class="flex items-center space-x-4 text-sm">
                <a href="{{ route('level.show', $item->id) }}" class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray">
                  <i class="fas fa-eye"></i>
                </a>
                <a href="{{ route('level.edit', $item->id) }}" class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray">
                  <i class=" fas fa-edit"></i>
                </a>
                <form action="{{ route('level.delete', $item->id) }}" method="POST" class="d-inline">
                  @csrf
                  @method('DELETE')
                  <button class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray">
                    <i class="fas fa-trash"></i>
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
  <div class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
    <span class="flex items-center col-span-3">
        Showing 21-30 of 100
    </span>
    <span class="col-span-2"></span>
    <!-- Pagination -->
    <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
        <nav aria-label="Table navigation">
        <ul class="inline-flex items-center">
            <li>
            <button
                class="px-3 py-1 rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-purple"
                aria-label="Previous"
            >
                <svg
                class="w-4 h-4 fill-current"
                aria-hidden="true"
                viewBox="0 0 20 20"
                >
                <path
                    d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                    clip-rule="evenodd"
                    fill-rule="evenodd"
                ></path>
                </svg>
            </button>
            </li>
            <li>
            <button
                class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple"
            >
                1
            </button>
            </li>
            <li>
            <button
                class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple"
            >
                2
            </button>
            </li>
            <li>
            <button
                class="px-3 py-1 text-white transition-colors duration-150 bg-purple-600 border border-r-0 border-purple-600 rounded-md focus:outline-none focus:shadow-outline-purple"
            >
                3
            </button>
            </li>
            <li>
            <button
                class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple"
            >
                4
            </button>
            </li>
            <li>
            <span class="px-3 py-1">...</span>
            </li>
            <li>
            <button
                class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple"
            >
                8
            </button>
            </li>
            <li>
            <button
                class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple"
            >
                9
            </button>
            </li>
            <li>
            <button
                class="px-3 py-1 rounded-md rounded-r-lg focus:outline-none focus:shadow-outline-purple"
                aria-label="Next"
            >
                <svg
                class="w-4 h-4 fill-current"
                aria-hidden="true"
                viewBox="0 0 20 20"
                >
                <path
                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                    clip-rule="evenodd"
                    fill-rule="evenodd"
                ></path>
                </svg>
            </button>
            </li>
        </ul>
        </nav>
    </span>
  </div>
</div>
@endsection