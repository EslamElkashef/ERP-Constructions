<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Http\Requests\StoreEmployeeRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Exception;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        return view('employees.create');
    }

    public function store(StoreEmployeeRequest $request)
    {
        try {
            $data = $request->validated();

            if ($request->hasFile('personal_image')) {
                $data['personal_image'] = $request->file('personal_image')
                    ->store('employees/personal_images', 'public');
            }

            if ($request->hasFile('national_id_image')) {
                $data['national_id_image'] = $request->file('national_id_image')
                    ->store('employees/national_ids', 'public');
            }

            Employee::create($data);

            return redirect()
                ->route('employees.index')
                ->with('success', 'Successfully Created Employee');
        } catch (Exception $e) {
            Log::error('Error while creating employee: ' . $e->getMessage());
            return back()->withInput()->withErrors(['general' => 'An error occurred while saving.']);
        }
    }

    public function show(Employee $employee)
    {
        return view('employees.show', compact('employee'));
    }

    public function edit(Employee $employee)
    {
        return view('employees.edit', compact('employee'));
    }

    public function update(StoreEmployeeRequest $request, Employee $employee)
    {
        try {
            $data = $request->validated();

            if ($request->hasFile('personal_image')) {
                if ($employee->personal_image) {
                    Storage::disk('public')->delete($employee->personal_image);
                }
                $data['personal_image'] = $request->file('personal_image')
                    ->store('employees/personal_images', 'public');
            }

            if ($request->hasFile('national_id_image')) {
                if ($employee->national_id_image) {
                    Storage::disk('public')->delete($employee->national_id_image);
                }
                $data['national_id_image'] = $request->file('national_id_image')
                    ->store('employees/national_ids', 'public');
            }

            $employee->update($data);

            return redirect()
                ->route('employees.show', $employee)
                ->with('success', 'Employee data updated successfully');
        } catch (Exception $e) {
            Log::error('Error updating employee:' . $e->getMessage());
            return back()->withInput()->withErrors(['general' => 'An error occurred while updating.']);
        }
    }

    public function destroy(Employee $employee)
    {
        try {
            if ($employee->personal_image) {
                Storage::disk('public')->delete($employee->personal_image);
            }
            if ($employee->national_id_image) {
                Storage::disk('public')->delete($employee->national_id_image);
            }
            $employee->delete();

            return redirect()
                ->route('employees.index')
                ->with('success', 'The employee has been deleted successfully');
        } catch (Exception $e) {
            Log::error('Error deleting employee: ' . $e->getMessage());
            return back()->withErrors(['general' => 'An error occurred while deleting.']);
        }
    }
}
