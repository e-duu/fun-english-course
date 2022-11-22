<div>
    <div>
      @if (session()->has('success'))
          <div class="flex justify-between w-full py-4 px-5 bg-green-200 dark:bg-green-500 overflow-hidden rounded-sm shadow-xs items-center shadow-lg mb-5 sm:mb-7">
              <div class="flex items-center tex-xs sm:text-lg">
                  {{session()->get('success')}}
              </div>
          </div>
      @endif
    
    <div class="flex item-center justify-between space-x-2">
      <div class="flex space-x-2 items-center">
          {{-- button Send To Mail --}}
          <a href="{{route('send-to-mail-page', $data->id)}}" class="px-4 py-2 text-sm bg-blue-600 rounded-md transition-colors duration-150 ease-linear text-white focus:outline-none focus:ring-0 font-semibold hover:bg-blue-700">Send Mail</a>
          {{-- Modal import --}}
          <div x-data="{ showModal : false }">
              <!-- Button -->
              <button @click="showModal = !showModal" class="px-4 py-2 text-sm bg-blue-600 rounded-md transition-colors duration-150 ease-linear text-white focus:outline-none focus:ring-0 font-semibold hover:bg-blue-700">Import </button>

              <!-- Modal Background -->
              <div x-show="showModal" class="fixed text-gray-500 flex items-center justify-center overflow-auto z-50 bg-black bg-opacity-40 left-0 right-0 top-0 bottom-0" x-transition:enter="transition ease duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                  <!-- Modal -->
                  <div x-show="showModal" class="bg-white rounded-xl shadow-2xl p-6 w-80 sm:w-3/6 mx-10" @click.away="showModal = false" x-transition:enter="transition ease duration-100 transform" x-transition:enter-start="opacity-0 scale-90 translate-y-1" x-transition:enter-end="opacity-100 scale-100 translate-y-0" x-transition:leave="transition ease duration-100 transform" x-transition:leave-start="opacity-100 scale-100 translate-y-0" x-transition:leave-end="opacity-0 scale-90 translate-y-1">
                          <!-- Title -->
                          <span class="font-bold block text-2xl mb-3">Import </span>
                          <div class="border-b border-gray-500 mb-5"></div>
                          <!-- Some beer 🍺 -->
                          <form action="{{route('import.excel.invoice', $data->id)}}" method="POST" enctype="multipart/form-data">
                              @csrf
                              @method('POST')
                              <div class='flex items-center justify-center w-full'>
                                  <label class='flex flex-col border-4 border-dashed rounded-md w-full h-32 hover:bg-gray-100 hover:border-blue-300 group transition-colors duration-200'>
                                          <div class='flex flex-col items-center justify-center pt-7'>
                                              <svg class="w-10 h-10 text-blue-400 group-hover:text-blue-600 transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                              <p class='lowercase text-sm text-white group-hover:text-blue-600 pt-1 tracking-wider'>Select the file</p>
                                              <input name="file" type='file' class="" />
                                          </div>
                                  </label>
                              </div>
                              <div class="border-b border-gray-500 my-5"></div>

                              <!-- Buttons -->
                              <div class="flex-col sm:flex-row sm:justify-end text-center sm:text-right space-y-2 sm:space-y-0 sm:space-x-2 mt-5">
                                  <button type="button" @click="showModal = !showModal" class="w-full sm:w-auto sm:px-4 py-2 text-xs sm:text-sm bg-red-600 rounded-md transition-colors duration-150 ease-linear text-white focus:outline-none focus:ring-0 font-semibold hover:bg-red-700">Cancel</button>

                                  <a href="{{ route('template.excel.invoice') }}" class="hidden sm:inline w-full sm:w-auto sm:px-4 py-2 sm:py-1 text-xs sm:text-sm bg-blue-600 rounded-md transition-colors duration-150 ease-linear text-white focus:outline-none focus:ring-0 font-semibold hover:bg-blue-700">Download Template</a>

                                  <button type="submit" class="w-full sm:w-auto sm:px-4 py-2 text-xs sm:text-sm bg-blue-600 rounded-md transition-colors duration-150 ease-linear text-white focus:outline-none focus:ring-0 font-semibold hover:bg-blue-700">Submit</button>
                          </form>

                          <form class="block sm:hidden" method="GET">
                              @method('GET')
                              <button formaction="{{ route('template.excel.invoice') }}" class="w-full sm:w-auto sm:px-4 py-2 text-xs sm:text-sm bg-blue-600 rounded-md transition-colors duration-150 ease-linear text-white focus:outline-none focus:ring-0 font-semibold hover:bg-blue-700">Download Template</button>
                          </form>
                      </div>
                  </div>
              </div>
          </div>
          <form method="GET" action="{{route('export.excel.invoice', $data->id)}}">
              <button class="px-4 py-2 text-sm bg-blue-600 rounded-md transition-colors duration-150 ease-linear text-white focus:outline-none focus:ring-0 font-semibold hover:bg-blue-700">Export</button>
          </form>
      </div>
      <div class="flex space-x-2 items-center">
        <a href="{{ route('student.show', $data->program_id) }}" class="bg-yellow-400 px-4 py-2 text-sm rounded-md transition-colors duration-150 ease-linear text-white focus:outline-none focus:ring-0 font-semibold hover:bg-yellow-700">Back to Level</a>
      </div>
    </div>
    
    <div class="flex justify-between space-x-2 mt-4">
      <div>
        <select name="month" wire:model="month" class="text-sm dark:text-gray-300 dark:border rounded-md border-gray-400 -gray-600 dark:bg-gray-700 form-select focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:focus:shadow-outline-gray">
            <option value="">All Month</option>
            <option value="1">January</option>
            <option value="2">February</option>
            <option value="3">March</option>
            <option value="4">April</option>
            <option value="5">Mei</option>
            <option value="6">June</option>
            <option value="7">Jule</option>
            <option value="8">August</option>
            <option value="9">September</option>
            <option value="10">October</option>
            <option value="11">November</option>
            <option value="12">December</option>
        </select>
        <select name="year" wire:model="year" class="text-sm dark:text-gray-300 dark:border rounded-md border-gray-400 -gray-600 dark:bg-gray-700 form-select focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:focus:shadow-outline-gray">
          <option value="">All Year</option>
          @for ($i=2022; $i < 2050; $i++)
            <option value="{{ $i }}">{{ $i }}</option>
          @endfor
        </select>
        <select name="status" wire:model="status" class="text-sm dark:text-gray-300 dark:border rounded-md border-gray-400 -gray-600 dark:bg-gray-700 form-select focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:focus:shadow-outline-gray">
          <option value="">All Status</option>
          <option value="paid">paid</option>
          <option value="paid_manually">paid_manually</option>
          <option value="unpaid">unpaid</option>
        </select>
      </div>
      <div>
        <input type="text" name="search" wire:model="search" class="text-sm rounded-md border-gray-400 dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Search..."/>
      </div>
    </div>
      <div class="w-full overflow-hidden rounded-lg shadow-xs mt-4">
        <div class="w-full overflow-x-auto">
          <table class="w-full whitespace-no-wrap">
            <thead>
              <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-white dark:bg-gray-800">
                  <th class="px-4 py-3">Name</th>
                  <th class="px-4 py-3">Parent</th>
                  <th class="px-4 py-3">Teacher</th>
                  <th class="px-4 py-3">City</th>
                  <th class="px-4 py-3">Country</th>
                  <th class="px-4 py-3">Student Number</th>
                  <th class="px-4 py-3">Status</th>
                  <th class="px-4 py-3">Program</th>
                  <th class="px-4 py-3">Level</th>
                  <th class="px-4 py-3">Currency</th>
                  <th class="px-4 py-3">Price</th>
                  <th class="px-4 py-3">Month</th>
                  <th class="px-4 py-3">Year</th>
                  <th class="px-4 py-3">Payment Status</th>
                  <th class="px-4 py-3">Action</th>
              </tr>
            </thead>
            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-darker">
    
              @forelse ($spps as $item)
                <tr class="text-gray-700 dark:text-white">
                  <td class="px-4 py-3 text-sm">
                    {{ $item->name }}
                  </td>
                  <td class="px-4 py-3 text-sm">
                    {{ $item->student->parent == null ? '-' : $item->student->parent }}
                  </td>
                  <td class="px-4 py-3 text-sm">
                    {{-- {{ $item->teacher->name }} --}}
                  </td>
                  <td class="px-4 py-3 text-sm">
                    {{ $item->student->city == null ? '-' : $item->student->city }}
                  </td>
                  <td class="px-4 py-3 text-sm">
                    {{ $item->student->country == null ? '-' : $item->student->country }}
                  </td>
                  <td class="px-4 py-3 text-sm">
                    {{ $item->student->number == null ? '-' : $item->student->number }}
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
                      @if ($item->currency == 'USD' || $item->currency == 'usd')
                        USD
                      @elseif ($item->currency == 'IDR' || $item->currency == 'idr')
                        IDR
                      @endif
                  </td>
                  <td class="px-4 py-3 text-sm">
                    {{ $item->currency == 'USD' || $item->currency == 'usd' ? '$'.$item->price: 'Rp. '.number_format($item->price, 0, ',', ',') }}
                  </td>
                  {{-- <td class="px-4 py-3 text-sm">
                    {{ $item->code != null ? $item->code : '-' }}
                  </td> --}}
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
                      {{$item->year}}
                  </td>
                  <td class="px-4 py-3 text-sm">
                    <p class="rounded text-center font-bold uppercase text-white py-1 bold @if($item->status == 'paid') bg-green-500 @elseif ($item->status == 'paid_manually') bg-green-500 @elseif ($item->status == 'unpaid') bg-red-500 @elseif ($item->status == 'pending') bg-yellow-500 @endif">
                      {{ $item->status }}
                    </p>
                  </td>
                  <td class="px-4 py-3">
                    <div class="flex items-center space-x-4 text-sm">
                      @if ($item->status == 'paid' or $item->status == 'paid_manually')
                          <a href="{{ route('page-receipt', $item->id) }}" class="flex-col text-center px-2 py-2 text-sm font-medium leading-5 text-blue-600 rounded-lg dark:text-white focus:outline-none focus:shadow-outline-gray">
                              <i class="fas fa-print"></i>
                              <p>Receipt</p>
                          </a>
                      @elseif ($item->status == 'unpaid' or $item->status == 'pending')
                          <a href="{{ route('page-invoice', $item->id) }}" class="flex-col text-center px-2 py-2 text-sm font-medium leading-5 text-blue-600 rounded-lg dark:text-white focus:outline-none focus:shadow-outline-gray">
                              <i class="fas fa-print"></i>
                              <p>Invoice</p>
                          </a>
                      @endif
                      <a href="{{ route('pay.manually', $item->id) }}" class="flex-col text-center px-2 py-2 text-sm font-medium leading-5 text-blue-600 rounded-lg dark:text-white focus:outline-none focus:shadow-outline-gray">
                          <i class="fas fa-money-check"></i>
                          <p>Pay</p>
                      </a>
                      @if ($item->status == 'unpaid' or $item->status == 'pending')
                          <a href="{{ route('student.edit', $item->id) }}" class="flex-col text-center px-2 py-2 text-sm font-medium leading-5 text-blue-600 rounded-lg dark:text-white focus:outline-none focus:shadow-outline-gray">
                              <i class=" fas fa-edit"></i>
                              <p>Edit</p>
                          </a>
                      @endif
                      <form action="{{ route('student.delete', $item->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="flex-col px-2 py-2 text-sm font-medium leading-5 text-blue-600 rounded-lg dark:text-white focus:outline-none focus:shadow-outline-gray">
                          <i class="fas fa-trash"></i>
                          <p>Delete</p>
                        </button>
                      </form>
                    </div>
                  </td>
    
                </tr>
              @empty
                <tr>
                  <td colspan="14" class="text-center text-gray-500 px-4 py-3">
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
          <div class="text-center w-auto sm:w-[565px] md:w-[980px] 2xl:w-[1335px] ">
            {{ $spps->links() }}
          </div>
        </div>
      </div>
    </div>
    
</div>
