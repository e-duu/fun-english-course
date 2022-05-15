@extends('layouts.dash')
@section('title')
  Fun English Course | Program Detail
@endsection
@section('sub-title')
Detail Programs - {{ $data->name }}
@endsection
@section('content')

<div class="flex item-center justify-between space-x-2">
    <div class="flex item-center justify-between space-x-2">
        {{-- Modal Filter --}}
        <div x-data="{ showModal : false }">
            <!-- Button -->
            <button @click="showModal = !showModal" class="px-4 py-2 text-sm bg-blue-600 rounded-md transition-colors duration-150 ease-linear text-white focus:outline-none focus:ring-0 font-semibold hover:bg-blue-700">Filter & Sort</button>

            <!-- Modal Background -->
            <div x-show="showModal" class="fixed text-gray-500 flex items-center justify-center overflow-auto z-50 bg-black bg-opacity-40 left-0 right-0 top-0 bottom-0" x-transition:enter="transition ease duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                    <!-- Modal -->
                <div x-show="showModal" class="bg-white rounded-xl shadow-2xl p-6 w-80 sm:w-3/6 mx-10" @click.away="showModal = false" x-transition:enter="transition ease duration-100 transform" x-transition:enter-start="opacity-0 scale-90 translate-y-1" x-transition:enter-end="opacity-100 scale-100 translate-y-0" x-transition:leave="transition ease duration-100 transform" x-transition:leave-start="opacity-100 scale-100 translate-y-0" x-transition:leave-end="opacity-0 scale-90 translate-y-1">
                    <!-- Title -->
                    <span class="font-bold block text-2xl mb-3">Filter & Sort </span>
                    <div class="border-b border-gray-500 mb-5"></div>
                    <!-- Some beer 🍺 -->
                    <form action="{{route('student.show', $data->id)}}" method="GET">
                        <label class="block mt-4 text-sm">
                            <span class="text-gray-700 dark:text-gray-400">
                                Level
                            </span>
                            <select name="level" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border rounded-md border-gray-400 -gray-600 dark:bg-gray-700 form-select focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:focus:shadow-outline-gray">
                                <option selected>Choose Option...</option>
                                @foreach ($levelsFt as $level)
                                    <option value="{{ $level->id }}" >{{ $level->name }}</option>
                                @endforeach
                            </select>
                        </label>

                        <div class="border-b border-gray-500 my-5"></div>

                        <!-- Buttons -->
                        <div class="flex-col sm:flex-row sm:justify-end text-center sm:text-right space-y-2 sm:space-x-2 mt-5">
                            <button type="button" @click="showModal = !showModal" class="w-full sm:w-auto sm:px-4 py-2 text-xs sm:text-sm bg-gray-600 rounded-md transition-colors duration-150 ease-linear text-white focus:outline-none focus:ring-0 font-semibold hover:bg-gray-700">Cancel</button>

                            <button formaction="{{route('student.show', $data->id)}}" class="w-full sm:w-auto sm:px-4 py-2 text-xs sm:text-sm bg-blue-600 rounded-md transition-colors duration-150 ease-linear text-white focus:outline-none focus:ring-0 font-semibold hover:bg-blue-700">Apply Filter</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="float-right mb-5">
      <a href="{{ route('student.all') }}" class="px-5 py-1 bg-yellow-400 rounded-md font-semibold text-white">Back to Program</a>
    </div>
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
