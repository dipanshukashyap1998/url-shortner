<?php
namespace App\Repositories;
use App\Models\Company;
use App\Repositories\Interface\CompanyRepositoryInterface;

class CompanyRepository implements CompanyRepositoryInterface
{
    public function getAllCompanies($view)
    {
        if($view)
            {
                return Company::all();
            }

        return Company::latest()->paginate(10);
    }

    public function getCompanyById($id)
    {
        return Company::find($id);
    }

    public function createCompany(array $companyData)
    {
        return Company::create($companyData);
    }

    public function updateCompany($id, array $companyData)
    {
        $company = Company::find($id);
        if ($company) {
            $company->update($companyData);
            return $company;
        }
        return null;
    }

    public function deleteCompany($id)
    {
        $company = Company::find($id);
        if ($company) {
            $company->delete();
            return true;
        }
        return false;
    }
}
