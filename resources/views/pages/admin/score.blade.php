@extends('layouts.dash')
@section('title')
  Fun English Course | Score Pages
@endsection
@section('sub-title')
  List Scores
@endsection
@section('content')
  <div class="w-full overflow-hidden rounded-lg shadow-xs">
    <div class="w-full overflow-x-auto">
    <table class="w-full whitespace-no-wrap">
      <thead>
        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
            <th class="px-4 py-3">User Name</th>
            <th class="px-4 py-3">Program</th>
            <th class="px-4 py-3">Level</th>
            <th class="px-4 py-3">Exercise</th>
            <th class="px-4 py-3">Result</th>
            <th class="px-4 py-3">Action</th>
        </tr>
      </thead>
      <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-darker">

        @forelse ($data as $item)
          <tr class="text-gray-700 dark:text-gray-400">
            <td class="px-4 py-3 text-sm">
              {{ $item->user->name }}
            </td>
            <td class="px-4 py-3 text-sm">
              {{ $item->exercise->lesson->level->program->name }}
            </td>
            <td class="px-4 py-3 text-sm">
              {{ $item->exercise->lesson->level->name }}
            </td>
            <td class="px-4 py-3 text-sm">
              {{ $item->exercise->title }}
            </td>
            <td class="px-4 py-3 text-sm">
              {{ $item->score }} / 100
            </td>
            <td class="px-4 py-3 text-sm">
              <form action="{{ route('score.delete', $item->id) }}" method="POST" class="d-inline">
								@csrf
								@method('DELETE')
								<button class="flex-col px-2 py-2 text-sm font-medium leading-5 text-blue-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray">
									<i class="fas fa-trash"></i>
									<p>Delete</p>
								</button>
							</form>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="6" class="text-center text-gray-500 px-4 py-3">
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
      <div class="text-center w-auto sm:w-[565px] md:w-[980px] 2xl:w-[1335px] ">
        {{ $data->links() }}
      </div>
    </div>
  </div>
@endsection