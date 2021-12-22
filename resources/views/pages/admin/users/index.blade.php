@extends('layouts.dash')
@section('title')
  Fun English Course | User Pages
@endsection
@section('sub-title')
  List Users
@endsection
@section('content')

<div class="flex item-center space-x-2">
	{{-- Modal Upload --}}
	<div x-data="{ showModal : false }">
		<!-- Button -->
		<button @click="showModal = !showModal" class="px-4 py-2 text-sm bg-[blueviolet] rounded-md transition-colors duration-150 ease-linear text-white focus:outline-none focus:ring-0 font-semibold hover:bg-purple-700">Upload User</button>

		<!-- Modal Background -->
		<div x-show="showModal" class="fixed text-gray-500 flex items-center justify-center overflow-auto z-50 bg-black bg-opacity-40 left-0 right-0 top-0 bottom-0" x-transition:enter="transition ease duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
				<!-- Modal -->
				<div x-show="showModal" class="bg-white rounded-xl shadow-2xl p-6 w-80 sm:w-3/6 mx-10" @click.away="showModal = false" x-transition:enter="transition ease duration-100 transform" x-transition:enter-start="opacity-0 scale-90 translate-y-1" x-transition:enter-end="opacity-100 scale-100 translate-y-0" x-transition:leave="transition ease duration-100 transform" x-transition:leave-start="opacity-100 scale-100 translate-y-0" x-transition:leave-end="opacity-0 scale-90 translate-y-1">
						<!-- Title -->
						<span class="font-bold block text-2xl mb-3">Upload Users </span>
						<div class="border-b border-gray-500 mb-5"></div>
						<!-- Some beer 🍺 -->
						<form action="{{ route('file-import-user') }}" method="POST" enctype="multipart/form-data">
							@csrf
							@method('POST')
							<div class='flex items-center justify-center w-full'>
								<label class='flex flex-col border-4 border-dashed rounded-md w-full h-32 hover:bg-gray-100 hover:border-purple-300 group transition-colors duration-200'>
										<div class='flex flex-col items-center justify-center pt-7'>
											<svg class="w-10 h-10 text-purple-400 group-hover:text-purple-600 transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
											<p class='lowercase text-sm text-gray-400 group-hover:text-purple-600 pt-1 tracking-wider'>Select the file</p>
										</div>
									<input name="file" type='file' class="hidden" />
								</label>
							</div>
							<div class="border-b border-gray-500 my-5"></div>

						<!-- Buttons -->
						<div class="flex-col sm:flex-row sm:justify-end text-center sm:text-right space-y-2 sm:space-y-0 sm:space-x-2 mt-5">
								<button type="button" @click="showModal = !showModal" class="w-full sm:w-auto sm:px-4 py-2 text-xs sm:text-sm bg-red-600 rounded-md transition-colors duration-150 ease-linear text-white focus:outline-none focus:ring-0 font-semibold hover:bg-red-700">Cancel</button>

								<a href="{{ route('template.user') }}" class="hidden sm:block w-full sm:w-auto sm:px-4 py-2 sm:py-1 text-xs sm:text-sm bg-purple-600 rounded-md transition-colors duration-150 ease-linear text-white focus:outline-none focus:ring-0 font-semibold hover:bg-purple-700">Download Template</a>

								<button type="submit" class="w-full sm:w-auto sm:px-4 py-2 text-xs sm:text-sm bg-purple-600 rounded-md transition-colors duration-150 ease-linear text-white focus:outline-none focus:ring-0 font-semibold hover:bg-purple-700">Sumbit</button>
						</form>

						<form class="block sm:hidden" method="GET">
							@method('GET')
							<button formaction="{{ route('template.user') }}" class="w-full sm:w-auto sm:px-4 py-2 text-xs sm:text-sm bg-purple-600 rounded-md transition-colors duration-150 ease-linear text-white focus:outline-none focus:ring-0 font-semibold hover:bg-purple-700">Download Template</button>
						</form>
					</div>
				</div>
		</div>
	</div>

	{{-- Modal Filter --}}
	<div x-data="{ showModal : false }">
		<!-- Button -->
		<button @click="showModal = !showModal" class="px-4 py-2 text-sm bg-[blueviolet] rounded-md transition-colors duration-150 ease-linear text-white focus:outline-none focus:ring-0 font-semibold hover:bg-purple-700">Filter & Sort</button>

		<!-- Modal Background -->
		<div x-show="showModal" class="fixed text-gray-500 flex items-center justify-center overflow-auto z-50 bg-black bg-opacity-40 left-0 right-0 top-0 bottom-0" x-transition:enter="transition ease duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
				<!-- Modal -->
			<div x-show="showModal" class="bg-white rounded-xl shadow-2xl p-6 w-80 sm:w-3/6 mx-10" @click.away="showModal = false" x-transition:enter="transition ease duration-100 transform" x-transition:enter-start="opacity-0 scale-90 translate-y-1" x-transition:enter-end="opacity-100 scale-100 translate-y-0" x-transition:leave="transition ease duration-100 transform" x-transition:leave-start="opacity-100 scale-100 translate-y-0" x-transition:leave-end="opacity-0 scale-90 translate-y-1">
				<!-- Title -->
				<span class="font-bold block text-2xl mb-3">Filter & Sort </span>
				<div class="border-b border-gray-500 mb-5"></div>
				<!-- Some beer 🍺 -->
				<form action="" method="GET">
					@csrf
					@method('POST')
					<label class="block mt-4 text-sm">
						<span class="text-gray-700 dark:text-gray-400">
							User Role
						</span>
						<select name="role" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border rounded-md border-gray-400 -gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
							<option selected>Choose Option...</option>
							<option value="admin" value="{{ request()->get('role') == 'admin' ? 'selected' : '' }}">Admin</option>
							<option value="teacher" value="{{ request()->get('role') == 'teacher' ? 'selected' : '' }}">Teacher</option>
							<option value="student" value="{{ request()->get('role') == 'student' ? 'selected' : '' }}">Student</option>
						</select>
					</label>
					
					<div class="border-b border-gray-500 my-5"></div>

					<!-- Buttons -->
					<div class="flex-col sm:flex-row sm:justify-end text-center sm:text-right space-y-2 sm:space-x-2 mt-5">
						<button type="button" @click="showModal = !showModal" class="w-full sm:w-auto sm:px-4 py-2 text-xs sm:text-sm bg-gray-600 rounded-md transition-colors duration-150 ease-linear text-white focus:outline-none focus:ring-0 font-semibold hover:bg-gray-700">Cancel</button>

						<button formaction="{{ route('user.reset') }}" class="w-full sm:w-auto sm:px-4 py-2 text-xs sm:text-sm bg-red-600 rounded-md transition-colors duration-150 ease-linear text-white focus:outline-none focus:ring-0 font-semibold hover:bg-red-700">Reset</button>

						<button formaction="{{ route('user.all') }}" class="w-full sm:w-auto sm:px-4 py-2 text-xs sm:text-sm bg-purple-600 rounded-md transition-colors duration-150 ease-linear text-white focus:outline-none focus:ring-0 font-semibold hover:bg-purple-700">Apply Filter</button>

					</form>
				</div>
			</div>
		</div>
	</div>
