<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Leave;
use App\Models\Attendance;
use App\Models\User;
use Carbon\Carbon;

class AutoCreateAttendanceForLeave
{
    public function handle(Request $request, Closure $next)
    {
        date_default_timezone_set('Asia/Manila');
        // Get all approved leave requests for today
        $leaves = Leave::where('status', 'Approved')
            ->whereDate('start_date', Carbon::today())
            ->get();

        // Loop through each leave request and create an attendance record
        foreach ($leaves as $leave) {
            if(strpos($leave->leave_type, 'Paid') !== false){
                $attendance = Attendance::where('user_id', $leave->user_id)
                    ->whereDate('date', Carbon::today())
                    ->first();

                $employee = User::where('id', '=', $leave->user_id)->first();
                $salary = (int)str_replace(',', '', $employee->salary);
                $normal_hours = 8;

                $getNumber = preg_match('/\d+/', $leave->leave_type, $matches) ? $matches[0] : 0;

                $finalHours = $normal_hours + $getNumber;
                // If no attendance record exists, create a new one
                if (!$attendance) {
                    if (strpos($leave->leave_type, 'Undertime') !== True){
                        Attendance::create([
                            'user_id' => $leave->user_id,
                            'date' => Carbon::today(),
                            'punched_in' => Carbon::now(),
                            'punched_out' => Carbon::now(),
                            'behavior' => 'Leave',
                            'type' => 'Auto (Paid)',
                            'total_hours' => $finalHours,
                            'entry' => 'Single',
                            'status' => '',
                            'amount' => ($salary/208)*$finalHours,
                        ]);
                    }else{
                        $getUNumber = preg_match('/\d+/', $leave->leave_type, $matches) ? $matches[0] : 0;
                        $uhours = $normal_hours - $getUNumber;
                        Attendance::create([
                            'user_id' => $leave->user_id,
                            'date' => Carbon::today(),
                            'punched_in' => Carbon::now(),
                            'punched_out' => Carbon::now(),
                            'behavior' => 'Leave',
                            'type' => 'Auto (Paid)',
                            'total_hours' => $uhours,
                            'entry' => 'Single',
                            'status' => '',
                            'amount' => ($salary/208)*$uhours,
                        ]);
                    }
                }
            }else{
                $attendance = Attendance::where('user_id', $leave->user_id)
                ->whereDate('date', Carbon::today())
                ->first();

                $normal_hours = 8;

                $getNumber = preg_match('/\d+/', $leave->leave_type, $matches) ? $matches[0] : 0;

                $finalHours = $normal_hours + $getNumber;

                // If no attendance record exists, create a new one
                if (!$attendance) {
                    if (strpos($leave->leave_type, 'Undertime') !== True){
                        Attendance::create([
                            'user_id' => $leave->user_id,
                            'date' => Carbon::today(),
                            'punched_in' => Carbon::now(),
                            'punched_out' => Carbon::now(),
                            'behavior' => 'Leave',
                            'type' => 'Auto (Unpaid)',
                            'total_hours' => $finalHours,
                            'status' => '',
                            'entry' => 'Single',
                            'amount' => 'Not paid'
                        ]);
                    }else{
                        $getUNumber = preg_match('/\d+/', $leave->leave_type, $matches) ? $matches[0] : 0;
                        $uhours = $normal_hours - $getUNumber;
                        Attendance::create([
                            'user_id' => $leave->user_id,
                            'date' => Carbon::today(),
                            'punched_in' => Carbon::now(),
                            'punched_out' => Carbon::now(),
                            'behavior' => 'Leave',
                            'type' => 'Auto (Unpaid)',
                            'total_hours' => $uhours,
                            'entry' => 'Single',
                            'status' => '',
                            'amount' => 'Not paid',
                        ]);
                    }
                }
            }
        }

        return $next($request);
    }
}
