<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Company;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

public function run(): void
{
    $companies = [
        [
            'name' => 'TechNova Solutions',
            'email' => 'contact@technova.com',
            'address' => 'Mohali, Punjab',
            'phone' => '9876543210',
        ],
        [
            'name' => 'CloudSync Pvt Ltd',
            'email' => 'info@cloudsync.in',
            'address' => 'Bangalore, Karnataka',
            'phone' => '9812345678',
        ],
        [
            'name' => 'ByteCraft Technologies',
            'email' => 'support@bytecraft.io',
            'address' => 'Gurgaon, Haryana',
            'phone' => '9988776655',
        ],
        [
            'name' => 'NextGen Softwares',
            'email' => 'hello@nextgensoft.com',
            'address' => 'Pune, Maharashtra',
            'phone' => '9123456780',
        ],
        [
            'name' => 'DataBridge Labs',
            'email' => 'admin@databridge.ai',
            'address' => 'Hyderabad, Telangana',
            'phone' => '9090909090',
        ],
    ];

    foreach ($companies as $company) {
        Company::create($company);
    }
}
}
