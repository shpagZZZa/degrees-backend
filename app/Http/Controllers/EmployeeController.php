<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->query();

        $company = $data['companyId'];

        $employee = new Employee();
        $employee
            ->setFullName($data['fullName'])
            ->setPositionId($data['positionId'])
            ->setAccessCode(rand(111111, 999999))
        ;
    }
}
