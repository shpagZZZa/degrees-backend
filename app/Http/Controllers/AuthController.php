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
        if ($employee = $this->authService->getUser((int)$request->request->get('accessCode'))) {
            return \response(new Employee($employee), 200);
        }
        return \response(null, 404);
    }

    public function loginAction(Request $request): Response
    {
        $accessCode = (int)$request->request->get('accessCode');
        if ($employee = $this->authService->getUser($accessCode)) {
            return \response([
                'accessCode' => $accessCode,
                'isAdmin' => $employee->isAdmin()
            ], 200);
        }
        return \response('Not found!', 404);
    }
}
