<?php


namespace App\Http\Controllers;


use App\Http\Resources\Employee;
use App\Service\AuthService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    private AuthService $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function getUserAction(Request $request): Response
    {
        $employee = $this->authService->getUser($request->request->get('accessCode'));
        return \response(new Employee($employee), 200);
    }
}
