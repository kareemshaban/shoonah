<?php

namespace App\Http\Controllers;

use App\Imports\MonthClosingImport;
use App\Models\attend;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel as FacadesExcel;
use Vtiful\Kernel\Excel;

class ExcelController extends Controller
{
    public function import(Request $request)
    {

       $month = Carbon::now() -> month ;

       $month_attends = attend::whereMonth('date' , '=' , $month) -> get();
       foreach ( $month_attends as $item) {
          $item -> delete();
       }

        FacadesExcel::import(new MonthClosingImport, $request->file);

        // $operations = DB::table('employees')
        // -> join('attends' , 'attends.user_id' , '=' , 'employees.tag')
        // -> join('deduction_and_bonses' , 'deduction_and_bonses.user_id' , '=' , 'employees.tag')
        // -> join('rewards' , 'rewards.user_id' , '=' , 'employees.tag')
        // -> join('advances' , 'advances.user_id' , '=' , 'employees.tag')
        // -> select('employees.tag' , 'employees.name' , 'attends.date as attends_date' , 'attends.attend_days_count' , 'attends.absence_days_count' ,
        // 'deduction_and_bonses.date as deduction_and_bonses_date' , 'deduction_and_bonses.type as deduction_and_bonses_type' , 'deduction_and_bonses.hours as deduction_and_bonses_hours' ,
        // 'rewards.date as rewards_date' , 'rewards.type as rewards_type' , 'rewards.reward as rewards_reward' , 'advances.type as advances_type' , 'advances.date as advances_date' ,
        // 'advances.amount as advances_amount' , 'advances.monthlyPayment as monthlyPayment')
        // -> whereMonth('attends.attends_date' , '=' , $month )
        // -> whereMonth('deduction_and_bonses.deduction_and_bonses_date' , '=' , $month )
        // -> whereMonth('rewards.rewards_date' , '=' , $month )
        // -> whereMonth('advances.startDate' , '<=' , $month ) -> get() ;

        // return $operations ;


        return redirect()->back()->with('success', 'Excel file imported successfully!');
    }


}
