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
      
      <div class="grid grid-cols-1 mt-5 mx-7">
        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Student's Name</label>
        <input name="name" class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" type="lock" placeholder="Student's Name" />
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5 mx-7">
        <div class="grid grid-cols-1">
          <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Student's Program</label>
          <select class="py-2 px-3 rounded-lg border-2 bg-white border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent">
            <option selected>- - choose program - -</option>
            <option class="uppercase">English For Childrens</option>
            <option class="uppercase">English For Teens (Adults)</option>
            <option class="uppercase">English For Business</option>
            <option class="uppercase">English Conversations</option>
            <option class="uppercase">English Test Preparations</option>
            <option class="uppercase">Test / Exams</option>
          </select>
        </div>

        <div class="grid grid-cols-1">
          <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Student's Level</label>
          <select class="py-2 px-3 rounded-lg border-2 bg-white border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent">
            <option selected>- - choose level - -</option>
            <option>EFC Starter</option>
            <option>EFC Beginner I - Level 1</option>
            <option>EFC Beginner I - Level 2</option>
            <option>EFC Beginner I - Level 3</option>
            <option>EFC Elementary I - Level 1</option>
            <option>EFC Elementary I - Level 2</option>
            <option>EFC Elementary I - Level 3</option>
            <option>EFC Elementary II - Level 1</option>
            <option>EFC Elementary II - Level 2</option>
            <option>EFC Elementary II - Level 3</option>
          </select>
        </div>
      </div>

      {{-- <div class="grid grid-cols-1 mt-5 mx-7">
        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Recipient Bank</label>
        <input name="recipient" class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" type="text" placeholder="Recipient Bank" />
      </div> --}}

      <div class="grid grid-cols-1 mt-5 mx-7">
        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Recipient Bank</label>
        <select class="py-2 px-3 rounded-lg border-2 bg-white border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent">
          <option selected>- - choose bank - -</option>
          <option>BANK RAKYAT INDONESIA - 002</option>
          <option>BANK MANDIRI - 008</option>
          <option>BANK NEGARA INDONESIA (BNI46) - 008</option>
          <option>BANK TABUNGAN NEGARA - 200</option>
          <option>BPD KALIMANTAN TENGAH -	125</option>
          <option>BPD SULAWESI SELATAN DAN SULAWESI BARAT -	126</option>
          <option>BPD SULAWESI UTARA DAN  GORONTALO -	127</option>
          <option>BBANK NTB SYARIAH	- 128</option>
          <option>BPD MALUKU DAN MALUKU UTARA -	131</option>
        </select>
      </div>

      <div class="grid grid-cols-1 mt-5 mx-7">
        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Amount</label>
        <input name="amount" class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" type="text" placeholder="Amount" />
      </div>

      <div class="grid grid-cols-1 mt-5 mx-7">
        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold mb-1">Upload Payment Receipt</label>
          <div class='flex items-center justify-center w-full'>
              <label class='flex flex-col border-4 border-dashed rounded-md w-full h-32 hover:bg-gray-100 hover:border-blue-300 group'>
                  <div class='flex flex-col items-center justify-center pt-7'>
                    <svg class="w-10 h-10 text-blue-400 group-hover:text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    <p class='lowercase text-sm text-gray-400 group-hover:text-blue-600 pt-1 tracking-wider'>Select a photo</p>
                  </div>
                <input name="evidence" type='file' class="hidden" />
              </label>
          </div>
          <p class="text-sm mt-2 text-gray-400">Note: acceptable format jpg, png, gif, pdf, max size 500kb</p>
      </div>

      <div class="grid grid-cols-1 mt-5 mx-7">
        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Notes</label>
        <textarea name="note" class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" rows="7"></textarea>
      </div>

      <div class='flex items-center justify-center pt-10'>
        <button class='w-full bg-blue-600 hover:bg-blue-700 rounded-b-lg shadow-xl font-bold text-xl text-white transition-colors duration-100 py-5' type="submit">Submit</button>
      </div>

    </div>
  </div>
@endsection
