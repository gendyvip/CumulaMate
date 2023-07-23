<?php

namespace App\Imports;

use App\Models\Student;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StudentsImport implements ToCollection, WithHeadingRow
{
  /**
   * @param array $row
   *
   * @return \Illuminate\Database\Eloquent\Model|null
   */


  public function collection(Collection $rows)
  {


    foreach ($rows as $row) {
      $validator = Validator::make($row->toArray(), [
        'full_name' => 'required',
        'acadimic_id' => 'required',
      ]);

      if ($validator->validate()) {
        Student::updateOrCreate([
          'acadimic_id' => $row['acadimic_id'],
        ], [
          'full_name'  => $row['full_name'],
        ]);
      }
    }
  }
}