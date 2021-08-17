<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Seeder;

class EmplyeeTableSeeder extends Seeder
{
    public function run()
    {
        Employee::factory()->count(100)->create();
    }
}
