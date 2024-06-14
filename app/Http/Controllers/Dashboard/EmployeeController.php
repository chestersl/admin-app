<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeStoreRequest;
use App\Http\Requests\EmployeeUpdateRequest;
use App\Services\EmployeeService;
use App\Models\{Employee, Company};
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(EmployeeService $employeeService): \Inertia\Response|\Inertia\ResponseFactory
    {
        return inertia('Dashboard/Employee/Employee', [
            'employees' => $employeeService->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): \Inertia\Response|\Inertia\ResponseFactory
    {
        return inertia('Dashboard/Employee/EmployeeCreate', [
            'csrf' => csrf_token(),
            'companies' => Company::all(['id', 'name'])
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmployeeStoreRequest $employeeStoreRequest, EmployeeService $employeeService): void
    {
        $employeeService->store($employeeStoreRequest->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee): \Inertia\Response|\Inertia\ResponseFactory
    {
        return inertia('Dashboard/Employee/EmployeeEdit', [
            'csrf' => csrf_token(),
            'employee' => $employee,
            'companies' => Company::all(['id', 'name'])
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EmployeeUpdateRequest $request, EmployeeService $employeeService, Employee $employee): void
    {
        $employeeService->update($request->validated(), $employee);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee, EmployeeService $employeeService): void
    {
        $employeeService->destroy($employee);
    }
}
