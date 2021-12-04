@extends('layouts.dash')
@section('title')
  Fun English Course | Question Edit
@endsection
@section('sub-title')
  Edit Questions
@endsection
@section('content')

  @php
    $a = [
      'value' => 'a',
      'name' => 'A',
    ];

    $b = [
      'value' => 'b',
      'name' => 'B',
    ];

    $c = [
      'value' => 'c',
      'name' => 'C',
    ];

    $d = [
      'value' => 'd',
      'name' => 'D',
    ];

    $answers = [$a, $b, $c, $d] ;
  @endphp

  <form action="{{ route('recipient.update', $data->id) }}" method="POST" class="px-4 py-3 bg-white rounded-lg shadow-md dark:bg-gray-800">
    @csrf

    <label class="block mt-4 text-sm">
      <span class="text-gray-700 dark:text-gray-400">Question</span>
      <textarea name="question" class="block w-full mt-1 text-sm rounded-md border-gray-400 dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" rows="3" placeholder="Enter some long content."
      >{{ $data->question }}</textarea>
      @error('note')
        <div class="mt-1 text-sm text-[red]">
          <i class="fas fa-dot-circle text-xs"></i> {{ $message }}
        </div>
      @enderror
    </label>
    
    <label class="flex items-center space-x-2 text-sm mt-4">
      <div class="text-gray-700 dark:text-gray-400 text-md font-semibold">A&nbsp;. </div>
      <input value="{{ $data->a }}" type="text" name="a" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray rounded-md border-gray-400" placeholder="Input answer here.."/>
      @error('a')
        <div class="mt-2" style="color: rgb(255, 35, 35);">
          <i class="fas fa-dot-circle"></i> {{ $message }}
        </div>
      @enderror
    </label>
    <label class="flex items-center space-x-2 text-sm mt-4">
      <div class="text-gray-700 dark:text-gray-400 text-md font-semibold">B&nbsp;. </div>
      <input value="{{ $data->b }}" type="text" name="b" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray rounded-md border-gray-400" placeholder="Input answer here.."/>
      @error('a')
        <div class="mt-2" style="color: rgb(255, 35, 35);">
          <i class="fas fa-dot-circle"></i> {{ $message }}
        </div>
      @enderror
    </label>
    <label class="flex items-center space-x-2 text-sm mt-4">
      <div  class="text-gray-700 dark:text-gray-400 text-md font-semibold">C&nbsp;. </div>
      <input value="{{ $data->c }}" type="text" name="c" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray rounded-md border-gray-400" placeholder="Input answer here.."/>
      @error('a')
        <div class="mt-2" style="color: rgb(255, 35, 35);">
          <i class="fas fa-dot-circle"></i> {{ $message }}
        </div>
      @enderror
    </label>

    <label class="flex items-center space-x-2 text-sm mt-4">
      <div class="text-gray-700 dark:text-gray-400 text-md font-semibold">D&nbsp;. </div>
      <input value="{{ $data->d }}" type="text" name="d" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray rounded-md border-gray-400" placeholder="Input answer here.."/>
      @error('a')
        <div class="mt-2" style="color: rgb(255, 35, 35);">
          <i class="fas fa-dot-circle"></i> {{ $message }}
        </div>
      @enderror
    </label>

    <div class="mt-4 text-sm">
      <span class="text-gray-700 dark:text-gray-400">
        Answer Key
      </span>
      <div class="mt-2">
        @foreach ($answers as $answer)
          <label class="inline-flex items-center text-gray-600 dark:text-gray-400 mr-4">
            <input type="radio" class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" name="answer" value="{{ $answer['value'] }}" {{ ($data->answer == $answer['value'] ? 'checked' : '') }} />
            <span class="ml-2 font-semibold">{{ $answer['name'] }}</span>
          </label>
        @endforeach
      </div>
    </div>

    <input type="hidden" name="exercise_id" value="{{ $data->exercise_id }}">
    
    <button class="mt-4 bg-purple-600 py-2 px-7 rounded-md text-white">Sumbit</button>

  </form>
@endsection