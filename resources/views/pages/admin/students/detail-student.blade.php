@extends('layouts.dash')
@section('title')
  Fun English Course | Program Detail
@endsection
@section('sub-title')
Detail Students - {{ $data->name }}
@endsection
@section('content')

<div class="flex item-center justify-between space-x-2">
	{{-- Modal Upload --}}
	<div x-data="{ showModal : false }">
		<!-- Button -->
		<button @click="showModal = !showModal" class="px-4 py-2 text-sm bg-blue-600 rounded-md transition-colors duration-150 ease-linear text-white focus:outline-none focus:ring-0 font-semibold hover:bg-blue-700">Send Mail</button>

		<!-- Modal Background -->
		<div x-show="showModal" class="fixed text-gray-500 flex items-center justify-center overflow-auto z-50 bg-black bg-opacity-40 left-0 right-0 top-0 bottom-0" x-transition:enter="transition ease duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
				<!-- Modal -->
				<div x-show="showModal" class="bg-white rounded-xl shadow-2xl p-6 w-80 sm:w-3/6 mx-10" @click.away="showModal = false" x-transition:enter="transition ease duration-100 transform" x-transition:enter-start="opacity-0 scale-90 translate-y-1" x-transition:enter-end="opacity-100 scale-100 translate-y-0" x-transition:leave="transition ease duration-100 transform" x-transition:leave-start="opacity-100 scale-100 translate-y-0" x-transition:leave-end="opacity-0 scale-90 translate-y-1">
                    <!-- Title -->
                    <span class="font-bold block text-2xl mb-3">Send To Mail </span>
                    <div class="border-b border-gray-500 mb-5"></div>
                    <!-- Send To Email (Invoice) -->
                    <form action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class='flex items-center justify-center w-full'>
                            <table class="w-full whitespace-no-wrap">
                                <thead>
                                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                        <th class="px-4 py-3">Student Name</th>
                                        <th class="px-4 py-3">Price</th>
                                        <th class="px-4 py-3"><input id="checkAll" type="checkbox"></th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-darker">

                                    @forelse ($spps as $item)
                                        <tr class="text-gray-700 dark:text-gray-400">
                                            <td class="px-4 py-3 text-sm">
                                                {{ $item->student->name }}
                                            </td>
                                            <td class="px-4 py-3 text-sm">
                                                {{'Rp '.number_format($item->price) }}
                                            </td>
                                            <td class="px-4 py-3 text-sm">
                                                <input type="checkbox" name="level">
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
                        <div class="border-b border-gray-500 my-5"></div>

                        <!-- Buttons -->
                        <div class="flex-col sm:flex-row sm:justify-end text-center sm:text-right space-y-2 sm:space-y-0 sm:space-x-2 mt-5">
                        <button type="button" @click="showModal = !showModal" class="w-full sm:w-auto sm:px-4 py-2 text-xs sm:text-sm bg-red-600 rounded-md transition-colors duration-150 ease-linear text-white focus:outline-none focus:ring-0 font-semibold hover:bg-red-700">Cancel</button>

                        <button type="submit" class="w-full sm:w-auto sm:px-4 py-2 text-xs sm:text-sm bg-blue-600 rounded-md transition-colors duration-150 ease-linear text-white focus:outline-none focus:ring-0 font-semibold hover:bg-blue-700">Submit</button>
                    </form>
                </div>
            </div>
		</div>
	</div>
  <div class="float-right mb-5">
    <a href="{{ route('student.show', $data->program_id) }}" class="px-5 py-1 bg-yellow-400 rounded-md font-semibold text-white">Back to Level</a>
  </div>
</div>


<div class="w-full overflow-hidden rounded-lg shadow-xs mt-4">
  <div class="w-full overflow-x-auto">
    <table class="w-full whitespace-no-wrap">
      <thead>
        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
            <th class="px-4 py-3">Name</th>
            <th class="px-4 py-3">Parent</th>
            <th class="px-4 py-3">City</th>
            <th class="px-4 py-3">Country</th>
            <th class="px-4 py-3">Status</th>
            <th class="px-4 py-3">Program</th>
            <th class="px-4 py-3">Level</th>
            <th class="px-4 py-3">Currency</th>
            <th class="px-4 py-3">Price</th>
            <th class="px-4 py-3">Status Payment</th>
            <th class="px-4 py-3">Action</th>
        </tr>
      </thead>
      <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-darker">

        @forelse ($spps as $item)
          <tr class="text-gray-700 dark:text-gray-400">
            <td class="px-4 py-3 text-sm">
              {{ $item->student->name }}
            </td>
            <td class="px-4 py-3 text-sm">
              {{ $item->student->parent }}
            </td>
            <td class="px-4 py-3 text-sm">
              {{ $item->student->city }}
            </td>
            <td class="px-4 py-3 text-sm">
              {{ $item->student->country }}
            </td>
            <td class="px-4 py-3 text-sm">
              {{ $item->student->status }}
            </td>
            <td class="px-4 py-3 text-sm">
              {{ $item->level->program->name }}
            </td>
            <td class="px-4 py-3 text-sm">
              {{ $item->level->name }}
            </td>
            <td class="px-4 py-3 text-sm">
              @if ($item->price < 10000)
                USD
              @else
                IDR
              @endif
            </td>
            <td class="px-4 py-3 text-sm">
              {{ number_format($item->price, 0, ',', ',') }}
            </td>
            <td class="px-4 py-3 text-sm">
              {{ $item->status }}
            </td>
            <td class="px-4 py-3">
                <a href="{{ route('user.edit', $item->student->id) }}" class="flex-col text-center px-2 py-2 text-sm font-medium leading-5 text-blue-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray">
                    <i class="fas fa-print"></i>
                    @if ($item->status == 'paid')
                        <p>Receipt</p>
                    @elseif ($item->status == 'paid_manually')
                        <p>Receipt</p>
                    @elseif ($item->status == 'unpaid')
                        <p>Invoice</p>
                    @elseif ($item->status == 'pending')
                        <p>Invoice</p>
                    @endif
                </a>
            </td>

          </tr>
        @empty
          <tr>
            <td colspan="11" class="text-center text-gray-500 px-4 py-3">
              <p>
                Data is empty..
              </p>
            </td>
          </tr>
        @endforelse

      </tbody>
    </table>
  </div>
  {{-- <div class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
		<div class="text-center w-auto sm:w-[565px] md:w-[980px] 2xl:w-[1335px] ">
			{{ $spps->links() }}
		</div>
	</div> --}}
</div>
@endsection

@push('after-script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script language="javascript">
        $("#checkAll").click(function () {
            $('input:checkbox').not(this).prop('checked', this.checked);
        });
    </script>
@endpush
