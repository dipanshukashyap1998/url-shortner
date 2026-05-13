<?php
namespace App\Repositories\Interface;

interface CompanyRepositoryInterface
{
    public function getAllCompanies($view);
    public function getCompanyById($id);
    public function createCompany(array $companyData);
    public function updateCompany($id, array $companyData);
    public function deleteCompany($id);
}
