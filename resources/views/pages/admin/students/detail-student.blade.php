@extends('layouts.dash')
@section('title')
  Fun English Course | Program Detail
@endsection
@section('sub-title')
Detail Students - {{ $data->name }}
@endsection
@section('content')

<div class="float-right mb-5">
  <a href="{{ route('student.show', $data->program_id) }}" class="px-5 py-1 bg-yellow-400 rounded-md font-semibold text-white">Back to Level</a>
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
        </tr>
      </thead>
      <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-darker">

        @forelse ($spps as $item)
          <tr class="text-gray-700 dark:text-gray-400">
            <td class="px-4 py-3 text-sm">
              {{ $item->student->name }}
            </td>
            <td class="px-4 py-3 text-sm">
              {{ $item->student->detail->parent }}
            </td>
            <td class="px-4 py-3 text-sm">
              {{ $item->student->detail->city }}
            </td>
            <td class="px-4 py-3 text-sm">
              {{ $item->student->detail->country }}
            </td>
            <td class="px-4 py-3 text-sm">
              {{ $item->student->detail->status }}
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
            
          </tr>
        @empty
          <tr>
            <td colspan="10" class="text-center text-gray-500 px-4 py-3">
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