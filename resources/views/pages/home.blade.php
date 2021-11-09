@extends('layouts.app')
@section('title')
    Fun English Course - Homepage
@endsection
@section('content')
  <div class="container-fluid px-20 mt-16">
    <div class="grid grid-cols-12 gap-14 items-start">
      <aside class="col-span-4 h-full bg-blue-200 flex-col py-8 rounded-sm">
        <div class="px-14">
          <img src="{{ asset('https://www.nicepng.com/png/detail/128-1280036_jpg-free-stock-female-vector-user-user-female.png') }}" class="w-60 mx-auto rounded-sm" alt="user profile photo">
          <h3 class="text-center py-3 text-black font-bold text-2xl mt-5 bg-gray-100 rounded-sm">Desi Andriani</h3>
        </div>
        <h2 class="bg-yellow-400 mt-14 mb-10 pl-6 py-3 text-2xl font-bold">LEARNING RESOURCES</h2>
        <div class="px-6 my-5">
          <div>
            <h2 class="bg-blue-500 pl-4 py-3 text-white text-2xl rounded-t-sm font-bold">ENGLISH FOR CHILDREN</h2>
            <div class="bg-gray-100 pl-4 py-1 rounded-b-sm">
              <ul>
                <li class="text-xl my-5 items-center">
                  <i class='fas fa-dot-circle text-xs'></i>
                  &nbsp;&nbsp;
                  EFC Beginner I - Level 1
                </li>
                <li class="text-xl my-5 items-center">
                  <i class='fas fa-dot-circle text-xs'></i>
                  &nbsp;&nbsp;
                  EFC Beginner I - Level 2
                </li>
                <li class="text-xl my-5 items-center">
                  <i class='fas fa-dot-circle text-xs'></i>
                  &nbsp;&nbsp;
                  EFC Beginner I - Level 3
                </li>
                <li class="text-xl my-5 items-center">
                  <i class='fas fa-dot-circle text-xs'></i>
                  &nbsp;&nbsp;
                  EFC Beginner I - Level 4
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="px-6 my-5">
          <div>
            <h2 class="bg-blue-500 pl-4 py-3 text-white text-2xl rounded-t-sm font-bold">ENGLISH FOR TEENS</h2>
            <div class="bg-gray-100 pl-4 py-1 rounded-b-sm">
              <ul>
                <li class="text-xl my-5 items-center">
                  <i class='fas fa-dot-circle text-xs'></i>
                  &nbsp;&nbsp;
                  EFT Elementary I - Level 1
                </li>
                <li class="text-xl my-5 items-center">
                  <i class='fas fa-dot-circle text-xs'></i>
                  &nbsp;&nbsp;
                  EFT Elementary I - Level 2
                </li>
                <li class="text-xl my-5 items-center">
                  <i class='fas fa-dot-circle text-xs'></i>
                  &nbsp;&nbsp;
                  EFT Elementary I - Level 3
                </li>
                <li class="text-xl my-5 items-center">
                  <i class='fas fa-dot-circle text-xs'></i>
                  &nbsp;&nbsp;
                  EFT Elementary I - Level 4
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="px-6 my-5">
          <div>
            <h2 class="bg-blue-500 pl-4 py-3 text-white text-2xl rounded-t-sm font-bold">ENGLISH FOR BUSSINESS</h2>
            <div class="bg-gray-100 pl-4 py-1 rounded-b-sm">
              <ul>
                <li class="text-xl my-5 items-center">
                  <i class='fas fa-dot-circle text-xs'></i>
                  &nbsp;&nbsp;
                  EFB Elementary I - Level 1
                </li>
                <li class="text-xl my-5 items-center">
                  <i class='fas fa-dot-circle text-xs'></i>
                  &nbsp;&nbsp;
                  EFB Elementary I - Level 2
                </li>
                <li class="text-xl my-5 items-center">
                  <i class='fas fa-dot-circle text-xs'></i>
                  &nbsp;&nbsp;
                  EFB Elementary I - Level 3
                </li>
                <li class="text-xl my-5 items-center">
                  <i class='fas fa-dot-circle text-xs'></i>
                  &nbsp;&nbsp;
                  EFB Elementary I - Level 4
                </li>
              </ul>
            </div>
          </div>
        </div>
      </aside>
      <section class="col-span-8 h-full w-full bg-blue-500">

      </section>
    </div>
  </div>
@endsection