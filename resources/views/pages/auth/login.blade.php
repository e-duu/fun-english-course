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
            <img class="w-full h-screen" src="{{ asset('/images/sliderhome.jpg') }}">
            <div class="absolute px-4 py-6 space-y-6 bg-white rounded-md dark:bg-darker">
              <a href="https://funenglishcourse.com/" target="_blank" class="flex justify-center tracking-wider">
                <img src="{{ asset('/images/logo.png') }}" style="width: 250px;" alt="fun english course logo">
              </a>
              <h1 class="text-2xl font-bold text-center" style="color: rebeccapurple">Login</h1>
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
            <img class="w-full h-screen" src="{{ asset('/images/sliderhome2.jpg') }}">
            <div class="absolute px-4 py-6 space-y-6 bg-white rounded-md dark:bg-darker">
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


  <!-- Toggle dark mode button -->
  <div class="fixed bottom-5 left-5">
    <button aria-hidden="true" @click="toggleTheme" class="p-2 transition-colors duration-200 rounded-full shadow-md bg-primary hover:bg-primary-darker focus:outline-none focus:ring focus:ring-primary">
      <svg x-show="isDark" class="w-8 h-8 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
        viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
      </svg>
      <svg x-show="!isDark" class="w-8 h-8 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
      </svg>
    </button>
  </div>
</div>
@endsection
