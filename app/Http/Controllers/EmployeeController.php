<?php

namespace App\Http\Controllers;

use App\Http\Resources\Employee as EmployeeResource;
use App\Http\Resources\EmployeeCollection;
use App\Http\Resources\QuizCollection;
use App\Models\Employee;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use function response as responseAlias;

class EmployeeController extends Controller
{
    public function storeAction(Request $request)
    {
        $data = $request->request->all();

        $employee = new Employee();
        $employee
            ->setFullName($data['fullName'])
            ->setPositionId($data['positionId'])
            ->setAccessCode(rand(111111, 999999))
            ->setGroupId($data['groupId'])
        ;

        $employee->save();

        return \response(new EmployeeResource($employee), 201);
    }

    public function getQuizzesAction(int $id): Response
    {
        return \response(new QuizCollection(Employee::find($id)->quizzes), 200);
    }

    public function getAction(int $id): Response
    {
        $employee = Employee::find($id);

        return $employee ? responseAlias(new EmployeeResource($employee), Response::HTTP_OK) :
            $this->getErrorResponse(404)
        ;
    }

    public function listAction(): Response
    {
        return \response(new EmployeeCollection(Employee::all()), 200);
    }
}
