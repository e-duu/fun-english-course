@extends('layouts.dash')
@section('title')
  Fun English Course | Student Edit
@endsection
@section('sub-title')
  Edit Students
@endsection
@section('content')
  <form id="payments" action="{{ route('student.update', $data->id) }}" method="POST" class="px-4 py-3 bg-white rounded-lg shadow-md dark:bg-gray-800">
    @csrf
    @method('POST')
    <label class="block mt-4 text-sm">
        <span class="text-gray-700 dark:text-gray-400">
            Student
        </span>
        <select id="select-search" onchange="setUsers()" name="user_id" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border rounded-md border-gray-400 -gray-600 dark:bg-gray-700 form-select focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:focus:shadow-outline-gray">
          <option disabled selected>Please Select One...</option>
            @foreach ($users as $user)
              <option value="{{ $user->id }}" {{ $user->id == $data->user_id ? 'selected' : '' }}>{{ $user->name }}</option>
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
      <select id="selectLevel" name="level_id" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border rounded-md border-gray-400 -gray-600 dark:bg-gray-700 form-select focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:focus:shadow-outline-gray"></select>
      @error('level_id')
          <div class="mt-1 text-sm text-[red]">
              <i class="fas fa-dot-circle text-xs"></i> {{ $message }}
          </div>
      @enderror
    </label>

    <label class="block mt-2 text-sm">
        <span class="text-gray-700 dark:text-gray-400">
            Currency
        </span>
        <select name="currency" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border rounded-md border-gray-400 -gray-600 dark:bg-gray-700 form-select focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:focus:shadow-outline-gray">
          <option value="IDR">IDR</option>
          <option value="USD">USD</option>
        </select>
        @error('currency')
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
      <span class="text-gray-700 dark:text-gray-400">if the currency is IDR the last number must be 000</span>
          @error('price')
              <div class="mt-1 text-sm text-[red]">
                  <i class="fas fa-dot-circle text-xs"></i> {{ $message }}
              </div>
          @enderror
    </label>

    <label class="block mt-2 text-sm">
      <span class="text-gray-700 dark:text-gray-400">
          Year
      </span>
      <select name="year" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border rounded-md border-gray-400 -gray-600 dark:bg-gray-700 form-select focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:focus:shadow-outline-gray">
          <option value="{{date('Y')}}">{{date('Y')}}</option>
          <option value="{{date('Y') + 1}}">{{date('Y') + 1}}</option>
          <option value="{{date('Y') + 2}}">{{date('Y') + 2}}</option>
      </select>
      @error('year')
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

    <button class="mt-4 bg-blue-600 py-2 px-7 rounded-md text-white">Submit</button>

  </form>
@endsection

@push('after-style')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />
@endpush

@push('after-script')
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>

  <script>
    $(document).ready(function () {
        $('#select-search').selectize({
            sortField: 'text'
        });
    });
  </script>

  <script>
      const users = JSON.parse('{{$users}}'.replace(/&quot;/g,'"'));
      const levelUsers = JSON.parse('{{$levelUsers}}'.replace(/&quot;/g,'"'));
      var users_id = null
      var selectedLevels = null

      console.log(levelUsers)

      function setUsers(){
        var options = "";
        document.getElementById('selectLevel').innerHTML = options;
        var value = document.getElementById('select-search').value;
        let selectedLevel = levelUsers.filter(levelUser => levelUser.user_id == value);
        console.log(selectedLevel)

        selectedLevel.forEach(element => {
          options += "<option value='"+element.level.id+"'>"+element.level.name+"</option>";
          document.getElementById('selectLevel').innerHTML = options;
        });
      }
  </script>
@endpush

