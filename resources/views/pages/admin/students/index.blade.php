@extends('layouts.dash')
@section('title')
  Fun English Course | Program Pages
@endsection
@section('sub-title')
  List Programs
@endsection
@section('content')

<div class="flex item-center justify-between space-x-2">
    {{-- Modal Create --}}
    <div x-data="{ showModal : false }">
      <!-- Button -->
      <button @click="showModal = !showModal" class="px-4 py-2 text-sm bg-blue-600 rounded-md transition-colors duration-150 ease-linear text-white focus:outline-none focus:ring-0 font-semibold hover:bg-blue-700">Add Spp</button>

      <!-- Modal Background -->
      <div x-show="showModal" class="fixed text-gray-500 flex items-center justify-center overflow-auto z-50 bg-black bg-opacity-40 left-0 right-0 top-0 bottom-0" x-transition:enter="transition ease duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
              <!-- Modal -->
          <div x-show="showModal" class="bg-white rounded-xl shadow-2xl p-6 w-80 sm:w-3/6 mx-10" @click.away="showModal = false" x-transition:enter="transition ease duration-100 transform" x-transition:enter-start="opacity-0 scale-90 translate-y-1" x-transition:enter-end="opacity-100 scale-100 translate-y-0" x-transition:leave="transition ease duration-100 transform" x-transition:leave-start="opacity-100 scale-100 translate-y-0" x-transition:leave-end="opacity-0 scale-90 translate-y-1">
              <!-- Title -->
              <span class="font-bold block text-2xl mb-3">Create Spp </span>
              <div class="border-b border-gray-500 mb-5"></div>
                  <!-- Some beer 🍺 -->
                  <form id="payments" action="{{ route('student.store') }}" method="POST">
                      @csrf
                      @method('POST')
                      <label class="block mt-4 text-sm">
                          <span class="text-gray-700 dark:text-gray-400">
                              Student
                          </span>
                          <select @change="setUsers(users_id)" v-model="users_id" name="user_id" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border rounded-md border-gray-400 -gray-600 dark:bg-gray-700 form-select focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:focus:shadow-outline-gray">
                              @foreach ($users as $user)
                                  <option value="{{ $user->id }}">{{ $user->name }}</option>
                              @endforeach
                          </select>
                          @error('user_id')
                              <div class="mt-1 text-sm text-[red]">
                                  <i class="fas fa-dot-circle text-xs"></i> {{ $message }}
                              </div>
                          @enderror
                      </label>

                      <label class="block mt-2 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">
                            Level
                        </span>
                        <select name="level_id" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border rounded-md border-gray-400 -gray-600 dark:bg-gray-700 form-select focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:focus:shadow-outline-gray">
                            <option v-for="level in selectedLevels" :value="level.level.id">@{{ level.level.name }}</option>
                        </select>
                        @error('level_id')
                            <div class="mt-1 text-sm text-[red]">
                                <i class="fas fa-dot-circle text-xs"></i> {{ $message }}
                            </div>
                        @enderror
                      </label>

                      <label class="block mt-2 text-sm">
                          <span class="text-gray-700 dark:text-gray-400">
                              Price
                          </span>
                          <input name="price" type="number" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border rounded-md border-gray-400 -gray-600 dark:bg-gray-700 form-select focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:focus:shadow-outline-gray">
                          @error('price')
                              <div class="mt-1 text-sm text-[red]">
                                  <i class="fas fa-dot-circle text-xs"></i> {{ $message }}
                              </div>
                          @enderror
                      </label>

                      <label class="flex-col text-sm">
                        <div class="text-gray-700 mt-2 dark:text-gray-400">
                            Month
                        </div>
                        <div class="flex space-x-10 items-center w-full">
                          <div class="flex-col">
                            <label class="flex items-center">
                              <input type="checkbox" class="form-checkbox rounded-md border-blue-600 h-5 w-5 text-blue-600" value="1" name="months[]">
                              <span class="ml-2 text-xs sm:text-lg text-gray-700 dark:text-white">January</span>
                            </label>

                            <label class="flex items-center">
                              <input type="checkbox" class="form-checkbox rounded-md border-blue-600 h-5 w-5 text-blue-600" value="2" name="months[]">
                              <span class="ml-2 text-xs sm:text-lg text-gray-700 dark:text-white">February</span>
                            </label>

                            <label class="flex items-center">
                              <input type="checkbox" class="form-checkbox rounded-md border-blue-600 h-5 w-5 text-blue-600" value="3" name="months[]">
                              <span class="ml-2 text-xs sm:text-lg text-gray-700 dark:text-white">March</span>
                            </label>

                            <label class="flex items-center">
                              <input type="checkbox" class="form-checkbox rounded-md border-blue-600 h-5 w-5 text-blue-600" value="4" name="months[]">
                              <span class="ml-2 text-xs sm:text-lg text-gray-700 dark:text-white">April</span>
                            </label>

                            <label class="flex items-center">
                              <input type="checkbox" class="form-checkbox rounded-md border-blue-600 h-5 w-5 text-blue-600" value="5" name="months[]">
                              <span class="ml-2 text-xs sm:text-lg text-gray-700 dark:text-white">May</span>
                            </label>

                            <label class="flex items-center">
                              <input type="checkbox" class="form-checkbox rounded-md border-blue-600 h-5 w-5 text-blue-600" value="6" name="months[]">
                              <span class="ml-2 text-xs sm:text-lg text-gray-700 dark:text-white">June</span>
                            </label>
                          </div>
                          <div class="flex-col">
                            <label class="flex items-center">
                              <input type="checkbox" class="form-checkbox rounded-md border-blue-600 h-5 w-5 text-blue-600" value="7" name="months[]">
                              <span class="ml-2 text-xs sm:text-lg text-gray-700 dark:text-white">July</span>
                            </label>
                            
                            <label class="flex items-center">
                              <input type="checkbox" class="form-checkbox rounded-md border-blue-600 h-5 w-5 text-blue-600" value="8" name="months[]">
                              <span class="ml-2 text-xs sm:text-lg text-gray-700 dark:text-white">August</span>
                            </label>

                            <label class="flex items-center">
                              <input type="checkbox" class="form-checkbox rounded-md border-blue-600 h-5 w-5 text-blue-600" value="9" name="months[]">
                              <span class="ml-2 text-xs sm:text-lg text-gray-700 dark:text-white">September</span>
                            </label>
                            
                            <label class="flex items-center">
                              <input type="checkbox" class="form-checkbox rounded-md border-blue-600 h-5 w-5 text-blue-600" value="10" name="months[]">
                              <span class="ml-2 text-xs sm:text-lg text-gray-700 dark:text-white">October</span>
                            </label>
                            
                            <label class="flex items-center">
                              <input type="checkbox" class="form-checkbox rounded-md border-blue-600 h-5 w-5 text-blue-600" value="11" name="months[]">
                              <span class="ml-2 text-xs sm:text-lg text-gray-700 dark:text-white">November</span>
                            </label>
                            
                            <label class="flex items-center">
                              <input type="checkbox" class="form-checkbox rounded-md border-blue-600 h-5 w-5 text-blue-600" value="12" name="months[]">
                              <span class="ml-2 text-xs sm:text-lg text-gray-700 dark:text-white">December</span>
                            </label>
                          </div>
                        </div>
                      </label>

                      <div class="border-b border-gray-500 my-5"></div>

                      <!-- Buttons -->
                      <div class="flex-col sm:flex-row sm:justify-end text-center sm:text-right space-y-2 sm:space-x-2 mt-5">

                      <button type="button" x-on:click="showModal = !showModal" class="w-full sm:w-auto sm:px-4 py-2 text-xs sm:text-sm bg-gray-600 rounded-md transition-colors duration-150 ease-linear text-white focus:outline-none focus:ring-0 font-semibold hover:bg-gray-700">Cancel</button>

                      <button formaction="{{ route('student.store') }}" class="w-full sm:w-auto sm:px-4 py-2 text-xs sm:text-sm bg-blue-600 rounded-md transition-colors duration-150 ease-linear text-white focus:outline-none focus:ring-0 font-semibold hover:bg-blue-700">Submit </button>
                  </form>
              </div>
          </div>
      </div>
  </div>
