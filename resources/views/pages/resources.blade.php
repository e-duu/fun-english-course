@extends('layouts.app')
@section('title')
    Fun English Course - Homepage
@endsection
@section('content')
  <div class="container-fluid px-20 mt-16">
    <div class="grid grid-cols-12 gap-14 items-start">
      <aside class="col-span-4 h-full bg-blue-200 flex-col py-8 rounded-sm">
        <div class="px-14">
          <img src="{{ asset('https://www.nicepng.com/png/detail/128-1280036_jpg-free-stock-female-vector-user-user-female.png') }}" class="w-60 mx-auto rounded-md shadow-md" alt="user profile photo">
          <h3 class="text-center py-3 text-black font-bold text-2xl mt-5 bg-gray-100 rounded-sm shadow-lg">Desy Andriani</h3>
        </div>
        <h2 class="bg-[rgb(244,182,1)] mt-14 mb-10 pl-6 py-3 text-2xl font-bold">LEARNING RESOURCES</h2>
        <div class="px-6 my-8">
          <div class="shadow-lg">
            <h2 class="bg-[rgb(1,131,215)] pl-4 py-3 text-white text-2xl rounded-t-sm font-bold">ENGLISH FOR CHILDREN</h2>
            <div class="bg-gray-100 py-3 rounded-b-sm">
              <a href="#">
                <li class="pl-4 py-3 text-xl my-1 items-center hover:text-white hover:bg-blue-400 transition-colors duration-100">
                EFC Beginner I - Level 1
                </li>
              </a>
              <a href="#">
                <li class="pl-4 py-3 text-xl my-1 items-center hover:text-white hover:bg-blue-400 transition-colors duration-100">
                EFC Beginner I - Level 2
                </li>
              </a>
              <a href="#">
                <li class="pl-4 py-3 text-xl my-1 items-center hover:text-white hover:bg-blue-400 transition-colors duration-100">
                EFC Beginner I - Level 3
                </li>
              </a>
              <a href="#">
                <li class="pl-4 py-3 text-xl my-1 items-center hover:text-white hover:bg-blue-400 transition-colors duration-100">
                EFC Beginner I - Level 4
                </li>
              </a>
            </div>
          </div>
        </div>
        <div class="px-6 my-8">
          <div class="shadow-lg">
            <h2 class="bg-[rgb(1,131,215)] pl-4 py-3 text-white text-2xl rounded-t-sm font-bold">ENGLISH FOR TEENS</h2>
            <div class="bg-gray-100 py-3 rounded-b-sm">
              <a href="#">
                <li class="pl-4 py-3 text-xl my-1 items-center hover:text-white hover:bg-blue-400 transition-colors duration-100">
                EFT Elementary I - Level 1
                </li>
              </a>
              <a href="#">
                <li class="pl-4 py-3 text-xl my-1 items-center hover:text-white hover:bg-blue-400 transition-colors duration-100">
                EFT Elementary I - Level 2
                </li>
              </a>
              <a href="#">
                <li class="pl-4 py-3 text-xl my-1 items-center hover:text-white hover:bg-blue-400 transition-colors duration-100">
                EFT Elementary I - Level 3
                </li>
              </a>
              <a href="#">
                <li class="pl-4 py-3 text-xl my-1 items-center hover:text-white hover:bg-blue-400 transition-colors duration-100">
                EFT Elementary I - Level 4
                </li>
              </a>
            </div>
          </div>
        </div>
        <div class="px-6 my-8">
          <div class="shadow-lg">
            <h2 class="bg-[rgb(1,131,215)] pl-4 py-3 text-white text-2xl rounded-t-sm font-bold">ENGLISH FOR BUSINESS</h2>
            <div class="bg-gray-100 py-3 rounded-b-sm">
              <a href="#">
                <li class="pl-4 py-3 text-xl my-1 items-center hover:text-white hover:bg-blue-400 transition-colors duration-100">
                EFT Elementary I - Level 1
                </li>
              </a>
              <a href="#">
                <li class="pl-4 py-3 text-xl my-1 items-center hover:text-white hover:bg-blue-400 transition-colors duration-100">
                EFT Elementary I - Level 2
                </li>
              </a>
              <a href="#">
                <li class="pl-4 py-3 text-xl my-1 items-center hover:text-white hover:bg-blue-400 transition-colors duration-100">
                EFT Elementary I - Level 3
                </li>
              </a>
              <a href="#">
                <li class="pl-4 py-3 text-xl my-1 items-center hover:text-white hover:bg-blue-400 transition-colors duration-100">
                EFT Elementary I - Level 4
                </li>
              </a>
            </div>
          </div>
        </div>
      </aside>
      <section class="col-span-8">
        <header>
          <h1 class="bg-[rgb(1,131,215)] text-white text-center py-5 text-5xl rounded-t-sm font-bold shadow-lg">LEARNING RESOURCES</h1>
          <div class="flex-col bg-[rgb(244,182,1)] p-5 mt-10 shadow-lg">
            <h3 class="text-[rgb(1,131,215)] font-bold text-xl uppercase"> program : english for children</h3>
            <h3 class="text-[rgb(1,131,215)] my-3 font-bold text-xl uppercase"> level : Beginner</h3>
            <h3 class="text-[rgb(1,131,215)] font-bold text-xl uppercase"> sub level : level 1</h3>
          </div>
        </header>
        <main>
          <div class="my-10">
            <div class="shadow-lg">
              <h2 class="bg-[rgb(1,131,215)] pl-4 py-3 text-white text-2xl rounded-t-sm font-bold">LESSON 1</h2>
              <div class="bg-gray-100 py-3 flex-col rounded-b-sm">
                <a href="{{ url('watch') }}" class="flex items-center space-x-5 py-3 text-[rgb(1,131,215)] hover:text-white hover:bg-blue-400 transition-colors duration-150 pl-20">
                  <img src="{{ asset('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQwKeHNd3PEB29QUdIiunyuA2Rw2unzG9CVZw&usqp=CAU') }}" class="rounded-full w-16 shadow-md" alt="lesson thumbnail / photo">
                  <h3 class="text-2xl font-bold">Lesson 1 Greetings - Presentation</h3>
                </a>
                <a href="{{ url('watch') }}" class="flex items-center space-x-5 py-3 text-[rgb(1,131,215)] hover:text-white hover:bg-blue-400 transition-colors duration-150 pl-20">
                  <img src="{{ asset('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQwKeHNd3PEB29QUdIiunyuA2Rw2unzG9CVZw&usqp=CAU') }}" class="rounded-full w-16 shadow-md" alt="lesson thumbnail / photo">
                  <h3 class="text-2xl font-bold">Lesson 1 Greetings - Video</h3>
                </a>
                <a href="{{ url('watch') }}" class="flex items-center space-x-5 py-3 text-[rgb(1,131,215)] hover:text-white hover:bg-blue-400 transition-colors duration-150 pl-20">
                  <img src="{{ asset('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQwKeHNd3PEB29QUdIiunyuA2Rw2unzG9CVZw&usqp=CAU') }}" class="rounded-full w-16 shadow-md" alt="lesson thumbnail / photo">
                  <h3 class="text-2xl font-bold">Lesson 1 Greetings - Listening (Audio)</h3>
                </a>
                <a href="{{ url('watch') }}" class="flex items-center space-x-5 py-3 text-[rgb(1,131,215)] hover:text-white hover:bg-blue-400 transition-colors duration-150 pl-20">
                  <img src="{{ asset('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQwKeHNd3PEB29QUdIiunyuA2Rw2unzG9CVZw&usqp=CAU') }}" class="rounded-full w-16 shadow-md" alt="lesson thumbnail / photo">
                  <h3 class="text-2xl font-bold">Lesson 1 Greetings - Mathcing Exercises</h3>
                </a>
                <a href="{{ url('watch') }}" class="flex items-center space-x-5 py-3 text-[rgb(1,131,215)] hover:text-white hover:bg-blue-400 transition-colors duration-150 pl-20">
                  <img src="{{ asset('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQwKeHNd3PEB29QUdIiunyuA2Rw2unzG9CVZw&usqp=CAU') }}" class="rounded-full w-16 shadow-md" alt="lesson thumbnail / photo">
                  <h3 class="text-2xl font-bold">Lesson 1 Greetings - Multiple Choice Exercise</h3>
                </a>
              </div>
            </div>
          </div>
          <div class="my-10">
            <div class="shadow-lg">
              <h2 class="bg-[rgb(1,131,215)] pl-4 py-3 text-white text-2xl rounded-t-sm font-bold">LESSON 2</h2>
              <div class="bg-gray-100 py-3 flex-col rounded-b-sm">
                <a href="{{ url('watch') }}" class="flex items-center space-x-5 py-3 text-[rgb(1,131,215)] hover:text-white hover:bg-blue-400 transition-colors duration-150 pl-20">
                  <img src="{{ asset('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQwKeHNd3PEB29QUdIiunyuA2Rw2unzG9CVZw&usqp=CAU') }}" class="rounded-full w-16 shadow-md" alt="lesson thumbnail / photo">
                  <h3 class="text-2xl font-bold">Lesson 1 Greetings - Presentation</h3>
                </a>
                <a href="{{ url('watch') }}" class="flex items-center space-x-5 py-3 text-[rgb(1,131,215)] hover:text-white hover:bg-blue-400 transition-colors duration-150 pl-20">
                  <img src="{{ asset('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQwKeHNd3PEB29QUdIiunyuA2Rw2unzG9CVZw&usqp=CAU') }}" class="rounded-full w-16 shadow-md" alt="lesson thumbnail / photo">
                  <h3 class="text-2xl font-bold">Lesson 1 Greetings - Video</h3>
                </a>
                <a href="{{ url('watch') }}" class="flex items-center space-x-5 py-3 text-[rgb(1,131,215)] hover:text-white hover:bg-blue-400 transition-colors duration-150 pl-20">
                  <img src="{{ asset('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQwKeHNd3PEB29QUdIiunyuA2Rw2unzG9CVZw&usqp=CAU') }}" class="rounded-full w-16 shadow-md" alt="lesson thumbnail / photo">
                  <h3 class="text-2xl font-bold">Lesson 1 Greetings - Listening (Audio)</h3>
                </a>
                <a href="{{ url('watch') }}" class="flex items-center space-x-5 py-3 text-[rgb(1,131,215)] hover:text-white hover:bg-blue-400 transition-colors duration-150 pl-20">
                  <img src="{{ asset('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQwKeHNd3PEB29QUdIiunyuA2Rw2unzG9CVZw&usqp=CAU') }}" class="rounded-full w-16 shadow-md" alt="lesson thumbnail / photo">
                  <h3 class="text-2xl font-bold">Lesson 1 Greetings - Mathcing Exercises</h3>
                </a>
                <a href="{{ url('watch') }}" class="flex items-center space-x-5 py-3 text-[rgb(1,131,215)] hover:text-white hover:bg-blue-400 transition-colors duration-150 pl-20">
                  <img src="{{ asset('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQwKeHNd3PEB29QUdIiunyuA2Rw2unzG9CVZw&usqp=CAU') }}" class="rounded-full w-16 shadow-md" alt="lesson thumbnail / photo">
                  <h3 class="text-2xl font-bold">Lesson 1 Greetings - Multiple Choice Exercise</h3>
                </a>
              </div>
            </div>
          </div>
          <div class="mt-10">
            <div class="shadow-lg">
              <h2 class="bg-[rgb(1,131,215)] pl-4 py-3 text-white text-2xl rounded-t-sm font-bold">FINAL EXAM</h2>
              <div class="bg-gray-100 py-3 flex-col rounded-b-sm">
                <a href="{{ url('watch') }}" class="flex items-center space-x-5 py-3 text-[rgb(1,131,215)] hover:text-white hover:bg-blue-400 transition-colors duration-150 pl-20">
                  <img src="{{ asset('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQwKeHNd3PEB29QUdIiunyuA2Rw2unzG9CVZw&usqp=CAU') }}" class="rounded-full w-16 shadow-md" alt="lesson thumbnail / photo">
                  <h3 class="text-2xl font-bold">Final Exam - Beginner Level 1</h3>
                </a>
              </div>
            </div>
          </div>
        </main>
      </section>
    </div>
  </div>
@endsection