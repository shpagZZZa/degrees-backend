<?php

namespace App\Http\Controllers;

use App\Http\Resources\Company as CompanyResource;
use App\Http\Resources\QuizCollection;
use App\Models\Company;
use App\Models\Employee;
use App\Models\Quiz;
use App\Service\CompanyService;
use CompanyRepository;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CompanyController extends Controller
{
    private CompanyService $companyService;

    public function __construct(CompanyService $companyService)
    {
        $this->companyService = $companyService;
    }

    public function storeAction(Request $request): Response
    {
        $company = new Company();
        $company->setTitle($request->query('title'));
        $company = $this->companyService->save($company);
        return response(new CompanyResource($company), Response::HTTP_OK);
    }

    public function getAction(int $id): Response
    {
        $company = $this->companyService->find($id);

        return $company ? response(new CompanyResource($company), Response::HTTP_OK) :
            response(json_encode(['success' => 'false'], JSON_UNESCAPED_UNICODE), Response::HTTP_NOT_FOUND)
        ;
    }

    public function listAction(): Response
    {
        return response(Company::all()->toJson(), Response::HTTP_OK);
    }

    public function getQuizzesAction(int $id): Response
    {
        $company = Company::find($id);
        $allQuizzes = Quiz::all();
        $quizzes = [];

        foreach ($company->groups as $group) {
            /** @var Employee $employee */
            foreach ($group->employees as $employee) {
                foreach ($employee->quizzes as $quiz) {
                    $quizzes[] = $quiz;
                }
            }
        }

        return response(new QuizCollection($quizzes), 200);
    }
}
