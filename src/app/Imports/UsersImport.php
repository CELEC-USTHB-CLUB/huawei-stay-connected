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
        if ($row[0] !== null) {
            return new User([
                'fullname' => $row[0],
                'email' => $row[1],
                'study_level' => $row[2],
                'specialite' => $row[3],
                'is_usthb' => $row[4],
                'is_celec' => $row[5],
            ]);
        }
    }
}
