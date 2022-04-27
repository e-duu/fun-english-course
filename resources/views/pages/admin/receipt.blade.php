<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  @include('includes.style')
  <title>Fun English Course | Receipt</title>
</head>
<body class="bg-[#f0f0f0]">
  <div class="container-fluid">
    <div class="bg-[#1e3e97] px-32 py-5">
      <h1 class="text-white font-bold text-right text-3xl uppercase">Receipt</h1>
    </div>
    <div class="container-fluid px-32 relative">
      <div class="absolute top-[150px] left-[400px] z-50">
        <img src="{{ asset('images/paid.png') }}" class="max-h-48">
      </div>
      <div class="flex-col mt-10">
        <div class="flex justify-between items-center mb-12">
          <img src="{{ asset('images/edge-logo.png') }}" class="max-h-28">
          <img src="{{ asset('images/logo.png') }}" class="max-h-16">
        </div>
        <div class="flex-col">
          <p class="text-blue-700 font-bold text-lg mb-5">BILLED TO : </p>
          <div class="flex justify-between items-center">
            <p class="text-blue-700 font-bold">Parent's Name :&nbsp;&nbsp; Abdurrahman Huaidi</p>
            <p class="text-blue-700 font-bold">Receipt Number :&nbsp;&nbsp; RCPT-2020124556</p>
          </div>
          <div class="flex justify-between items-center">
            <p class="text-blue-700 font-bold">Student's Name :&nbsp;&nbsp; Ramadhan Tri Nurdias</p>
            <p class="text-blue-700 font-bold">Receipt Date :&nbsp;&nbsp; 12 - 12 - 2021</p>
          </div>
          <div class="flex justify-between items-center">
            <p class="text-blue-700 font-bold">City of Residence :&nbsp;&nbsp; Jakarta</p>
            <p class="text-blue-700 font-bold">Due Date :&nbsp;&nbsp; 19 - 19 - 19</p>
          </div>
          <p class="text-blue-700 font-bold">Country of Residence :&nbsp;&nbsp; Indognesia</p>
          <p class="text-blue-700 font-bold">Email Address :&nbsp;&nbsp; ramangart2@gmail.com</p>
          <div class="w-full overflow-hidden rounded-sm shadow-xs mt-5 mb-10">
            <div class="w-full overflow-x-auto">
              <table class="w-full whitespace-no-wrap">
                <thead>
                  <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    <th class="px-4 py-3 bg-blue-800 text-white">Program</th>
                    <th class="px-4 py-3 bg-blue-800 text-white">Description</th>
                    <th class="px-4 py-3 bg-blue-800 text-white">Unit Price</th>
                    <th class="px-4 py-3 bg-blue-800 text-white">Quantity</th>
                    <th class="px-4 py-3 bg-blue-800 text-white">Amount</th>
                  </tr>
                </thead>
                <tbody class="bg-blue-100 divide-y-2 divide-white dark:divide-gray-700 dark:bg-darker">
          
                  {{-- @forelse ($data as $item) --}}
                    <tr class="text-black dark:text-gray-400">
                      <td class="px-4 py-3 text-sm">
                        
                      </td>
                      <td class="px-4 py-3 text-sm">
                        
                      </td>
                      <td class="px-4 py-3 text-sm">
                        
                      </td>
                      <td class="px-4 py-3 text-sm">
                        
                      </td>
                      <td class="px-4 py-3 text-sm">
                        
                      </td>
                    </tr>
                  {{-- @empty --}}
                    {{-- <tr>
                      <td colspan="7" class="text-center text-gray-500 px-4 py-3">
                        <p>
                          Data is empty..
                        </p>
                      </td>
                    </tr>
                  @endforelse --}}
          
                </tbody>
              </table>
            </div>
            <div class="grid px-4 py-3 text-xs font-semibold tracking-wide text-white uppercase border-t dark:border-gray-700 bg-blue-800 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
              <div class="col-span-7"></div>
              <div class="flex space-x-2 items-center justify-between">
                <p>Total</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>