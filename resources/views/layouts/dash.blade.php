<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>@yield('title')</title>
    @include('includes.admin.style')
  </head>
  <body>
    <div x-data="setup()" x-init="$refs.loading.classList.add('hidden'); setColors(color);" :class="{ 'dark': isDark}">
      <div class="flex h-screen antialiased text-gray-900 bg-gray-100 dark:bg-dark dark:text-light">
        <!-- Loading screen -->
        <div
          x-ref="loading"
          class="fixed inset-0 z-50 flex items-center justify-center text-2xl font-semibold text-white bg-primary-darker"
        >
          Loading.....
        </div>

        <!-- Sidebar -->
        @include('includes.admin.sidebar')

        <div class="flex-1 h-full overflow-x-hidden overflow-y-auto">
          <!-- Navbar -->
          @include('includes.admin.navbar')
          
          <div class="px-10" style="padding-top: 20px; padding-bottom: 30px">
            <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
              @yield('sub-title')
            </h4>
            <!-- Main content -->
            @yield('content')
          </div>

          <!-- Main footer -->
          @include('includes.admin.footer')
        </div>

    </div>

    @include('includes.admin.script')
  </body>
</html>
