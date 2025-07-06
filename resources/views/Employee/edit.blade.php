<x-layout>
  <x-sidebar />
  <main class="ml-[17rem] p-6 w-full h-full">
    <h1 class="text-2xl font-bold mb-6">Edit Employee</h1>

    <form action="{{ route('employees.update', $employee) }}" method="POST" enctype="multipart/form-data" class="space-y-4 bg-white p-6 rounded shadow max-w-xl">
      @csrf
      @method('PUT')

      <div>
        <label class="block text-sm font-medium">Name</label>
        <input name="name" type="text" required class="w-full border px-3 py-2 rounded text-sm focus:border-primary focus:ring-1 focus:ring-primary transition" value="{{ old('name', $employee->name) }}">
      </div>

      <div>
        <label class="block text-sm font-medium">Position</label>
        <input name="position" type="text" required class="w-full border px-3 py-2 rounded text-sm focus:border-primary focus:ring-1 focus:ring-primary transition" value="{{ old('position', $employee->position) }}">
      </div>

      <div>
        <label class="block text-sm font-medium">Phone</label>
        <input name="phone_number" type="text" required class="w-full border px-3 py-2 rounded text-sm focus:border-primary focus:ring-1 focus:ring-primary transition" value="{{ old('phone_number', $employee->phone_number) }}">
      </div>

      <div>
        <label class="block text-sm font-medium">Salary (Rp)</label>
        <input name="salary" type="number" required class="w-full border px-3 py-2 rounded text-sm focus:border-primary focus:ring-1 focus:ring-primary transition" value="{{ old('salary', $employee->salary) }}">
      </div>

      <div>
        <label class="block text-sm font-medium">Status</label>
        <select name="status" class="w-full border px-3 py-2 rounded text-sm focus:border-primary focus:ring-1 focus:ring-primary transition">
          <option value="permanent" {{ $employee->status == 'permanent' ? 'selected' : '' }}>Permanent</option>
          <option value="contract" {{ $employee->status == 'contract' ? 'selected' : '' }}>Contract</option>
        </select>
      </div>

      <div>
        <label class="block text-sm font-medium">Department</label>
        <input name="department" type="text" required class="w-full border px-3 py-2 rounded text-sm focus:border-primary focus:ring-1 focus:ring-primary transition" value="{{ old('department', $employee->department) }}">
      </div>

      <div>
        <label class="block text-sm font-medium">Photo</label>
        <input type="file" name="photo" class="w-full border px-3 py-2 rounded text-sm focus:border-primary focus:ring-1 focus:ring-primary transition">
        @if($employee->photo)
          <img src="{{ asset('storage/' . $employee->photo) }}" class="w-16 h-16 mt-2 rounded-full object-cover border">
        @endif
      </div>

      <div class="flex justify-end gap-2">
        <a href="{{ route('employees.index') }}" class="text-sm text-gray-600 hover:underline">Cancel</a>
        <button class="bg-primary text-white px-4 py-2 rounded text-sm hover:bg-primary/90 transition">Update</button>
      </div>
    </form>
  </main>
</x-layout>
