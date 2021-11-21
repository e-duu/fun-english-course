@extends('layouts.dash')
@section('title')
  Fun English Course | Payment Edit
@endsection
@section('sub-title')
  Edit Payments
@endsection
@section('content')
  <form action="#" method="POST" class="px-4 py-3 bg-white rounded-lg shadow-md dark:bg-gray-800">

    <label class="block mt-4 text-sm">
      <span class="text-gray-700 dark:text-gray-400">
        Student Name
      </span>
      <select name="user_id" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
        <option value="1" >Ramadhan Tri</option>
        <option value="1" >Septian</option>
        <option value="1" >Faiz Rizky</option>
        <option value="1" >Mujiono</option>
      </select>
    </label>
    
    <label class="block mt-4 text-sm">
      <span class="text-gray-700 dark:text-gray-400">
        Program
      </span>
      <select name="program_id" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
        <option value="1" >English For Children</option>
        <option value="1" >English For Teens</option>
        <option value="1" >English For Business</option>
        <option value="1" >English Conversation</option>
        <option value="1" >English Test Preparation</option>
        <option value="1" >Text / Exams</option>
      </select>
    </label>

    <label class="block mt-4 text-sm">
      <span class="text-gray-700 dark:text-gray-400">
        Level
      </span>
      <select name="level_id" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
        <option value="1" >EFC Starter</option>
        <option value="1" >EFC Beginner I - Level 1</option>
        <option value="1" >EFC Beginner I - Level 2</option>
        <option value="1" >EFC Beginner I - Level 3</option>
        <option value="1" >EFC Elementary I - Level 1</option>
        <option value="1" >EFC Elementary I - Level 2</option>
        <option value="1" >EFC Elementary I - Level 3</option>
        <option value="1" >EFC Elementary II - Level 1</option>
        <option value="1" >EFC Elementary II - Level 2</option>
        <option value="1" >EFC Elementary II - Level 3</option>
      </select>
    </label>

    <label class="block mt-4 text-sm">
      <span class="text-gray-700 dark:text-gray-400">
        Recipient Bank
      </span>
      <select name="recipient_id" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
        <option value="1" >BANK RAKYAT INDONESIA - 002</option>
        <option value="1" >BANK MANDIRI - 008</option>
        <option value="1" >BANK NEGARA INDONESIA (BNI46) - 008</option>
        <option value="1" >BANK TABUNGAN NEGARA - 200</option>
        <option value="1" >BPD KALIMANTAN TENGAH -	125</option>
        <option value="1" >BPD SULAWESI SELATAN DAN SULAWESI BARAT -	126</option>
        <option value="1" >BPD SULAWESI UTARA DAN  GORONTALO -	127</option>
        <option value="1" >BBANK NTB SYARIAH	- 128</option>
        <option value="1" >BPD MALUKU DAN MALUKU UTARA -	131</option>
      </select>
    </label>

    <label class="block text-sm" style="margin-top: 20px">
      <span class="text-gray-700 dark:text-gray-400">Amount</span>
      <input type="text" name="amount" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Jane Doe"/>
    </label>

    <label class="block text-sm" style="margin-top: 20px">
      <span class="text-gray-700 dark:text-gray-400">Payment Receipt</span>
      <input type="file" name="evidence" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Jane Doe"/>
    </label>

    <label class="block mt-4 text-sm">
      <span class="text-gray-700 dark:text-gray-400">Notes</span>
      <textarea name="note" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" rows="3" placeholder="Enter some long content."
      ></textarea>
    </label>
    
    <button style="padding: 8px 20px; background-color: blueviolet; margin-top: 20px;" class="rounded-md text-white">Sumbit</button>

  </form>
@endsection


