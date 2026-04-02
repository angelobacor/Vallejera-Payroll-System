<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Deduction;

class CreateUserSeeder extends Seeder
{
    private $sssTable = [
        // Salary ranges and corresponding deductions
        ['min' => 0,        'max' => 4250,    'employeer_share' => 380.00, 'employee_share' => 180.00],
        ['min' => 4251,     'max' => 4749.99,  'employeer_share' => 427.50, 'employee_share' => 202.50],
        ['min' => 4750,     'max' => 5249.99,  'employeer_share' => 475.00, 'employee_share' => 225.00],
        ['min' => 5250,     'max' => 5749.99,  'employeer_share' => 522.50, 'employee_share' => 247.50],
        ['min' => 5750,     'max' => 6249.99,  'employeer_share' => 570.00, 'employee_share' => 270.00],
        ['min' => 6250,     'max' => 6749.99,  'employeer_share' => 617.50, 'employee_share' => 292.50],
        ['min' => 6750,     'max' => 7249.99,  'employeer_share' => 665.00, 'employee_share' => 315.00],
        ['min' => 7250,     'max' => 7749.99,  'employeer_share' => 712.50, 'employee_share' => 337.50],
        ['min' => 7750,     'max' => 8249.99,  'employeer_share' => 760.00, 'employee_share' => 360.00],
        ['min' => 8250,     'max' => 8749.99,  'employeer_share' => 807.50, 'employee_share' => 382.50],
        ['min' => 8750,     'max' => 9249.99,  'employeer_share' => 855.00, 'employee_share' => 405.00],
        ['min' => 9250,     'max' => 9749.99,  'employeer_share' => 902.50, 'employee_share' => 427.50],
        ['min' => 9750,     'max' => 10249.99, 'employeer_share' => 950.00, 'employee_share' => 450.00],
        ['min' => 10250,    'max' => 10749.99, 'employeer_share' => 997.50, 'employee_share' => 472.50],
        ['min' => 10750,    'max' => 11249.99, 'employeer_share' => 1045.00, 'employee_share' => 495.00],
        ['min' => 11250,    'max' => 11749.99, 'employeer_share' => 1092.50, 'employee_share' => 517.50],
        ['min' => 11750,    'max' => 12249.99, 'employeer_share' => 1140.00, 'employee_share' => 540.00],
        ['min' => 12250,    'max' => 12749.99, 'employeer_share' => 1187.50, 'employee_share' => 562.50],
        ['min' => 12750,    'max' => 13249.99, 'employeer_share' => 1235.00, 'employee_share' => 585.00],
        ['min' => 13250,    'max' => 13749.99, 'employeer_share' => 1282.50, 'employee_share' => 607.50],
        ['min' => 13750,    'max' => 14249.99, 'employeer_share' => 1330.00, 'employee_share' => 630.00],
        ['min' => 14250,    'max' => 14749.99, 'employeer_share' => 1377.50, 'employee_share' => 652.50],
        ['min' => 14750,    'max' => 15249.99, 'employeer_share' => 1425.00, 'employee_share' => 675.00],
        ['min' => 15250,    'max' => 15749.99, 'employeer_share' => 1472.50, 'employee_share' => 697.50],
        ['min' => 15750,    'max' => 16249.99, 'employeer_share' => 1520.00, 'employee_share' => 720.00],
        ['min' => 16250,    'max' => 16749.99, 'employeer_share' => 1567.50, 'employee_share' => 742.50],
        ['min' => 16750,    'max' => 17249.99, 'employeer_share' => 1615.00, 'employee_share' => 765.00],
        ['min' => 17250,    'max' => 17749.99, 'employeer_share' => 1662.50, 'employee_share' => 787.50],
        ['min' => 17750,    'max' => 18249.99, 'employeer_share' => 1710.00, 'employee_share' => 810.00],
        ['min' => 18250,    'max' => 18749.99, 'employeer_share' => 1757.50, 'employee_share' => 832.50],
        ['min' => 18750,    'max' => 19249.99, 'employeer_share' => 1805.00, 'employee_share' => 855.00],
        ['min' => 19250,    'max' => 19749.99, 'employeer_share' => 1852.50, 'employee_share' => 877.50],
        ['min' => 19750,    'max' => 20249.99, 'employeer_share' => 1900.00, 'employee_share' => 900.00],
        ['min' => 20250,    'max' => 20749.99, 'employeer_share' => 1900.00, 'employee_share' => 900.00],
        ['min' => 20750,    'max' => 21249.99, 'employeer_share' => 1900.00, 'employee_share' => 900.00],
        ['min' => 21250,    'max' => 21749.99, 'employeer_share' => 1900.00, 'employee_share' => 900.00],
        ['min' => 21750,    'max' => 22249.99, 'employeer_share' => 1900.00, 'employee_share' => 900.00],
        ['min' => 22250,    'max' => 22749.99, 'employeer_share' => 1900.00, 'employee_share' => 900.00],
        ['min' => 22750,    'max' => 23249.99, 'employeer_share' => 1900.00, 'employee_share' => 900.00],
        ['min' => 23250,    'max' => 23749.99, 'employeer_share' => 1900.00, 'employee_share' => 900.00],
        ['min' => 23750,    'max' => 24249.99, 'employeer_share' => 1900.00, 'employee_share' => 900.00],
        ['min' => 24250,    'max' => 24749.99, 'employeer_share' => 1900.00, 'employee_share' => 900.00],
        ['min' => 24750,    'max' => 25249.99, 'employeer_share' => 1900.00, 'employee_share' => 900.00],
        ['min' => 25250,    'max' => 25749.99, 'employeer_share' => 1900.00, 'employee_share' => 900.00],
        ['min' => 25750,    'max' => 26249.99, 'employeer_share' => 1900.00, 'employee_share' => 900.00],
        ['min' => 26250,    'max' => 26749.99, 'employeer_share' => 1900.00, 'employee_share' => 900.00],
        ['min' => 26750,    'max' => 27249.99, 'employeer_share' => 1900.00, 'employee_share' => 900.00],
        ['min' => 27250,    'max' => 27749.99, 'employeer_share' => 1900.00, 'employee_share' => 900.00],
        ['min' => 27750,    'max' => 28249.99, 'employeer_share' => 1900.00, 'employee_share' => 900.00],
        ['min' => 28250,    'max' => 28749.99, 'employeer_share' => 1900.00, 'employee_share' => 900.00],
        ['min' => 28750,    'max' => 29249.99, 'employeer_share' => 1900.00, 'employee_share' => 900.00],
        ['min' => 29250,    'max' => 29749.99, 'employeer_share' => 1900.00, 'employee_share' => 900.00],
        ['min' => 29750,    'max' => PHP_INT_MAX, 'employeer_share' => 1900.00, 'employee_share' => 900.00],
    ];
    
