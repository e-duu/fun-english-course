<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  @include('includes.style')
  <title>@yield('title')</title>
</head>
<body class="overflow-x-hidden bg-[#fff563]">
  {{-- Navbar --}}
  @include('includes.navbar')
  
  {{-- Page Content --}}
  @yield('content')

  {{-- Footer --}}
  @include('includes.footer')

  {{-- Script --}}
  @stack('before-script')
  @include('includes.script')
  @stack('after-script')
</body>
</html>