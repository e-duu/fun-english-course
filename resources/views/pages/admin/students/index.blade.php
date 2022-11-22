@extends('layouts.dash')
@section('title')
  Fun English Course | Programs Pages
@endsection
@section('sub-title')
  List of Programs
@endsection
@section('content')
  <div class="w-full overflow-hidden rounded-lg shadow-xs mt-4">
    <div class="w-full overflow-x-auto">
      <table class="w-full whitespace-no-wrap">
        <thead>
          <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-white dark:bg-gray-800">
              <th class="px-4 py-3">Program Name</th>
              <th class="px-4 py-3">Actions</th>
          </tr>
        </thead>
        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-darker">

          @forelse ($data as $item)
            <tr class="text-gray-700 dark:text-white">
              <td class="px-4 py-3 text-sm">
                {{ $item->name }}
              </td>
              <td class="px-4 py-3">
                <div class="flex items-center space-x-4 text-sm">
                  <a href="{{ route('student.show', $item->id) }}" class="flex-col text-center px-2 py-2 text-sm font-medium leading-5 text-blue-600 rounded-lg dark:text-white focus:outline-none focus:shadow-outline-gray">
                    <i class=" fas fa-eye"></i>
                    <p>Detail</p>
                  </a>
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
    <div class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-white dark:bg-gray-800">
      <div class="text-center w-auto sm:w-[565px] md:w-[860px] xl:w-[980px] 2xl:w-[1325px]">
        {{ $data->links() }}
      </div>
    </div>
  </div>
@endsection