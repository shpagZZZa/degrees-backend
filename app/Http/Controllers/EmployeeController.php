<?php

namespace App\Http\Controllers;

use App\Http\Resources\Employee as EmployeeResource;
use App\Models\Employee;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use function response as responseAlias;

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

    public function getAction(int $id): Response
    {
        $employee = Employee::find($id);

        return $employee ? responseAlias(new EmployeeResource($employee), Response::HTTP_OK) :
            $this->getErrorResponse(404)
        ;
    }
}