</div>

  <div class="w-full overflow-hidden rounded-lg shadow-xs mt-4">
    <div class="w-full overflow-x-auto">
    <table class="w-full whitespace-no-wrap">
      <thead>
        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
            <th class="px-4 py-3">Program Name</th>
            <th class="px-4 py-3">Actions</th>
        </tr>
      </thead>
      <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-darker">

        @forelse ($data as $item)
          <tr class="text-gray-700 dark:text-gray-400">
            <td class="px-4 py-3 text-sm">
              {{ $item->name }}
            </td>
            <td class="px-4 py-3">
              <div class="flex items-center space-x-4 text-sm">
                <a href="{{ route('student.show', $item->id) }}" class="flex-col text-center px-2 py-2 text-sm font-medium leading-5 text-blue-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray">
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
    <div class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
      <div class="text-center w-auto sm:w-[565px] md:w-[980px] 2xl:w-[1335px] ">
        {{ $data->links() }}
      </div>
    </div>
  </div>
@endsection

@push('after-script')
  <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
  <script>
      var payments = new Vue({
          el: "#payments",
          mounted() {

          },
          data: {
              users: @json($users ),
              levels: @json($levels),
              levelUsers: @json($levelUsers),
              selectedLevels: null,
              users_id: null,
          },
          methods: {
              setUsers(id) {
                  let selectedLevel = this.levelUsers.filter(e => e.user_id == id)
                  this.selectedLevels = selectedLevel
                  console.log(selectedLevel)
              }
          },
      });
  </script>
@endpush
