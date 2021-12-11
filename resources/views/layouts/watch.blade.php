<!DOCTYPE html>
<html lang="en" class="bg-[#f3f3fd]">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  @stack('prepend-style')
  @include('includes.style')
  @stack('addon-style')
  <title>@yield('title')</title>
</head>
<body class="overflow-x-hidden">

    <div class="grid grid-cols-4 ">
      <div class="col-span-1">
        {{-- Sidebar --}}
        @include('includes.sidebar')
      </div>

      <div class="col-span-3">
        {{-- Page Content --}}
        @yield('content')
      </div>
    </div>

  {{-- Script --}}
  @stack('prepend-script')
  @include('includes.script')
  @stack('addon-script')
</body>
</html>