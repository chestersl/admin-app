<?php

namespace App\Services;

use App\Models\Employee;
use Illuminate\Database\QueryException;

class EmployeeService
{

    public function get(): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        return Employee::with('company')
            ->orderBy('created_at', 'desc')
            ->paginate(Employee::PAGINATE);
    }

    /**
     * @param $validatedEmployee
     * @return Employee
     */
    public function store($validatedEmployee): Employee
    {

        try {
            $employee = new Employee();

            $employee->company_id = $validatedEmployee['company_id'];
            $employee->first_name = $validatedEmployee['first_name'];
            $employee->last_name = $validatedEmployee['last_name'];
            $employee->email = $validatedEmployee['email'];
            $employee->phone = $validatedEmployee['phone'];

            $employee->save();

            return $employee;

        } catch (QueryException $exception) {
            abort(404);
        }
    }

    public function update($validatedEmployee, $employee): Employee
    {
        try {
            $employee->company_id = $validatedEmployee['company_id'];
            $employee->first_name = $validatedEmployee['first_name'];
            $employee->last_name = $validatedEmployee['last_name'];
            $employee->email = $validatedEmployee['email'];
            $employee->phone = $validatedEmployee['phone'];

            $employee->save();

            return $employee;

        } catch (QueryException $exception) {
            abort(404);
        }
    }

    /**
     * @param $employee
     * @return void
     */
    public function destroy($employee): void
    {
        $employee->delete();
    }


}
