<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Leave;
use App\Models\Attendance;
use Carbon\Carbon;

class AutoCreateAttendance extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'attendance:auto-create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Auto create attendance records for approved leave requests';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        date_default_timezone_set('Asia/Manila');
        // Get today's date
        $today = Carbon::now();

        // Get approved leave requests for today
        $approvedLeaves = Leave::where('status', 'Approved')
            ->whereDate('created_at', $today)
            ->get();

        // Loop through approved leave requests and create attendance records
        foreach ($approvedLeaves as $leave) {
            $salary = (int)str_replace(',', '', $leave->employee->salary);
            $daily = ($salary/208)*8;
            Attendance::create([
                'user_id' => $leave->user_id,
                'date' => $today,
                'punched_in' => $today,
                'punched_out' => $today,
                'behavior' => 'Leave',
                'type' => 'Auto',
                'total_hours' => '8',
                'entry' => 'Single',
                'status' => '',
                'amount' => $daily
            ]);
        }
    }
}