    /**
     * Run the database seeds.
     *
     * @return void
     */ 

    //RUN: php artisan db:seed --class=CreateUserSeeder

    //CREATE Area of Assignment Data first
    public function run()
    {
        $users = [
            [
                'name' => 'John Admin',
                'email' => 'admin@test.com',
                'password' => bcrypt('@admin123'),
                'salary' => '20,000',
                'department_id' => '1',
                'shift_id' => '1',
                'designation_id' => '1',
                'employment_id' => '2',
                'payment_method' => 'Weekly',
                'joining_date' => '2024-10-01',
                'leave_count' => '20',
                'update_leave_count' => '2024-10-01',
                'role' => 0,
            ],
            [
                'name' => 'Ben Employee',
                'email' => 'employee@test.com',
                'password' => bcrypt('@employee123'),
                'salary' => '18,000',
                'department_id' => '2',
                'shift_id' => '1',
                'designation_id' => '2',
                'employment_id' => '1',
                'payment_method' => 'Weekly',
                'joining_date' => '2024-09-20',
                'leave_count' => '20',
                'update_leave_count' => '2024-10-01',
                'role' => 1,
            ],
            [
                'name' => 'Zek Director',
                'email' => 'director@test.com',
                'password' => bcrypt('@director123'),
                'salary' => '19,000',
                'department_id' => '2',
                'shift_id' => '1',
                'designation_id' => '2',
                'employment_id' => '1',
                'payment_method' => '15 days',
                'joining_date' => '2024-10-02',
                'update_leave_count' => '2024-10-01',
                'leave_count' => '20',
                'role' => 2,
            ],
        ];
        foreach ($users as $user) {
            $user = User::create($user);

            $sss = 0; //35.50 trial expectation
            $philhealth = ((int)str_replace(',', '', $user['salary']) * .05); // Change to array access
            $pagibig = round((int)str_replace(',', '', $user['salary']) * 0.0176, 2); // Change to array access

            foreach ($this->sssTable as $range) {
                if ((int)str_replace(',', '', $user['salary']) >= $range['min'] && (int)str_replace(',', '', $user['salary']) <= $range['max']) {
                    $sss = $range['employee_share']; // Divide the contribution by 4 for weekly payment
                }
            }

            Deduction::create([
                'user_id' => $user->id,
                'deduction_name' => 'Pagibig',
                'percent' => $pagibig  
            ]);

            Deduction::create([
                'user_id' => $user->id,
                'deduction_name' => 'Philhealth',
                'percent' => $philhealth  
            ]);

            Deduction::create([
                'user_id' => $user->id,
                'deduction_name' => 'SSS',
                'percent' => $sss  
            ]);
        }

    }
}
