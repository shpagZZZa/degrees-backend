<?php


namespace App\Service;


use App\Models\Employee;

class AuthService
{
    public function getUser(int $accessCode): Employee
    {
        return Employee::where('access_code', $accessCode)->first();
    }
}
