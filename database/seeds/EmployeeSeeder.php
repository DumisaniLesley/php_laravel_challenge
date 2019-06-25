<?php

use Illuminate\Database\Seeder;
use App\Employee;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $company = factory('App\Company')->create();
        factory(Employee::class,1000)->create(['companyID' => $company->id]);
    }
}
