@extends('layouts.watch')
@section('title')
  Fun English Course | Watch Page
@endsection
@section('content')
  <div class="flex-col mx-auto pr-20 2xl:pr-28">
    <div class="flex justify-between items-center mt-20 mb-7">
      <div class="flex-col">
        <h1 class="font-bold text-2xl text-gray-800">Static Apps and Dynamic Apps</h1>
        <p class="text-gray-800 mt-2">API Testing and Integration with REST API</p>
      </div>
      <a href="#" class="bg-blue-600 hover:shadow-lg transition-shadow duration-200 text-white rounded-md px-6 py-2">Mark Finish & Next Material</a>
    </div>
    <iframe class="w-full h-[460px] 2xl:h-[620px] rounded-md" src="https://drive.google.com/file/d/1kzoqo2qgNE8tuTl8GEmqeVws5bjALIvq/preview" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
  </div>
@endsection