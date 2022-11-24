<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;

class UsersImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
            'fullname' => $row[2],
            'email' => ($row[1] !== null ) ? $row[1] : $row[3],
            'study_level' => $row[4],
            'specialite' => $row[5],
            'is_usthb' => $row[6],
            'is_celec' => $row[7],
        ]);
    }
}
