<header class="bg-[#fff563]">
  <div class="container-fluid px-20">
    <div class="flex justify-between items-center py-5">
      <a href="https://funenglishcourse.com/" target="_blank">
        <img src="{{ asset('/images/logo.png') }}" class="w-80" alt="fun english course logo">
      </a>
      <img src="{{ asset('/images/edge-logo.png') }}" class="w-28" alt="edge logo">
    </div>
  </div>
  <nav class="flex justify-end bg-[rgb(244,182,1)] py-7">
    <ul class="flex space-x-20 px-20">
      <li class="font-bold text-white text-xl"><a href="https://funenglishcourse.com/" target="_blank">HOME</a></li>
      <li class="font-bold text-white text-xl"><a href="{{ url('/') }}">LEARNING RESOURCES</a></li>
      <li class="font-bold text-white text-xl"><a href="{{ url('/payment') }}">PAYMENT</a></li>
    </ul>
  </nav>
  <div class="py-2 bg-blue-600"></div>
</header>