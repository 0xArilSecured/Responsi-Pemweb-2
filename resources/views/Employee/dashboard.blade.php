<x-layout>
  <x-sidebar />
  <main class="ml-[17rem] p-6 w-full h-full">
    <h1 class="text-2xl font-bold mb-6">Dashboard</h1>

    <!-- Row 1 -->
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6 mb-6">
      <!-- Total Employees -->
      <div class="bg-white shadow p-4 rounded-lg">
        <p class="text-sm text-gray-400 mb-3">Total Employees</p>
        <div class="flex gap-5 items-center">
          <div class="flex bg-primary/10 rounded-full w-16 h-16 items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" height="40" viewBox="http://www.w3.org/2000/svg" width="40" fill="#615fff"><path d="M0-240v-63q0-43 44-70t116-27q13 0 25 .5t23 2.5q-14 21-21 44t-7 48v65H0Zm240 0v-65q0-32 17.5-58.5T307-410q32-20 76.5-30t96.5-10q53 0 97.5 10t76.5 30q32 20 49 46.5t17 58.5v65H240Zm540 0v-65q0-26-6.5-49T754-397q11-2 22.5-2.5t23.5-.5q72 0 116 26.5t44 70.5v63H780ZM160-440q-33 0-56.5-23.5T80-520q0-34 23.5-57t56.5-23q34 0 57 23t23 57q0 33-23 56.5T160-440Zm640 0q-33 0-56.5-23.5T720-520q0-34 23.5-57t56.5-23q34 0 57 23t23 57q0 33-23 56.5T800-440Zm-320-40q-50 0-85-35t-35-85q0-51 35-85.5t85-34.5q51 0 85.5 34.5T600-600q0 50-34.5 85T480-480Z"/></svg>
          </div>
          <h2 class="text-5xl font-bold text-gray-800">{{ $employeeCount }}</h2>
        </div>
      </div>
      
      <!-- Total Departments -->
      <div class="bg-white shadow p-4 rounded-lg">
        <p class="text-sm text-gray-400 mb-3">Total Department</p>
        <div class="flex gap-5 items-center">
          <div class="flex bg-primary/10 rounded-full w-16 h-16 items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" height="32" viewBox="http://www.w3.org/2000/svg" width="40" fill="#615fff"><path d="m260-520 220-360 220 360H260ZM700-80q-75 0-127.5-52.5T520-260q0-75 52.5-127.5T700-440q75 0 127.5 52.5T880-260q0 75-52.5 127.5T700-80Zm-580-20v-320h320v320H120Z"/></svg>
          </div>
          <h2 class="text-5xl font-bold text-gray-800">{{ $departmentCount }}</h2>
        </div>
      </div>
      
      <!-- Total Salary -->
      <div class="bg-white shadow p-4 rounded-lg">
        <p class="text-sm text-gray-400 mb-3">Monthly Salary Total</p>
        <div class="flex gap-5 items-center">
          <div class="flex bg-primary/10 rounded-full w-16 h-16 items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" height="32" viewBox="http://www.w3.org/2000/svg" width="40" fill="#615fff"><path d="M200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h560q33 0 56.5 23.5T840-760H520q-71 0-115.5 44.5T360-600v240q0 71 44.5 115.5T520-200h320q0 33-23.5 56.5T760-120H200Zm320-160q-33 0-56.5-23.5T440-360v-240q0-33 23.5-56.5T520-680h280q33 0 56.5 23.5T880-600v240q0 33-23.5 56.5T800-280H520Zm120-140q26 0 43-17t17-43q0-26-17-43t-43-17q-26 0-43 17t-17 43q0 26 17 43t43 17Z"/></svg>
          </div>
          <h2 class="text-4xl font-bold text-gray-800">{{ $totalSalary }}</h2>
        </div>
      </div>
    </div>

    <!-- Row 2 -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    <!-- Card: Employee Status -->
    <div class="bg-white p-4 shadow rounded-lg flex flex-col items-center justify-between">
      <p class="text-sm text-gray-500 mb-2 w-full">Employee Status</p>
      
      <div class="w-64 h-64">
        <canvas id="employeeStatusChart" class="w-full h-full"></canvas>
      </div>

      <div class="mt-4 text-xs text-gray-500 text-center">
        <span class="inline-flex items-center gap-1 mr-3">
          <span class="w-3 h-3 rounded-full bg-green-500 inline-block"></span> Permanent
        </span>
        <span class="inline-flex items-center gap-1">
          <span class="w-3 h-3 rounded-full bg-yellow-400 inline-block"></span> Contract
        </span>
      </div>
    </div>

      <!-- Table: Recent Employees -->
      <div class="bg-white p-4 shadow rounded-lg overflow-auto col-span-2">
        <p class="text-sm text-gray-500 mb-2">Recent Employees</p>
        <table class="min-w-full text-sm">
          <thead>
            <tr class="text-left bg-gray-100">
              <th class="py-2 px-4">Photo</th>
              <th class="py-2">Name</th>
              <th class="py-2">Position</th>
              <th class="py-2">Department</th>
            </tr>
          </thead>
          <tbody>
            @foreach($recentEmployees as $emp)
              <tr>
                <td class="px-4 py-3">
                  @php
                      $photoUrl = $emp->photo
                          ? asset('storage/' . $emp->photo)
                          : asset('images/default-user.png');
                  @endphp

                  <img src="{{ $photoUrl }}" class="w-10 h-10 rounded-full object-cover" alt="Employee Photo">
                </td>
                <td class="py-3">{{ $emp->name }}</td>
                <td class="py-3">{{ $emp->position }}</td>
                <td class="py-3">{{ $emp->department ?? '-' }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </main>
</x-layout>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const ctx = document.getElementById('employeeStatusChart').getContext('2d');
  const employeeStatusChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
      labels: ['Permanent', 'Contract'],
      datasets: [{
        label: 'Employee Status',
        data: [{{ $permanentCount }}, {{ $contractCount }}],
        backgroundColor: ['#16a34a', '#facc15'],
        borderWidth: 1,
      }]
    },
    options: {
      cutout: '60%',
      responsive: true,
      plugins: {
        legend: {
          display: false,
        },
      }
    }
  });
</script>
