<?php

namespace App\Imports;

use App\Models\Classes;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToArray;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\User;
use App\Models\Course;
use App\Models\Class_user;

class StudentsImport implements ToArray, WithHeadingRow
{

    public function array($array)
    {
        foreach ($array as $student) {
            $user = User::create([
                'name' => $student['name'],
                'email' => $student['email'],
                'password' => bcrypt('123456'),
                'phone'=>$student['phone'],
                'address'=>$student['address'],
                'birthday' => $student['birthday'],
                'role_id' => 3,
                'status' => 0,
            ]);
        }
        // foreach(array_chunk($array, 30) as $index => $bulkStudent)
        // {
        //     $class = Classes::create([
        //         'name'=> 'Lớp'.' '.(++$index),

        //     ]);

        //     foreach($bulkStudent as $student)
        //     {
        //         $user=User::create([
        //             'name' => $student['name'],
        //             'email' => $student['email'],
        //             'password' => bcrypt('123456'),
        //             'role_id' => 3,
        //             'status' => 0,
        //         ]);

        //         $classes =Class_user::create([
        //             'class_id' => $class->id,
        //             'user_id' => $user->id,
        //         ]);


        //     }
        // }

    }
}
