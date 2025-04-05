<?php

namespace App\Imports;

use App\Models\attend;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;

class AttendImport implements ToModel , WithStartRow , WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {
      // dd($row);
        return new attend([
            'date' => Carbon::now(),
            'user_id' => intval($row["statistical_report_of_attendance"]),
            'attend_days_count' => substr($row[11] , strpos($row[11], '/') + 1  ) ,
            'absence_days_count' => $row[13 ],
            'user_ins' => Auth::user()-> id ,
        ]);
    }
    public function startRow(): int
    {
        return 5;
    }
}
