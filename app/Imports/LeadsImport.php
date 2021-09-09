<?php

namespace App\Imports;

use App\Models\Lead;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithUpserts;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class LeadsImport implements ToModel, WithUpserts, WithHeadingRow
{
    /**
     * @return string|array
     */
    public function uniqueBy()
    {
        return 'phone';
    }

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Lead(
            [
                'name'  => $row['name'],
                'phone'    => $row['phone'],
                'email'    => $row['email'],
                'country'    => $row['country'],
                'subject'    => $row['subject'],
                'qualification'    => $row['qualification'],
                'result'    => $row['result'],
                'ielts'    => $row['ielts'],
                'address'    => $row['address'],
                'note'    => $row['note'],
            ]
        );
    }
}