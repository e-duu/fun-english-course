<div>
    <div class="flex justify-between items-center">
        <div>
            <a href="{{ route('lesson.create', $data->id) }}" class="px-5 py-1 bg-blue-600 rounded-md font-semibold text-white">Add Lesson</a>
            <select name="order" wire:model="order" class="mt-1 text-sm dark:text-gray-300 dark:border rounded-md border-gray-400 -gray-600 dark:bg-gray-700 form-select focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:focus:shadow-outline-gray">
                <option value="">Default Order</option>
                <option value="asc">A - Z</option>
                <option value="desc">Z - A</option>
            </select>
        </div>
        <a href="{{ route('program.show', $data->program->id) }}" class="px-5 py-1 bg-yellow-400 rounded-md font-semibold text-white">Back to Level</a>
        </div>
      
      <div class="w-full overflow-hidden rounded-lg shadow-xs mt-4">
        <div class="w-full overflow-x-auto">
          <table class="w-full whitespace-no-wrap">
            <thead>
              <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-white dark:bg-gray-800">
                  <th class="px-4 py-3">Lesson Name</th>
                  <th class="px-4 py-3">Actions</th>
              </tr>
            </thead>
            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-darker">
      
              @forelse ($lessons as $item)
                <tr class="text-gray-700 dark:text-white">
                  <td class="px-4 py-3 text-sm">
                    {{ $item->name }}
                  </td>
                  <td class="px-4 py-3">
                    <div class="flex items-center space-x-4 text-sm">
                      <a href="{{ route('lesson.show', $item->id) }}" class="flex-col text-center px-2 py-2 text-sm font-medium leading-5 text-blue-600 rounded-lg dark:text-white focus:outline-none focus:shadow-outline-gray">
                        <i class=" fas fa-eye"></i>
                        <p>Detail</p>
                      </a>
                      <a href="{{ route('lesson.edit', $item->id) }}" class="flex-col text-center px-2 py-2 text-sm font-medium leading-5 text-blue-600 rounded-lg dark:text-white focus:outline-none focus:shadow-outline-gray">
                        <i class=" fas fa-edit"></i>
                        <p>Edit</p>
                      </a>
                      <form action="{{ route('lesson.delete', $item->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="flex-col px-2 py-2 text-sm font-medium leading-5 text-blue-600 rounded-lg dark:text-white focus:outline-none focus:shadow-outline-gray">
                          <i class="fas fa-trash"></i>
                          <p>Delete</p>
                        </button>
                      </form>
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
        <div class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-white dark:bg-gray-800">
          <div class="text-center w-[1000px] 2xl:w-[1335px] ">
                  {{ $lessons->links() }}
              </div>
        </div>
    </div>
</div>
