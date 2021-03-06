<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToArray;
use App\Models\User;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TeachersImport implements ToArray,WithHeadingRow
{
    public function array($array)
    {
        foreach ($array as $teacher) {

            $user = User::create([
                'avatar' => $teacher['avater'],
                'name' => $teacher['name'],
                'email' => $teacher['email'],
                'password' => bcrypt('123456'),
                'role_id' => 2,
                'status' => 0,
            ]);
        }
    }
}
