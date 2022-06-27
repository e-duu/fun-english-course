@extends('layouts.dash')
@section('title')
  Fun English Course | Program Detail
@endsection
@section('sub-title')
  Send To Mail
@endsection
@section('content')

<div class="flex item-center justify-between space-x-2">
    <div class="flex space-x-2 items-center">
        {{-- Button Send To Mail --}}
        <button form="send" class="px-4 py-2 text-sm bg-green-600 rounded-md transition-colors duration-150 ease-linear text-white focus:outline-none focus:ring-0 font-semibold hover:bg-green-700">Send Mail</button>

        {{-- Modal Filter --}}
        <div x-data="{ showModal : false }">
          <!-- Button -->
          <button @click="showModal = !showModal" class="px-4 py-2 text-sm bg-blue-600 rounded-md transition-colors duration-150 ease-linear text-white focus:outline-none focus:ring-0 font-semibold hover:bg-blue-700">Filter & Search</button>

          <!-- Modal Background -->
          <div x-show="showModal" class="fixed text-gray-500 flex items-center justify-center overflow-auto z-50 bg-black bg-opacity-40 left-0 right-0 top-0 bottom-0" x-transition:enter="transition ease duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                <!-- Modal -->
                <div x-show="showModal" class="bg-white rounded-xl shadow-2xl p-6 w-80 sm:w-3/6 mx-10" @click.away="showModal = false" x-transition:enter="transition ease duration-100 transform" x-transition:enter-start="opacity-0 scale-90 translate-y-1" x-transition:enter-end="opacity-100 scale-100 translate-y-0" x-transition:leave="transition ease duration-100 transform" x-transition:leave-start="opacity-100 scale-100 translate-y-0" x-transition:leave-end="opacity-0 scale-90 translate-y-1">
                    <!-- Title -->
                    <span class="font-bold block text-2xl mb-3">Filter & Search</span>
                    <div class="border-b border-gray-500 mb-5"></div>
                    <!-- Some beer 🍺 -->
                    <form action="" method="GET">
                        <label class="block text-sm mt-2">
                            <span class="text-gray-700 dark:text-gray-400">Student Name</span>
                            <input type="text" name="name" class="border w-full mt-1 text-sm border-gray-400  dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray rounded-md" placeholder="John Doe"/>
                        </label>

                        <label class="block mt-4 text-sm">
                            <span class="text-gray-700 dark:text-gray-400">
                                Payment Status
                            </span>
                            <select name="status" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border rounded-md border-gray-400 -gray-600 dark:bg-gray-700 form-select focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:focus:shadow-outline-gray">
                                <option selected disabled>Choose Option...</option>
                                <option value="paid">PAID</option>
                                <option value="unpaid">UNPAID</option>
                                <option value="paid_manually">PAID(Manually)</option>
                            </select>
                        </label>

                        <label class="block mt-4 text-sm">
                            <span class="text-gray-700 dark:text-gray-400">
                                Month
                            </span>
                            <select name="month" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border rounded-md border-gray-400 -gray-600 dark:bg-gray-700 form-select focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:focus:shadow-outline-gray">
                                <option selected disabled>Choose Option...</option>
                                <option value="1">January</option>
                                <option value="2">February</option>
                                <option value="3">March</option>
                                <option value="4">April</option>
                                <option value="5">May</option>
                                <option value="6">June</option>
                                <option value="7">July</option>
                                <option value="8">August</option>
                                <option value="9">September</option>
                                <option value="10">October</option>
                                <option value="11">November</option>
                                <option value="12">December</option>
                            </select>
                        </label>

                        <div class="border-b border-gray-500 my-5"></div>

                        <!-- Buttons -->
                        <div class="flex-col sm:flex-row sm:justify-end text-center sm:text-right space-y-2 sm:space-x-2 mt-5">
                            <button type="button" @click="showModal = !showModal" class="w-full sm:w-auto sm:px-4 py-2 text-xs sm:text-sm bg-gray-600 rounded-md transition-colors duration-150 ease-linear text-white focus:outline-none focus:ring-0 font-semibold hover:bg-gray-700">Cancel</button>

                            <button formaction="{{ route('student.search-reset', $data->id) }}" class="w-full sm:w-auto sm:px-4 py-2 text-xs sm:text-sm bg-red-600 rounded-md transition-colors duration-150 ease-linear text-white focus:outline-none focus:ring-0 font-semibold hover:bg-red-700">Reset</button>

                            <button formaction="{{ route('send-to-mail-page', $data->id) }}" class="w-full sm:w-auto sm:px-4 py-2 text-xs sm:text-sm bg-blue-600 rounded-md transition-colors duration-150 ease-linear text-white focus:outline-none focus:ring-0 font-semibold hover:bg-blue-700">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="float-right">
        <a href="{{ route('student.show', $data->program_id) }}" class="px-5 py-1 bg-yellow-400 rounded-md font-semibold text-white">Back to Detail Student</a>
    </div>
