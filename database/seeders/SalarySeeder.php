<?php

namespace Database\Seeders;

use App\Models\Salary;
use Illuminate\Database\Seeder;

class SalarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $salaries = [
            [
                'period' => 'monthly',
                'amount' => 32000
            ],
            [
                'period' => 'hourly',
                'amount' => 180
            ]
        ];

        foreach ($salaries as $salary) {
            Salary::create($salary);
        }
    }
}
