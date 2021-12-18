@extends('layouts.auth')
@section('title')
    Fun English Course | Login
@endsection
@section('content')
<div x-data="setup()" x-init="$refs.loading.classList.add('hidden'); setColors(color);" :class="{ 'dark': isDark}">
  <!-- Loading screen -->
  <div
    x-ref="loading"
    class="fixed inset-0 z-50 flex items-center justify-center text-2xl font-semibold text-white bg-primary-darker"
  >
    Loading.....
  </div>

  <main>
    <div class="splide">
      <div class="splide__track">
        <ul class="splide__list">
          <li class="splide__slide flex justify-center items-center relative">
            <div class="container-fluid">
              <img class="w-screen h-screen" src="{{ asset('/images/sliderhome.jpg') }}">
            </div>
            <div class="absolute px-4 py-6 space-y-6 mx-5 sm:mx-0 bg-white rounded-md dark:bg-darker">
              <a href="https://funenglishcourse.com/" target="_blank" class="flex justify-center tracking-wider">
                <img src="{{ asset('/images/logo.png') }}" style="width: 250px;" alt="fun english course logo">
              </a>
              <h1 class="text-2xl font-bold text-center text-purple-700">Login</h1>
              <form action="{{ route('authenticate') }}" method="POST" class="space-y-6">
                @csrf
                @method('POST')
                <input class="w-full px-4 py-2 border-gray-300 rounded-md dark:bg-darker dark:border-gray-700 focus:outline-none focus:ring focus:ring-primary-100 dark:focus:ring-primary-darker" type="text" name="username" placeholder="Username" required/>
        
                <input class="w-full px-4 py-2 border-gray-300 rounded-md dark:bg-darker dark:border-gray-700 focus:outline-none focus:ring focus:ring-primary-100 dark:focus:ring-primary-darker" type="password" name="password" id="password" placeholder="Password" required/>

                <button type="submit" class="w-full px-4 py-2 font-medium text-center text-white transition-colors duration-200 rounded-md focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-1 dark:focus:ring-offset-darker" style="background-color: rebeccapurple">
                  Login
                </button>
              </form>
            </div>
          </li>

          <li class="splide__slide flex justify-center items-center relative">
            <div class="container-fluid">
              <img class="w-screen h-screen" src="{{ asset('/images/sliderhome2.jpg') }}">
            </div>
            <div class="absolute px-4 py-6 space-y-6 mx-5 sm:mx-0 bg-white rounded-md dark:bg-darker">
              <a href="https://funenglishcourse.com/" target="_blank" class="flex justify-center tracking-wider">
                <img src="{{ asset('/images/logo.png') }}" style="width: 250px;" alt="fun english course logo">
              </a>
              <h1 class="text-2xl font-bold text-center" style="color: rebeccapurple">Login</h1>
              <form action="{{ route('authenticate') }}" method="POST" class="space-y-6">
                @csrf
                @method('POST')
                <input class="w-full px-4 py-2 border-gray-300 rounded-md dark:bg-darker dark:border-gray-700 focus:outline-none focus:ring focus:ring-primary-100 dark:focus:ring-primary-darker" type="text" name="username" placeholder="Username"required />
        
                <input class="w-full px-4 py-2 border-gray-300 rounded-md dark:bg-darker dark:border-gray-700 focus:outline-none focus:ring focus:ring-primary-100 dark:focus:ring-primary-darker" type="password" name="password" id="password" placeholder="Password" required/>
                <div>
                  <button type="submit" class="w-full px-4 py-2 font-medium text-center text-white transition-colors duration-200 rounded-md focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-1 dark:focus:ring-offset-darker" style="background-color: rebeccapurple">
                    Login
                  </button>
                </div>
              </form>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </main>

</div>
@endsection