</div>


<div class="w-full overflow-hidden rounded-lg shadow-xs mt-4">
  <div class="w-full overflow-x-auto">
    <form id="send" action="{{ route('invorecToMail') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <table class="w-full whitespace-no-wrap">
            <thead>
                <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    <th class="px-4 py-3"><input id="checkAll" type="checkbox"></th>
                    <th class="px-4 py-3">Name</th>
                    <th class="px-4 py-3">Parent</th>
                    <th class="px-4 py-3">City</th>
                    <th class="px-4 py-3">Country</th>
                    <th class="px-4 py-3">Status</th>
                    <th class="px-4 py-3">Program</th>
                    <th class="px-4 py-3">Level</th>
                    <th class="px-4 py-3">Currency</th>
                    <th class="px-4 py-3">Price</th>
                    <th class="px-4 py-3">Month</th>
                    <th class="px-4 py-3">Status Payment</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-darker">

                @forelse ($students as $item)
                <tr class="text-gray-700 dark:text-gray-400">
                    <td class="px-4 py-3 text-sm">
                        <input type="checkbox" name="student[{{ $item->id }}]">
                    </td>
                    <td class="px-4 py-3 text-sm">
                    {{ $item->student->name }}
                    </td>
                    <td class="px-4 py-3 text-sm">
                    {{ $item->student->parent == null ? '-' : $item->student->parent }}
                    </td>
                    <td class="px-4 py-3 text-sm">
                    {{ $item->student->city == null ? '-' : $item->student->city }}
                    </td>
                    <td class="px-4 py-3 text-sm">
                    {{ $item->student->country == null ? '-' : $item->student->country }}
                    </td>
                    <td class="px-4 py-3 text-sm">
                    <div class="font-semibold uppercase rounded py-[2px] px-2 bold @if($item->student->status == 'paid') bg-green-500 @elseif ($item->student->status == 'active') bg-green-500 @elseif ($item->student->status == 'non-active') bg-red-500 @endif">
                        <p class="text-white text-center">
                            @if ($item->student->status == 'active')
                                ACTIVE
                                </p>
                            @elseif ($item->student->status == 'non-active')
                                NON-ACTIVE
                                </p>
                            @else
                                </p>
                                -
                            @endif
                    </div>
                    </td>
                    <td class="px-4 py-3 text-sm">
                    {{ $item->level->program->name }}
                    </td>
                    <td class="px-4 py-3 text-sm">
                    {{ $item->level->name }}
                    </td>
                    <td class="px-4 py-3 text-sm">
                        @if ($item->currency == 'USD')
                        USD
                        @elseif ($item->currency == 'IDR')
                        IDR
                        @endif
                    </td>
                    <td class="px-4 py-3 text-sm">
                    {{ $item->currency == 'USD' ? '$'.$item->price: 'Rp. '.number_format($item->price, 0, ',', ',') }}
                    </td>
                    <td class="px-4 py-3 text-sm">
                    @if ($item->month == 1)
                        January
                    @elseif ($item->month == 2)
                        February
                    @elseif ($item->month == 3)
                        March
                    @elseif ($item->month == 4)
                        April
                    @elseif ($item->month == 5)
                        May
                    @elseif ($item->month == 6)
                        June
                    @elseif ($item->month == 7)
                        July
                    @elseif ($item->month == 8)
                        August
                    @elseif ($item->month == 9)
                        September
                    @elseif ($item->month == 10)
                        October
                    @elseif ($item->month == 11)
                        November
                    @elseif ($item->month == 12)
                        December
                    @endif
                    </td>
                    <td class="px-4 py-3 text-sm">
                    <p class="rounded text-center font-bold uppercase text-white py-1 bold @if($item->status == 'paid') bg-green-500 @elseif ($item->status == 'paid_manually') bg-green-500 @elseif ($item->status == 'unpaid') bg-red-500 @elseif ($item->status == 'pending') bg-yellow-500 @endif">
                        {{ $item->status }}
                    </p>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="12" class="text-center text-gray-500 px-4 py-3">
                    <p>
                        Data is empty..
                    </p>
                    </td>
                </tr>
                @endforelse

            </tbody>
        </table>
    </form>
  </div>
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
