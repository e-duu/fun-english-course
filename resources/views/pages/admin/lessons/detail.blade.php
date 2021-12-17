@extends('layouts.dash')
@section('title')
  Fun English Course | Lesson Detail
@endsection
@section('sub-title')
  Detail Lessons - {{ $data->name }}
@endsection
@section('content')

<a href="{{ route('material.create', $data->id) }}" class="px-5 py-1 bg-[blueviolet] rounded-md font-semibold text-white mr-3">Add Material</a>

<a href="{{ route('exercise.create', $data->id) }}" class="px-5 py-1 bg-[blueviolet] rounded-md font-semibold text-white">Add Exercise</a>

<div class="w-full overflow-hidden rounded-lg shadow-xs mt-4">
  <div class="w-full overflow-x-auto">
    <table class="w-full whitespace-no-wrap">
      <thead>
        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-100 bg-gray-50 dark:text-gray-100 dark:bg-darker">
            <th class="px-4 py-3">Thumbnail</th>
            <th class="px-4 py-3">Material Name</th>
            <th class="px-4 py-3">Actions</th>
        </tr>
      </thead>
      <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-darker">

        @forelse ($data->materials as $item)
          <tr class="text-gray-700 dark:text-gray-400">
            <td class="px-4 py-3">
                <img src="{{ asset('/materials/' . $item->photo) }}" class="rounded-full shadow-md" style="width: 50px;" alt="material photo">
            </td>
            <td class="px-4 py-3 text-sm">
              {{ $item->title }}
            </td>
            <td class="px-4 py-3">
              <div class="flex items-center space-x-4 text-sm">
                <a href="{{ route('material.show', $item->id) }}" class="flex-col text-center px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray">
                  <i class=" fas fa-eye"></i>
                  <p>Detail</p>
                </a>
                <a href="{{ route('material.edit', $item->id) }}" class="flex-col text-center px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray">
                  <i class=" fas fa-edit"></i>
                  <p>Edit</p>
                </a>
                <form action="{{ route('material.delete', $item->id) }}" method="POST" class="d-inline">
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
            <td colspan="4" class="text-center text-gray-500 px-4 py-3">
              <p>
                Materials is empty...
              </p>
            </td>
          </tr>
        @endforelse

        @foreach ($data->exercises as $exercise)
          <tr class="text-gray-700 dark:text-gray-400">
            <td class="px-4 py-3">
                <img src="{{ asset('/exercises/' . $exercise->photo) }}" class="rounded-full shadow-md" style="width: 50px;" alt="material photo">
            </td>
            <td class="px-4 py-3 text-sm">
              {{ $exercise->title }}
            </td>
            <td class="px-4 py-3">
              <div class="flex exercises-center space-x-4 text-sm">
                <a href="{{ route('exercise.show', $exercise->id) }}" class="flex-col text-center px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray">
                  <i class="fas fa-eye"></i>
                  <p>Detail</p>
                </a>
                <a href="{{ route('exercise.edit', $exercise->id) }}" class="flex-col text-center px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray">
                  <i class=" fas fa-edit"></i>
                  <p>Edit</p>
                </a>
                <form action="{{ route('exercise.delete', $exercise->id) }}" method="POST" class="d-inline">
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
        @endforeach

      </tbody>
    </table>
  </div>
  <div class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
    {{-- <div class="text-center w-[1000px] 2xl:w-[1335px] ">
			{{ $data->links() }}
		</div> --}}
  </div>
</div>
@endsection