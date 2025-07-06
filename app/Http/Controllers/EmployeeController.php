<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Department;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    public function index()
    {
        $userId = auth()->id();
        $employees = Employee::where('user_id', $userId)->latest()->paginate(10);
        return view('employee.index', compact('employees'));
    }

    public function dashboard()
    {
        $userId = auth()->id();
        // Cek jika user belum punya department, buat default
        if (Department::where('user_id', $userId)->count() === 0) {
            Department::create([
                'name' => 'Default Department',
                'user_id' => $userId,
            ]);
        }
        return view('employee.dashboard', [
            'employeeCount' => Employee::where('user_id', $userId)->count(),
            'departmentCount' => Department::where('user_id', $userId)->count(),
            'totalSalary' => $this->formatRupiahShort(Employee::where('user_id', $userId)->sum('salary')),
            'permanentCount' => Employee::where('user_id', $userId)->where('status', 'permanent')->count(),
            'contractCount' => Employee::where('user_id', $userId)->where('status', 'contract')->count(),
            'recentEmployees' => Employee::where('user_id', $userId)->latest()->take(6)->get(),
        ]);
    }

    public function create()
    {
        return view('employee.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'phone_number' => 'required|string|max:20',
            'status' => 'required|in:permanent,contract',
            'position' => 'required|string|max:100',
            'department' => 'required|string|max:100',
            'salary' => 'required|numeric|min:0',
            'photo' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('employee_photos', 'public');
        }

        $validated['user_id'] = auth()->id();
        Employee::create($validated);
        return redirect()->route('employees.index')->with('success', 'Employee added successfully!');
    }

    public function show(Employee $employee)
    {
        return view('employee.show', compact('employee'));
    }

    public function edit(Employee $employee)
    {
        return view('employee.edit', compact('employee'));
    }

    public function update(Request $request, Employee $employee)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'phone_number' => 'required|string|max:20',
            'status' => 'required|in:permanent,contract',
            'position' => 'required|string|max:100',
            'department' => 'required|string|max:100',
            'salary' => 'required|numeric|min:0',
            'photo' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            // Delete old photo if exists
            if ($employee->photo) {
                Storage::disk('public')->delete($employee->photo);
            }
            $validated['photo'] = $request->file('photo')->store('employee_photos', 'public');
        }

        $validated['user_id'] = auth()->id();
        $employee->update($validated);
        return redirect()->route('employees.show', $employee)->with('success', 'Employee updated successfully!');
    }

    public function destroy(Employee $employee)
    {
        // Pastikan hanya user yang berhak yang bisa menghapus
        if ($employee->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }
        if ($employee->photo) {
            \Storage::disk('public')->delete($employee->photo);
        }
        $employee->delete();
        return redirect()->back()->with('success', 'Employee deleted successfully!');
    }

    private function formatRupiahShort($number)
    {
        if ($number >= 1_000_000_000_000) {
            return 'Rp ' . number_format($number / 1_000_000_000_000, 2, ',', '.') . ' triliun';
        } elseif ($number >= 1_000_000_000) {
            return 'Rp ' . number_format($number / 1_000_000_000, 2, ',', '.') . ' miliar';
        } elseif ($number >= 1_000_000) {
            return 'Rp ' . number_format($number / 1_000_000, 2, ',', '.') . ' juta';
        } elseif ($number >= 1_000) {
            return 'Rp ' . number_format($number / 1_000, 2, ',', '.') . ' ribu';
        }

        return 'Rp ' . number_format($number, 0, ',', '.');
    }
}

