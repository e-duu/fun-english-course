@extends('layouts.dash')
@section('title')
  Fun English Course | Program Pages
@endsection
@section('sub-title')
  List Programs
@endsection
@section('content')
  <div class="w-full overflow-hidden rounded-lg shadow-xs mt-4">
    <div class="w-full overflow-x-auto">
      <table class="w-full whitespace-no-wrap">
        <thead>
          <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
              <th class="px-4 py-3">Program Name</th>
              <th class="px-4 py-3">Actions</th>
          </tr>
        </thead>
        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-darker">

          @forelse ($data as $item)
            <tr class="text-gray-700 dark:text-gray-400">
              <td class="px-4 py-3 text-sm">
                {{ $item->name }}
              </td>
              <td class="px-4 py-3">
                <div class="flex items-center space-x-4 text-sm">
                  <a href="{{ route('student.show', $item->id) }}" class="flex-col text-center px-2 py-2 text-sm font-medium leading-5 text-blue-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray">
                    <i class=" fas fa-eye"></i>
                    <p>Detail</p>
                  </a>
                </div>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="2" class="text-center text-gray-500 px-4 py-3">
                <p>
                  Data is empty..
                </p>
              </td>
            </tr>
          @endforelse

        </tbody>
      </table>
    </div>
    <div class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
      <div class="text-center w-auto sm:w-[565px] md:w-[860px] xl:w-[980px] 2xl:w-[1325px]">
        {{ $data->links() }}
      </div>
    </div>
  </div>
@endsection

{{-- @push('after-style')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />
@endpush --}}

@push('after-script')
  {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>

  <script>
    $(document).ready(function () {
        $('select').selectize({
            sortField: 'text'
        });
    });
  </script> --}}
  

  {{-- <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
  <script>
      var payments = new Vue({
          el: "#payments",
          mounted() {

          },
          data: {
              users: @json($users ),
              levels: @json($levels),
              levelUsers: @json($levelUsers),
              selectedLevels: null,
              users_id: null,
          },
          methods: {
              setUsers(id) {
                  let selectedLevel = this.levelUsers.filter(e => e.user_id == id)
                  this.selectedLevels = selectedLevel
                  console.log(selectedLevel)
              }
          },
      });
  </script> --}}
@endpush
