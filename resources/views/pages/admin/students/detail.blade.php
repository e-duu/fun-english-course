@extends('layouts.dash')
@section('title')
  Fun English Course | Program Detail
@endsection
@section('sub-title')
Detail Programs - {{ $data->name }}
@endsection
@section('content')

<div class="float-right">
  <a href="{{ route('student.all') }}" class="px-5 py-1 bg-yellow-400 rounded-md font-semibold text-white">Back to Program</a>
</div>

<div class="w-full overflow-hidden rounded-lg shadow-xs mt-4">
  <div class="w-full overflow-x-auto">
    <table class="w-full whitespace-no-wrap">
      <thead>
        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
            <th class="px-4 py-3">Level Name</th>
            <th class="px-4 py-3">Actions</th>
        </tr>
      </thead>
      <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-darker">

        @forelse ($levels as $item)
          <tr class="text-gray-700 dark:text-gray-400">
            <td class="px-4 py-3 text-sm">
              {{ $item->name }}
            </td>
            <td class="px-4 py-3">
              <div class="flex items-center space-x-4 text-sm">
                <a href="{{ route('student.show-spp', $item->id) }}" class="flex-col text-center px-2 py-2 text-sm font-medium leading-5 text-blue-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray">
                  <i class=" fas fa-eye"></i>
                  <p>Detail</p>
                </a>
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
		<div class="text-center w-auto sm:w-[565px] md:w-[980px] 2xl:w-[1335px] ">
			{{ $levels->links() }}
		</div>
	</div>
</div>
@endsection