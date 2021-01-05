<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Service\CompanyService;
use CompanyRepository;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class CompanyController
 * @package App\Http\Controllers
 * @Route("/company", name="company_")
 */
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
        dd($company->toJson());
        return (new Response())
            ->setContent(['id' => $company->id])
            ->setStatusCode(Response::HTTP_OK)
        ;
    }

    public function getAction(int $id): Response
    {
        $company = $this->companyService->find($id);
        $response = new Response();
        return $company ? response(json_encode($company), Response::HTTP_OK) :
            response(json_encode(['error' => 'Не найдена компания']), Response::HTTP_NOT_FOUND)
        ;
    }
}