</div>

{{-- Content --}}
<div class="w-full overflow-hidden rounded-lg shadow-xs mt-5">
	<div class="w-full overflow-x-auto">
	<table class="w-full whitespace-no-wrap">
	  <thead>
		<tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
			<th class="px-4 py-3">Photo</th>
			<th class="px-4 py-3">Name</th>
			<th class="px-4 py-3">Email</th>
			<th class="px-4 py-3">Role</th>
			<th class="px-4 py-3">Actions</th>
		</tr>
	  </thead>
	  <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-darker">

			@forelse ($data as $item)
				<tr class="text-gray-700 dark:text-gray-400">
					<td class="px-4 py-3">
						<img src="{{ asset('/users/' . $item->photo) }}" style="width: 70px;" class="rounded-full" alt="profile photo">
					</td>
					<td class="px-4 py-3 text-sm">
						{{ $item->name }}
					</td>
					<td class="px-4 py-3 text-sm">
						{{ $item->email }}
					</td>
					<td class="px-4 py-3 text-sm">
						{{ $item->role }}
					</td>
					<td class="px-4 py-3">
					<div class="flex items-center space-x-4 text-sm">
						<a href="{{ route('user.enroll', $item->id) }}" class="flex-col text-center px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray">
							<i class="fas fa-cart-plus"></i>
							<p>Enroll</p>
						</a>
						<a href="{{ route('user.show', $item->id) }}" class="flex-col text-center px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray">
							<i class=" fas fa-eye"></i>
							<p>Detail</p>
						</a>
						<a href="{{ route('user.edit', $item->id) }}" class="flex-col text-center px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray">
							<i class=" fas fa-edit"></i>
							<p>Edit</p>
						</a>
						<form action="{{ route('user.delete', $item->id) }}" method="POST" class="d-inline">
							@csrf
							@method('DELETE')
							<button class="flex-col px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray">
								<i class="fas fa-trash"></i>
								<p>Delete</p>
							</button>
						</form>
					</div>
					</td>
				</tr>
			@empty
				<tr>
					<td colspan="5" class="text-center text-gray-500 px-4 py-3">
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
		<div class="text-center w-auto sm:w-[565px] md:w-[980px] 2xl:w-[1335px] ">
			{{ $data->links() }}
		</div>
	</div>
</div>
@endsection