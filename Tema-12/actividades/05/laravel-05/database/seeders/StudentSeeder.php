<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('students')->insert([
            [
                'name' => 'Juan',
                'lastname' => 'Perez',
                'birth_date' => '2000/01/01',
                'phone' => '123456789',
                'city' => 'Madrid',
                'dni' => '12345678A',
                'email' => 'juanp@example.com',
                'course_id' => 1
            ]
        ]);
    }
}
