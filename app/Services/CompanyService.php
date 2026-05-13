<?php
namespace App\Services;
use App\Repositories\Interface\CompanyRepositoryInterface;

class CompanyService
{
    protected $companyRepository;

    public function __construct(CompanyRepositoryInterface $companyRepository)
    {
        $this->companyRepository = $companyRepository;
    }

    public function getCompanies($view)
    {
        return $this->companyRepository->getAllCompanies($view) ?? null;
    }

    public function getCompanyById($id)
    {
        return $this->companyRepository->getCompanyById($id);
    }

    public function createCompany(array $companyData)
    {
        return $this->companyRepository->createCompany($companyData);
    }

    public function updateCompany($id, array $companyData)
    {
        return $this->companyRepository->updateCompany($id, $companyData);
    }

    public function deleteCompany($id)
    {
        return $this->companyRepository->deleteCompany($id);
    }
}
