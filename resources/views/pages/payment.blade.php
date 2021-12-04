@extends('layouts.app')
@section('title')
    Fun English Course - Payment
@endsection
@section('content')
  <div class="container-fluid px-20 mt-16">
    <div class="grid bg-gray-50 rounded-lg mx-auto shadow-xl w-11/12 md:w-9/12 lg:w-1/2">
      <div class="bg-blue-600 rounded-t-lg py-6 mb-5">
        <h1 class="text-white text-center font-bold text-2xl">Payment Confirmation</h1>
      </div>
          <form id="payments" action="{{ route('payment.post') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="grid grid-cols-1 mt-5 mx-7">
              <label class="uppercase md:text-sm text-xs text-gray-600 font-semibold">Student Name</label>
              <input class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" type="text" value="{{ Auth::user()->name }}" disabled />
              <input name="user_id" type="hidden" value="{{ Auth::user()->id }}" />
            </div>
      
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5 mx-7">
              <div class="grid grid-cols-1">
                <label class="uppercase md:text-sm text-xs text-gray-600 font-semibold">Student's Program</label>
                <select @change="setPrograms(programs_id)" v-model="programs_id" name="program_id" class="py-2 px-3 rounded-lg border-2 bg-white border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent">
                  <option selected >Choose Program</option>
                  @foreach ($programs as $program)
                    <option value="{{ $program->id }}">{{ $program->name }}</option>
                  @endforeach
                </select>
              </div>
      
              <div class="grid grid-cols-1">
                <label class="uppercase md:text-sm text-xs text-gray-600 font-semibold">Student's Level</label>
                <select name="level_id" class="py-2 px-3 rounded-lg border-2 bg-white border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent">
                  <option v-for="level in selectedLevels" :value="level.id" >@{{ level.name }}</option>
                </select>
              </div>
            </div>
      
            <div class="grid grid-cols-1 mt-5 mx-7">
              <label class="uppercase md:text-sm text-xs text-gray-600 font-semibold">Recipient Bank</label>
              <select name="recipient_id" class="py-2 px-3 rounded-lg border-2 bg-white border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent">
                <option selected>Choose Recipient Bank</option>
                @foreach ($recipients as $recipient)
                  <option value="{{ $recipient->id }}" >{{ $recipient->name }}</option>
                @endforeach
              </select>
            </div>
      
            <div class="grid grid-cols-1 mt-5 mx-7">
              <label class="uppercase md:text-sm text-xs text-gray-600 font-semibold">Amount</label>
              <input name="amount" class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" type="number" placeholder="Amount" />
            </div>
      
            <div class="grid grid-cols-1 mt-5 mx-7">
              <label class="uppercase md:text-sm text-xs text-gray-600 font-semibold mb-1">Upload Payment Receipt</label>
                <div class='flex items-center justify-center w-full'>
                    <label class='flex flex-col border-4 border-dashed rounded-md w-full h-32 hover:bg-gray-100 hover:border-blue-300 group transition-colors duration-200'>
                        <div class='flex flex-col items-center justify-center pt-7'>
                          <svg class="w-10 h-10 text-blue-400 group-hover:text-blue-600 transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002tKabupavidence" type='file' class="hidden" />
                    </label>
                </div>
                <p class="text-sm mt-2 text-gray-400">Note: acceptable format jpg, png, gif, pdf, max size 2mb</p>
            </div>
      
            <div class="grid grid-cols-1 mt-5 mx-7">
              <label class="uppercase md:text-sm text-xs text-gray-600 font-semibold">Notes</label>
              <textarea name="note" class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" rows="7"></textarea>
            </div>
      
            <div class='flex items-center justify-center pt-10'>
              <button class='w-full bg-blue-600 hover:bg-blue-700 rounded-b-lg shadow-xl font-bold text-xl text-white transition-colors duration-100 py-5' type="submit">Submit</button>
            </div>
      
          </form>

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
