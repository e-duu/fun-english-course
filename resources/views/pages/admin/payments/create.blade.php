@extends('layouts.dash')
@section('title')
  Fun English Course | Payment Creates
@endsection
@section('sub-title')
  Create Payments
@endsection
@section('content')
  <form id="payments" action="{{ route('payment.store') }}" method="POST" class="px-4 py-3 bg-white rounded-lg shadow-md dark:bg-gray-800" enctype="multipart/form-data">
    @csrf

    <label class="block mt-4 text-sm">
      <span class="text-gray-700 dark:text-gray-400">
        Student Name
      </span>
      <select name="user_id" class="block w-full mt-1 text-sm rounded-md border-gray-400  dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:focus:shadow-outline-gray">
      @foreach ($users as $user)
          <option value="{{ $user->id }}" >{{ $user->name }}</option>
        @endforeach
      </select>
      @error('user_id')
        <div class="mt-1 text-sm text-[red]">
          <i class="fas fa-dot-circle text-xs"></i> {{ $message }}
        </div>
      @enderror
    </label>


    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-8">
      <div class="grid grid-cols-1">
        <label class="block mt-4 text-sm">
          <span class="text-gray-700 dark:text-gray-400">
            Program
          </span>
          <select @change="setPrograms(programs_id)" v-model="programs_id" name="program_id" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray rounded-md border-gray-400 -600 dark:bg-gray-700 form-select focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:focus:shadow-outline-gray">
            @foreach ($programs as $program)
              <option value="{{ $program->id }}" >{{ $program->name }}</option>
            @endforeach
          </select>
          @error('program_id')
            <div class="mt-1 text-sm text-[red]">
              <i class="fas fa-dot-circle text-xs"></i> {{ $message }}
            </div>
          @enderror
        </label>
      </div>

      <div class="grid grid-cols-1">
        <label class="block mt-4 text-sm">
          <span class="text-gray-700 dark:text-gray-400">
            Level
          </span>
          <select name="level_id" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray rounded-md border-gray-400 -600 dark:bg-gray-700 form-select focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:focus:shadow-outline-gray">
            <option v-for="level in selectedLevels" :value="level.id" >@{{ level.name }}</option>
          </select>
          @error('level_id')
            <div class="mt-1 text-sm text-[red]">
              <i class="fas fa-dot-circle text-xs"></i> {{ $message }}
            </div>
          @enderror
        </label>
      </div>
    </div>
    
    <label class="block mt-4 text-sm">
      <span class="text-gray-700 dark:text-gray-400">
        Recipient Bank
      </span>
      <select name="recipient_id" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border rounded-md border-gray-400 -gray-600 dark:bg-gray-700 form-select focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:focus:shadow-outline-gray">
        @foreach ($recipients as $recipient)
          <option value="{{ $recipient->id }}" >{{ $recipient->name }}</option>
        @endforeach
      </select>
      @error('recipient_id')
        <div class="mt-1 text-sm text-[red]">
          <i class="fas fa-dot-circle text-xs"></i> {{ $message }}
        </div>
      @enderror
    </label>

    <label class="block text-sm" style="margin-top: 20px">
      <span class="text-gray-700 dark:text-gray-400">Amount</span>
      <input type="number" name="amount" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray rounded-md border-gray-400" placeholder="3"/>
      @error('amount')
        <div class="mt-1 text-sm text-[red]">
          <i class="fas fa-dot-circle text-xs"></i> {{ $message }}
        </div>
      @enderror
    </label>

    <label class="block text-sm mt-4">
      <span class="text-gray-700 dark:text-gray-400">Payment Reciept</span>
      <input type="file" name="photo_file" class="border w-full mt-1 text-sm rounded-md border-gray-400 py-1 px-2 dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray" value="{{ old('photo_file') }}" />
      @error('photo_file')
        <div class="mt-2 text-[red]">
          <i class="fas fa-dot-circle"></i> {{ $message }}
        </div>
      @enderror
    </label>

    <label class="block mt-4 text-sm">
      <span class="text-gray-700 dark:text-gray-400">Notes</span>
      <textarea name="note" class="block w-full mt-1 text-sm rounded-md border-gray-400 dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:focus:shadow-outline-gray" rows="3" placeholder="Enter some long content."
      ></textarea>
      @error('note')
        <div class="mt-1 text-sm text-[red]">
          <i class="fas fa-dot-circle text-xs"></i> {{ $message }}
        </div>
      @enderror
    </label>
    
    <button class="mt-4 bg-blue-600 py-2 px-7 rounded-md text-white">Sumbit</button>

  </form>
@endsection


@push('after-script')
  <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
  <script>
    var payments = new Vue({
      el: "#payments",
      mounted() {
        
      },
      data: {
        programs: @json($programs ),
        levels: @json($levels),
        selectedLevels: null,
        programs_id: 1,
      },
      methods: {
        setPrograms(id) {
        let selectedLevel = this.levels.filter(e => e.program_id == id)
        this.selectedLevels = selectedLevel
          console.log(selectedLevel)
        }
      },
    });
  </script>
@endpush