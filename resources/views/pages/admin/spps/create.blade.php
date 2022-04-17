@extends('layouts.dash')
@section('title')
  Fun English Course | Spp Create
@endsection
@section('sub-title')
  Create Spps
@endsection
@section('content')
  <form id="payments" action="{{ route('spp.store') }}" method="POST" class="px-4 py-3 bg-white rounded-lg shadow-md dark:bg-gray-800">
    @csrf

    <label class="block mt-4 text-sm">
      <span class="text-gray-700 dark:text-gray-400">
        Student Name
      </span>
      <select @change="setUsers(users_id)" v-model="users_id" name="user_id" class="block w-full mt-1 text-sm rounded-md border-gray-400  dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:focus:shadow-outline-gray">
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

    <label class="block mt-4 text-sm">
      <span class="text-gray-700 dark:text-gray-400">
        Level
      </span>
      <select name="level_id" class="block w-full mt-1 text-sm rounded-md border-gray-400  dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:focus:shadow-outline-gray">
        <option v-for="level in selectedLevels" :value="level.level.id">@{{ level.level.name }}</option>
      </select>
      @error('level_id')
        <div class="mt-1 text-sm text-[red]">
          <i class="fas fa-dot-circle text-xs"></i> {{ $message }}
        </div>
      @enderror
    </label>

    <label class="block mt-4 text-sm">
      <span class="text-gray-700 dark:text-gray-400">
        Month
      </span>
      <select name="month" class="block w-full mt-1 text-sm rounded-md border-gray-400  dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:focus:shadow-outline-gray">
        <option value="1" >January</option>
        <option value="2" >February</option>
        <option value="3" >March</option>
        <option value="4" >April</option>
        <option value="5" >May</option>
        <option value="6" >June</option>
        <option value="7" >July</option>
        <option value="8" >August</option>
        <option value="9" >September</option>
        <option value="10" >October</option>
        <option value="11" >November</option>
        <option value="12" >December</option>
      </select>
      @error('month')
        <div class="mt-1 text-sm text-[red]">
          <i class="fas fa-dot-circle text-xs"></i> {{ $message }}
        </div>
      @enderror
    </label>

    <label class="block text-sm mt-4">
      <span class="text-gray-700 dark:text-gray-400">Price</span>
      <input type="number" name="price" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray rounded-md border-gray-400" placeholder="30000"/>
      @error('price')
        <div class="mt-1 text-sm text-[red]">
          <i class="fas fa-dot-circle text-xs"></i> {{ $message }}
        </div>
      @enderror
    </label>

    <button class="mt-4 bg-blue-600 py-2 px-7 rounded-md text-white">Submit</button>

  </form>
@endsection

@push('after-script')
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
    <script src="https://www.paypal.com/sdk/js?client-id=sb&enable-funding=venmo&currency=USD" data-sdk-integration-source="button-factory"></script>
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
