<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployeeRequest;
use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    public function index()
    {
        $employees = Employee::with('company')->paginate(15);

        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        $companies = Company::all();
        return view('employees.create', compact('companies'));
    }

    public function store(StoreEmployeeRequest $request)
    {
        Employee::create($request->validated());
        return redirect()->route('employees.index')->with([
            'message' => 'Created successfully',
            'alert-type' => 'success'
        ]);
    }

    public function show(Employee $employee)
    {
        $employee->load('company');
        return view('employees.show', compact('employee'));
    }

    public function edit(Employee $employee)
    {
        $companies = Company::all();
        return view('employees.edit', compact('employee', 'companies'));
    }

    public function update(StoreEmployeeRequest $request, Employee $employee)
    {
        $employee->update($request->validated());
        return redirect()->route('employees.index')->with([
            'message' => 'Updated successfully',
            'alert-type' => 'success'
        ]);
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employees.index')->with([
            'message' => 'Deleted successfully',
            'alert-type' => 'success'
        ]);
    }
}
