<x-layout titleHeader="Employee List">
  <x-sidebar></x-sidebar>

  <!-- Tambahkan x-data di sini -->
  <main class="w-full h-full ml-[17rem]" x-data="{ showModal: false, employeeId: null }">
    <div class="p-6">
      <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Employee List</h1>
        <a href="{{ route('employees.create') }}"
           class="bg-primary text-white px-4 py-2 rounded hover:bg-primary/90 text-sm">
          + Add New Employee
        </a>
      </div>

      @if($employees->count())
        <div class="overflow-x-auto bg-white shadow rounded-lg">
          <table class="min-w-full text-sm text-left">
            <thead class="bg-gray-100 text-gray-600 uppercase text-xs">
              <tr>
                <th class="px-4 py-3">Photo</th>
                <th class="px-4 py-3">Name</th>
                <th class="px-4 py-3">Position</th>
                <th class="px-4 py-3">Department</th>
                <th class="px-4 py-3">Phone</th>
                <th class="px-4 py-3">Salary</th>
                <th class="px-4 py-3">Status</th>
                <th class="px-4 py-3 text-right">Action</th>
              </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
              @foreach($employees as $employee)
                <tr class="hover:bg-gray-50">
                  <td class="px-4 py-3">
                    @php
                      $photoUrl = $employee->photo
                          ? asset('storage/' . $employee->photo)
                          : asset('images/default-user.png');
                    @endphp
                    <img src="{{ $photoUrl }}" class="w-10 h-10 rounded-full object-cover" alt="Employee Photo">
                  </td>
                  <td class="px-4 py-3 font-medium text-gray-800">{{ $employee->name }}</td>
                  <td class="px-4 py-3 text-gray-600">{{ $employee->position }}</td>
                  <td class="px-4 py-3 text-gray-600">{{ $employee->department ?? '-' }}</td>
                  <td class="px-4 py-3 text-gray-600">{{ $employee->phone_number }}</td>
                  <td class="px-4 py-3 text-gray-600">{{ $employee->salary }}</td>
                  <td class="px-4 py-3 text-gray-600">{{ ucfirst($employee->status) }}</td>
                  <td class="px-4 py-3 text-right">
                    <a href="{{ route('employees.edit', $employee) }}" class="text-primary hover:underline mr-2">Edit</a>
                    <button type="button"
                            @click="showModal = true; employeeId = {{ $employee->id }}"
                            class="text-red-500 hover:underline">
                      Delete
                    </button>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>

        <!-- Pagination -->
        <div class="mt-6">
          {{ $employees->links('vendor.pagination.tailwind') }}
        </div>
      @else
        <p class="text-gray-500">No employees found.</p>
      @endif
    </div>

    <!-- Modal Delete Employee -->
    <template x-if="showModal">
      <div 
        class="fixed inset-0 flex items-center justify-center bg-black/25 z-[99999]" 
        @keydown.escape.window="showModal = false"
        tabindex="0"
      >
        <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-sm">
          <h2 class="text-lg font-bold mb-2">Delete Employee</h2>
          <p class="mb-4 text-gray-600">Are you sure you want to delete this employee?</p>
          <div class="flex justify-end gap-2">
            <button @click="showModal = false" class="px-4 py-2 rounded text-gray-600 hover:bg-gray-100">
              Cancel
            </button>
            <form :action="'/employees/' + employeeId" method="POST">
              @csrf
              @method('DELETE')
              <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
                Delete
              </button>
            </form>
          </div>
        </div>
      </div>
    </template>
  </main>
</x-layout>
