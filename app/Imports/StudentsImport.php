<?php

namespace App\Imports;

use App\Models\Classes;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToArray;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\User;

class StudentsImport implements ToArray,WithHeadingRow
{
    public function array($array)
    {   
            foreach(array_chunk($array, 30) as $index => $bulkStudent)
            {
                $class = Classes::create([
                    'name'=> 'Lớp'.' '.(++$index),
                ]);
                foreach($bulkStudent as $student)
                {
                    User::create([
                        'name' => $student['name'],
                        'email' => $student['email'],
                        'password' => bcrypt('123456'),
                        'role_id' => 3,
                        'status' => 0,
                        'class_id' => $class->id,
                    ]);
                }
            }
        
    }
}
