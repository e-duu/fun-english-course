<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Fun English Course | Score Page</title>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link rel="icon" href="{{ asset('/images/icon.png') }}">
</head>
<body>
  <div class="container-fluid mt-16">
    <div class="flex-col">
      <img src="{{ asset('/images/score.svg') }}" class="w-[500px] mx-auto">
      <div class="flex-col mt-8">
        <h1 class="text-3xl font-bold text-center">Congratulations!</h1>
        <p class="text xl text-gray-500 text-center w-96 mx-auto mt-4">Congratulations, you have completed exercise. Thank you for doing a good exercise.</p>
        <h1 class="text-2xl font-bold text-blue-700 text-center mx-auto my-7">You've got {{ $data->score }} / 100</h1>
        <div class="flex justify-center">
          <a href="{{ route('resource') }}" class="mx-auto px-10 py-2 bg-blue-600 hover:bg-blue-700 transition-colors duration-150 rounded-md text-white text-lg">Back To Home</a>
        </div>
      </div>
    </div>
  </div>
</body>
</html>