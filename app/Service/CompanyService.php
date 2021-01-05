<?php

namespace App\Service;

use App\Models\Company;

class CompanyService
{
    public function save(Company $company): Company
    {
        $company->save();
        return $company;
    }

    public function find(int $id): ?Company
    {
        return Company::find($id);
    }
}
