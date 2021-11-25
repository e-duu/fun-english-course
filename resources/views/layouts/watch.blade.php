<!DOCTYPE html>
<html lang="en" style="background-color: #fbf6ff;">
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

    <div>
      {{-- Page Content --}}
      @yield('content')
    </div>

  {{-- Script --}}
  @stack('prepend-script')
  @include('includes.script')
  @stack('addon-script')
</body>
</html>