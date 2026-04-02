<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Payrun;
use App\Models\Payslip;
use App\Models\User;
use App\Models\Leave;
use App\Models\Document;
use App\Models\Department;
use App\Models\Deduction;
use App\Models\Shift;
use App\Models\Designation;
use App\Models\EmploymentStatus;
use App\Models\Overtime;
use App\Models\Undertime;

use App\Models\HolidayPaymentIncrease;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

use App\Models\ContributionSetting;
use App\Models\SssTable;
use App\Models\DeductionReal;

use PDF;

class PayrollOfficerController extends Controller
{
    private $nationalHolidays = [
        '01-01' => 'New Year\'s Day',
        '03-28' => 'Maundy Thursday',
        '03-29' => 'Good Friday',
        '04-09' => 'Araw ng Kagitingan (Day of Valor)',
        '05-01' => 'Labor Day',
        '06-12' => 'Independence Day',
        '08-26' => 'National Heroes\' Day',
        '11-01' => 'All Saints\' Day',
        '11-30' => 'Bonifacio Day',
        '12-25' => 'Christmas Day',
        '12-30' => 'Rizal Day',
    ];

    private $sssTable = [
        ['min' => 0, 'max' => 5249.99, 'employeer_share' => 510.00, 'employee_share' => 250.00],
        ['min' => 5250, 'max' => 5749.99, 'employeer_share' => 560.00, 'employee_share' => 275.00],
        ['min' => 5750, 'max' => 6249.99, 'employeer_share' => 610.00, 'employee_share' => 300.00],
        ['min' => 6250, 'max' => 6749.99, 'employeer_share' => 660.00, 'employee_share' => 325.00],
        ['min' => 6750, 'max' => 7249.99, 'employeer_share' => 710.00, 'employee_share' => 350.00],
        ['min' => 7250, 'max' => 7749.99, 'employeer_share' => 760.00, 'employee_share' => 375.00],
        ['min' => 7750, 'max' => 8249.99, 'employeer_share' => 810.00, 'employee_share' => 400.00],
        ['min' => 8250, 'max' => 8749.99, 'employeer_share' => 860.00, 'employee_share' => 425.00],
        ['min' => 8750, 'max' => 9249.99, 'employeer_share' => 910.00, 'employee_share' => 450.00],
        ['min' => 9250, 'max' => 9749.99, 'employeer_share' => 960.00, 'employee_share' => 475.00],
        ['min' => 9750, 'max' => 10249.99, 'employeer_share' => 1010.00, 'employee_share' => 500.00],
        ['min' => 10250, 'max' => 10749.99, 'employeer_share' => 1060.00, 'employee_share' => 525.00],
        ['min' => 10750, 'max' => 11249.99, 'employeer_share' => 1110.00, 'employee_share' => 550.00],
        ['min' => 11250, 'max' => 11749.99, 'employeer_share' => 1160.00, 'employee_share' => 575.00],
        ['min' => 11750, 'max' => 12249.99, 'employeer_share' => 1210.00, 'employee_share' => 600.00],
        ['min' => 12250, 'max' => 12749.99, 'employeer_share' => 1260.00, 'employee_share' => 625.00],
        ['min' => 12750, 'max' => 13249.99, 'employeer_share' => 1310.00, 'employee_share' => 650.00],
        ['min' => 13250, 'max' => 13749.99, 'employeer_share' => 1360.00, 'employee_share' => 675.00],
        ['min' => 13750, 'max' => 14249.99, 'employeer_share' => 1410.00, 'employee_share' => 700.00],
        ['min' => 14250, 'max' => 14749.99, 'employeer_share' => 1460.00, 'employee_share' => 725.00],
        ['min' => 14750, 'max' => 15249.99, 'employeer_share' => 1510.00, 'employee_share' => 750.00],
        ['min' => 15250, 'max' => 15749.99, 'employeer_share' => 1560.00, 'employee_share' => 775.00],
        ['min' => 15750, 'max' => 16249.99, 'employeer_share' => 1610.00, 'employee_share' => 800.00],
        ['min' => 16250, 'max' => 16749.99, 'employeer_share' => 1660.00, 'employee_share' => 825.00],
        ['min' => 16750, 'max' => 17249.99, 'employeer_share' => 1710.00, 'employee_share' => 850.00],
        ['min' => 17250, 'max' => 17749.99, 'employeer_share' => 1760.00, 'employee_share' => 875.00],
        ['min' => 17750, 'max' => 18249.99, 'employeer_share' => 1810.00, 'employee_share' => 900.00],
        ['min' => 18250, 'max' => 18749.99, 'employeer_share' => 1860.00, 'employee_share' => 925.00],
        ['min' => 18750, 'max' => 19249.99, 'employeer_share' => 1910.00, 'employee_share' => 950.00],
        ['min' => 19250, 'max' => 19749.99, 'employeer_share' => 1960.00, 'employee_share' => 975.00],
        ['min' => 19750, 'max' => 20249.99, 'employeer_share' => 2010.00, 'employee_share' => 1000.00],
        ['min' => 20250, 'max' => 20749.99, 'employeer_share' => 2130.00, 'employee_share' => 1025.00],
        ['min' => 20750, 'max' => 21249.99, 'employeer_share' => 2180.00, 'employee_share' => 1050.00],
        ['min' => 21250, 'max' => 21749.99, 'employeer_share' => 2230.00, 'employee_share' => 1075.00],
        ['min' => 21750, 'max' => 22249.99, 'employeer_share' => 2280.00, 'employee_share' => 1100.00],
        ['min' => 22250, 'max' => 22749.99, 'employeer_share' => 2330.00, 'employee_share' => 1125.00],
        ['min' => 22750, 'max' => 23249.99, 'employeer_share' => 2380.00, 'employee_share' => 1150.00],
        ['min' => 23250, 'max' => 23749.99, 'employeer_share' => 2430.00, 'employee_share' => 1175.00],
        ['min' => 23750, 'max' => 24249.99, 'employeer_share' => 2480.00, 'employee_share' => 1200.00],
        ['min' => 24250, 'max' => 24749.99, 'employeer_share' => 2530.00, 'employee_share' => 1225.00],
        ['min' => 24750, 'max' => PHP_INT_MAX, 'employeer_share' => 2580.00, 'employee_share' => 1250.00],
    ];

    public function home(){
        $user = Auth::user();
        $mattendance = Attendance::where('user_id', '=', Auth::user()->id)->where('entry', '=', 'Single')->whereDate('date', Carbon::today())->first();
        $aattendance = Attendance::where('user_id', '=', Auth::user()->id)->where('entry', '=', 'Double')->whereDate('date', Carbon::today())->first();

        $leaves = Leave::whereYear('start_date', '=', Carbon::now()->year)->where('user_id','=',$user->id)->where('status','=','Approved')->get();
        $leaves_count = $leaves->count();
        
        if ($leaves && $leaves->count() == 0){
            $leaves = 0;
            $leaveavailable = $user->leave_count;
        }else{
            if($user->update_leave_count == null || $user->update_leave_count->year != Carbon::now()->year){
                $leaveavailable = $user->leave_count - $leaves->count();
            }else{
                $leaveavailable = ($user->leave_count - 1) - $leaves->count();
            }
            
        }

        return view('payroll_officer.home', compact('user', 'mattendance', 'aattendance', 'leaves_count', 'leaveavailable'));
    }

    public function punchin(Request $request){
        
        date_default_timezone_set('Asia/Manila');

        $record = Attendance::where('user_id', '=', Auth::user()->id)->whereDate('date', Carbon::today())->first();
        $leave_record = Attendance::where('user_id', '=', Auth::user()->id)->where('behavior','=','Leave')->whereDate('date', Carbon::today())->first();

        if(!$leave_record){
            if($record){

                $drecord = Attendance::where('user_id', '=', Auth::user()->id)->whereDate('date', Carbon::today())->latest()->first();

                if($drecord->entry == 'Single' && $drecord->punched_out != ''){
                    if(Carbon::now()->format('H:i') < '13:00')
                    {
                        $targetTime = Carbon::today()->setTimeFromTimeString('13:00');
                        $now = Carbon::now();
                        $diffInMinutes = $targetTime->diffInMinutes($now, false); // signed difference
                        $minutes = abs($diffInMinutes);

                        if ($minutes >= 60) {
                            $hours = floor($minutes / 60);
                            $behavior = $hours . ' hour' . ($hours > 1 ? 's' : '') . ' early';
                        } else {
                            $behavior = $minutes . ' minutes early';
                        }
                        Attendance::create([
                            'user_id' => auth()->user()->id,
                            'date' => Carbon::now(),
                            'punched_in' => Carbon::now(),
                            'punched_out' => '',
                            'behavior' => $behavior,
                            'type' => 'Manual',
                            'total_hours' => 'Not yet totalled',
                            'entry' => 'Double',
                            'status' => '',
                            'amount' => ''
                        ]);
                    }
                    elseif(Carbon::now()->format('H:i') >= '13:00' && Carbon::now()->format('H:i') <= '13:05')
                    {
                        Attendance::create([
                            'user_id' => auth()->user()->id,
                            'date' => Carbon::now(),
                            'punched_in' => Carbon::now(),
                            'punched_out' => '',
                            'behavior' => 'On time',
                            'type' => 'Manual',
                            'total_hours' => 'Not yet totalled',
                            'entry' => 'Double',
                            'status' => '',
                            'amount' => ''
                        ]);
                    }
                    elseif(Carbon::now()->format('H:i') > '13:05'){
                        $targetTime = Carbon::today()->setTimeFromTimeString('13:00');
                        $now = Carbon::now();
                        $diffInMinutes = $targetTime->diffInMinutes($now, false); // signed difference
                        $minutes = abs($diffInMinutes);

                        if ($minutes >= 60) {
                            $hours = floor($minutes / 60);
                            $behavior = $hours . ' hour' . ($hours > 1 ? 's' : '') . ' late';
                        } else {
                            $behavior = $minutes . ' minutes late';
                        }
                        Attendance::create([
                            'user_id' => auth()->user()->id,
                            'date' => Carbon::now(),
                            'punched_in' => Carbon::now(),
                            'punched_out' => '',
                            'behavior' => $behavior,
                            'type' => 'Manual',
                            'total_hours' => 'Not yet totalled',
                            'entry' => 'Double',
                            'status' => '',
                            'amount' => ''
                        ]);
                    }
                }

            }else{
                $srecord = Attendance::where('entry', '=', 'Single')->where('user_id', '=', Auth::user()->id)->whereDate('date', Carbon::today())->first();

                if(!$srecord){
                    if(Carbon::now()->format('H:i') < '08:00')
                    {
                        $targetTime = Carbon::today()->setTimeFromTimeString('08:00');
                        $now = Carbon::now();
                        $diffInMinutes = $targetTime->diffInMinutes($now, false); // signed difference
                        $minutes = abs($diffInMinutes);

                        if ($minutes >= 60) {
                            $hours = floor($minutes / 60);
                            $behavior = $hours . ' hour' . ($hours > 1 ? 's' : '') . ' early';
                        } else {
                            $behavior = $minutes . ' minutes early';
                        }
                        Attendance::create([
                            'user_id' => auth()->user()->id,
                            'date' => Carbon::now(),
                            'punched_in' => Carbon::now(),
                            'punched_out' => '',
                            'behavior' => $behavior,
                            'type' => 'Manual',
                            'total_hours' => 'Not yet totalled',
                            'entry' => 'Single',
                            'status' => '',
                            'amount' => ''
                        ]);
                    }
                    elseif(Carbon::now()->format('H:i') >= '08:00' && Carbon::now()->format('H:i') <= '08:05')
                    {
                        Attendance::create([
                            'user_id' => auth()->user()->id,
                            'date' => Carbon::now(),
                            'punched_in' => Carbon::now(),
                            'punched_out' => '',
                            'behavior' => 'On time',
                            'type' => 'Manual',
                            'total_hours' => 'Not yet totalled',
                            'entry' => 'Single',
                            'status' => '',
                            'amount' => ''
                        ]);
                    }
                    elseif(Carbon::now()->format('H:i') > '08:05'){
                        $targetTime = Carbon::today()->setTimeFromTimeString('08:00');
                        $now = Carbon::now();
                        $diffInMinutes = $targetTime->diffInMinutes($now, false); // signed difference
                        $minutes = abs($diffInMinutes);

                        if ($minutes >= 60) {
                            $hours = floor($minutes / 60);
                            $behavior = $hours . ' hour' . ($hours > 1 ? 's' : '') . ' late';
                        } else {
                            $behavior = $minutes . ' minutes late';
                        }
                        Attendance::create([
                            'user_id' => auth()->user()->id,
                            'date' => Carbon::now(),
                            'punched_in' => Carbon::now(),
                            'punched_out' => '',
                            'behavior' => $behavior,
                            'type' => 'Manual',
                            'total_hours' => 'Not yet totalled',
                            'entry' => 'Single',
                            'status' => '',
                            'amount' => ''
                        ]);
                    }
                }
            }
        }

        return redirect()->back();
    }
    
    public function punchout(Request $request){
        
        date_default_timezone_set('Asia/Manila');


        $record = Attendance::whereDate('date', Carbon::today())->latest()->first();
        $employee = User::where('id', '=', Auth::user()->id)->first();
        $salary = (int)str_replace(',', '', $employee->salary);
        $daily = ($salary/208)*8; //208 represents month total hours I just inputed 206 on the hours below dont be confused
        $today = Carbon::today()->format('m-d');
        $leave_record = Attendance::where('user_id', '=', Auth::user()->id)->where('behavior','=','Leave')->whereDate('date', Carbon::today())->first();

        if(!$record || $leave_record){
            return redirect()->back();
        }else{
            if($record->behavior != 'Leave'){
                $total_hours = Carbon::parse($record->punched_in)->diffInHours(Carbon::now()); //total hours after punchout
                $hours = 206; //total hours of the month too "SAMPLE"

                $holidayCustomIncrease = HolidayPaymentIncrease::whereDate('created_at', Carbon::today())->latest()->first();

                if($holidayCustomIncrease != null){
                    if($total_hours >= 6){
                        $record->punched_out = Carbon::now();
                        $record->total_hours = $total_hours;
                        if (array_key_exists($today, $this->nationalHolidays)) {
                            $record->amount = round(($daily/2)*2, 2);
                        }else{
                            $amountpercent = round($holidayCustomIncrease->amount*.01, 2);
                            $amountget = round(($daily/2)*$amountpercent, 2);
                            $record->amount = round(($daily/2) + $amountget, 2);
                        }
                        $record->save();
                    }
                    else{
                        $record->punched_out = Carbon::now();
                        $record->total_hours = $total_hours;
                        if (array_key_exists($today, $this->nationalHolidays)) {
                            $record->amount = round(($daily/2)*2, 2);
                        }else{
                            $amountpercent = round($holidayCustomIncrease->amount*.01, 2);
                            $amountget = round(($daily/2)*$amountpercent, 2);
                            $record->amount = round(($daily/2) + $amountget, 2);
                        }
                        $record->save();
                    }
                }else{
                    if($total_hours >= 6){
                        $record->punched_out = Carbon::now();
                        $record->total_hours = $total_hours;
                        if (array_key_exists($today, $this->nationalHolidays)) {
                            $record->amount = round($daily*2, 2);
                        }else{
                            $record->amount = round($daily, 2);
                        }
                        $record->save();
                    }
                    else{
                        $record->punched_out = Carbon::now();
                        $record->total_hours = $total_hours;
                        if (array_key_exists($today, $this->nationalHolidays)) {
                            $record->amount = round(($daily/2)*2, 2);
                        }else{
                            $record->amount = round($daily/2, 2);
                        }
                        $record->save();
                    }
                }
            } 
        }     

        return redirect()->back();
    }


    public function filterDateAttendanceAdmin(Request $request)
    {
        $user = Auth::user();
        $attendanceSearch = $request->attendance_search;
        $filter = $request->filter;
        $departments = Department::all();
        $getAttendance = Attendance::with('employee');

        if ($filter === 'Name') {
            $getAttendance = $getAttendance->whereHas('employee', function ($query) use ($attendanceSearch) {
                $query->where('name', 'like', "%{$attendanceSearch}%");
            });
        } elseif ($filter === 'Date') {
            $getAttendance = $getAttendance->whereDate('date', $attendanceSearch);
        } elseif ($filter === 'Month') {
            // Make sure $attendanceSearch is in 'YYYY-MM' format (e.g., '2025-10')
            $getAttendance = $getAttendance->whereYear('date', Carbon::parse($attendanceSearch)->year)
                                        ->whereMonth('date', Carbon::parse($attendanceSearch)->month);
        }

        $getAttendance = $getAttendance->orderBy('punched_in', 'desc')->get();
        return view("payroll_officer.employees.allattendance",compact('getAttendance', 'user', 'departments'));
        
    }

    public function exportAll()
    {
        $attendances = Attendance::all();
    
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
    
        $sheet->setCellValue('A1', 'Employee ID');
        $sheet->setCellValue('B1', 'Time');
    
        $rowNumber = 2; 
    
        foreach ($attendances as $attendance) {
            $sheet->setCellValue('A' . $rowNumber, $attendance->user_id);
            $sheet->setCellValue('B' . $rowNumber, $attendance->punched_in);
    
            $rowNumber++;
    
            $sheet->setCellValue('A' . $rowNumber, $attendance->user_id);
            $sheet->setCellValue('B' . $rowNumber, $attendance->punched_out);
    
            $rowNumber++;
        }
    
        $fileName = 'attendance_' . Auth::user()->id . '.xlsx';
    
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="' . $fileName . '"');
        header('Cache-Control: max-age=0');
        header('Pragma: public');
    
        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
    
        exit;
    }

    public function soloexport(Attendance $export)
    {
        // Fetch attendance records for the given attendance ID
        $attendances = Attendance::where('id', $export->id)
            ->get(['user_id', 'punched_in', 'punched_out']);
    
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
    
        // Set headers for the spreadsheet
        $sheet->setCellValue('A1', 'Employee ID');
        $sheet->setCellValue('B1', 'Time');
    
        // Fill the sheet with attendance data
        $rowNumber = 2; // Start from the second row to leave space for headers
    
        foreach ($attendances as $attendance) {
            // Punch In Row
            $sheet->setCellValue('A' . $rowNumber, $attendance->user_id);
            $sheet->setCellValue('B' . $rowNumber, $attendance->punched_in);
    
            // Move to next row for Punch Out
            $rowNumber++;
    
            // Punch Out Row
            $sheet->setCellValue('A' . $rowNumber, $attendance->user_id);
            $sheet->setCellValue('B' . $rowNumber, $attendance->punched_out);
    
            // Move to the next row for the next set of punch in/out
            $rowNumber++;
        }
    
        // Set the file name
        $fileName = 'attendance_' . Auth::user()->id . '.xlsx';
    
        // Set headers for the download
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="' . $fileName . '"');
        header('Cache-Control: max-age=0');
        header('Pragma: public');
    
        // Write the file to the output stream
        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
    
        // Terminate the script
        exit;
    }

    public function add_designation(Request $request)
    {
        $name = $request->des_name;

        Designation::create([
            'designation_name'=>$name
        ]);

        return redirect()->back()->with('success', 'Designation have been added successfully!');
    }

    public function edit_designation(Request $request)
    {
        $designation = Designation::findOrFail($request->des_id);
        $name = $request->edit_desname;

        $designation->designation_name = $name;
        $designation->save();

        return redirect()->back()->with('success', 'Designation have been updated successfully!');
    }

    public function add_department(Request $request)
    {
        $name = $request->dep_name;

        Department::create([
            'department_name'=>$name
        ]);

        return redirect()->back()->with('success', 'Department have been added successfully!');
    }

    public function edit_department(Request $request)
    {
        $department = Department::findOrFail($request->dep_id);
        $name = $request->edit_depname;

        $department->department_name = $name;
        $department->save();

        return redirect()->back()->with('success', 'Department have been updated successfully!');
    }

    public function delete_department(Request $request, $department_id)
    {
        // Retrieve employee payslips that have not been sent
        $department = Department::findOrFail($department_id);

        $department->delete();

        return redirect()->back()->with('success', 'Department have been deleted successfully!');
    }

    public function delete_designation(Request $request, $designation_id)
    {
        // Retrieve employee payslips that have not been sent
        $designation = Designation::findOrFail($designation_id);

        $designation->delete();

        return redirect()->back()->with('success', 'Designation have been deleted successfully!');
    }

    public function add_employment_status(Request $request)
    {
        $stat_name = $request->stat_name;

        EmploymentStatus::create([
            'status'=>$stat_name
        ]);

        return redirect()->back()->with('success', 'New Employee status have been added successfully!');
    }

    public function edit_employment_status(Request $request)
    {
        $user = User::findOrFail($request->emp_id);
        $emp_stat = $request->emp_stat;

        $user->employment_id = $emp_stat;
        $user->save();

        return redirect()->back()->with('success', 'Employee status have been updated successfully!');
    }

    public function filterEmployeeSearch(Request $request)
    {
        $user = Auth::user();
        $name = $request->employee_search;
        
        // Perform the search based on the query
        $employees = User::where('name','like',"%{$name}%")
        ->orderBy("employment_id", 'asc')
        ->get();

        $emp_stat = EmploymentStatus::all();

        // Return the data as a JSON response
        return view("payroll_officer.employees.employmentstatus",compact('employees', 'user','emp_stat'));
        
    }

    public function payrun(Request $request){
        date_default_timezone_set('Asia/Manila');

        $request->validate([
            'method' => 'required',
        ]);

        if ($request->method == 'Weekly'){

            $employess = User::where('payment_method', '=', $request->method)->get();
            $hours = 206;

            $payrun = Payrun::create([
                'generated_id' => Str::upper(Str::random(8)), 
                'date' => Carbon::now(),
            ]);

            foreach($employess as $employee){
                $startOfMonth = Carbon::now()->startOfMonth(); // First day of the current month
                $endOfMonth = Carbon::now()->endOfMonth();     // Last day of the current month

                $payslips = Payslip::where('user_id', '=', $employee->id)
                    ->where('created_at', '>=', $startOfMonth)  // Greater than or equal to the first day of the current month
                    ->where('created_at', '<=', $endOfMonth)    // Less than or equal to the last day of the current month
                    ->get();

                $latestAttendance = Attendance::where('user_id', '=', $employee->id)
                ->where('status', '=', 'received')
                ->latest()
                ->first();
            
                if ($latestAttendance) {
                    $getAttendance = Attendance::where('user_id', '=', $employee->id)
                        ->where('created_at', '>', $latestAttendance->created_at)
                        ->get();
                } else {
                    $getAttendance = Attendance::where('user_id', '=', $employee->id)
                    ->get();
                }

                $totalminutesLate = 0;
                $totalDailySalary = 0;
                $overtimeHours = 0;
                foreach ($getAttendance as $ghours) {
                    $punchedOutTime = Carbon::parse($ghours->punched_out);
                    $endTime = Carbon::parse('17:00');
                    
                    $punchedInTime = Carbon::parse($ghours->punched_in);
                    $morning = Carbon::parse('08:00');
                    $morning2 = Carbon::parse('10:00');
                    $afternoon = Carbon::parse('13:00');
                    $afternoon2 = Carbon::parse('15:00');
                    
                    if ($punchedOutTime > $endTime) {
                        // Overtime calculation
                        $ot = $punchedOutTime->diffInHours($endTime);
                        $totalDailySalary += $ghours->amount;
                        $overtimeHours += $ot;
                    
                        // Late calculation
                        if ($punchedInTime > $morning && $punchedInTime < $morning2) {
                            $totalminutesLate += $punchedInTime->diffInMinutes($morning);
                        } elseif ($punchedInTime > $afternoon && $punchedInTime < $afternoon2) {
                            $totalminutesLate += $punchedInTime->diffInMinutes($afternoon);
                        } else {
                            $totalminutesLate += 0;
                        }
                    } else {
                        // No overtime
                        //$totalActiveHours += intval($ghours->total_hours);
                        if($ghours->amount == 'Not paid'){
                            $totalDailySalary += 0;
                        }else{
                            $totalDailySalary += $ghours->amount;
                        }

                        // Late calculation
                        if ($punchedInTime > $morning && $punchedInTime < $morning2) {
                            $totalminutesLate += $punchedInTime->diffInMinutes($morning);
                        } elseif ($punchedInTime > $afternoon && $punchedInTime < $afternoon2) {
                            $totalminutesLate += $punchedInTime->diffInMinutes($afternoon);
                        } else {
                            $totalminutesLate += 0;
                        }
                    }
                }

                $overtimePay = $overtimeHours*10;
                $totalPayment = $totalDailySalary;
                $totalDeduction = 0;
                $sss = 0; //35.50 trial expectation
                $philhealth = ((int)str_replace(',', '', $employee->salary) * .05) / 4; //As of now based on the table, starting from 10k to 99k it the 5% of the salary should be contributed.
                $pagibig = round($totalPayment*0.0044, 2); //13.67

                foreach ($this->sssTable as $range) {
                    if ($employee->salary >= $range['min'] && $employee->salary <= $range['max']) {
                        $sss = $range['employee_share'] / 4; // Divide the contribution by 4 for weekly payment
                    }
                }
                $netsalary = $totalPayment + $overtimePay;




                if($payslips->isNotEmpty()){
                    $newsss = 0;
                    $newpagibig = 0;
                    $newphilhealth = 0;

                    foreach($payslips as $payslip){
                        $newsss += $payslip->sss;
                        $newpagibig += $payslip->pagibig;
                        $newphilhealth += $payslip->philhealth;
                    }

                    if(($newsss - ($sss*4)) == 0 && ($newphilhealth - ($philhealth*4)) == 0 && ($newpagibig - ($pagibig*4)) == 0){
                        //$totalPayment -= ($philhealth + $pagibig + $totalminutesLate);
                        $totalPayment += $overtimePay;
                        Payslip::create([
                            'user_id' => $employee->id,
                            'payrun_id' => $payrun->id,
                            'payrun_period' => 'Weekly',
                            'payrun_type' => 'Default',
                            'status' => 'Pending',
                            'total_salary' => round($totalPayment, 2),
                            'net_salary' => $netsalary,
                            'condition' => 'not sent',
                            'sss' => 0,
                            'pagibig' => 0,
                            'philhealth' => 0,
                        ]);

                        

                    }elseif(($newsss - ($sss*4)) == 0 && $newphilhealth - ($philhealth*4) == 0){
                        $totalPayment -= ($pagibig + $totalminutesLate);
                        $totalPayment += $overtimePay;
                        Payslip::create([
                            'user_id' => $employee->id,
                            'payrun_id' => $payrun->id,
                            'payrun_period' => 'Weekly',
                            'payrun_type' => 'Default',
                            'status' => 'Pending',
                            'total_salary' => round($totalPayment, 2),
                            'net_salary' => $netsalary,
                            'condition' => 'not sent',
                            'sss' => 0,
                            'pagibig' => $pagibig,
                            'philhealth' => 0,
                        ]);

                        

                    }elseif(($newsss - ($sss*4)) == 0 && ($newpagibig - ($pagibig*4)) == 0){
                        $totalPayment -= ($philhealth + $totalminutesLate);
                        $totalPayment += $overtimePay;
                        Payslip::create([
                            'user_id' => $employee->id,
                            'payrun_id' => $payrun->id,
                            'payrun_period' => 'Weekly',
                            'payrun_type' => 'Default',
                            'status' => 'Pending',
                            'total_salary' => round($totalPayment, 2),
                            'net_salary' => $netsalary,
                            'condition' => 'not sent',
                            'sss' => 0,
                            'pagibig' => 0,
                            'philhealth' => $philhealth,
                        ]);

                        

                    }elseif(($newphilhealth - ($philhealth*4)) == 0 && ($newpagibig - ($pagibig*4)) == 0){
                        $totalPayment -= ($sss + $totalminutesLate);
                        $totalPayment += $overtimePay;
                        Payslip::create([
                            'user_id' => $employee->id,
                            'payrun_id' => $payrun->id,
                            'payrun_period' => 'Weekly',
                            'payrun_type' => 'Default',
                            'status' => 'Pending',
                            'total_salary' => round($totalPayment, 2),
                            'net_salary' => $netsalary,
                            'condition' => 'not sent',
                            'sss' => $sss,
                            'pagibig' => 0,
                            'philhealth' => 0,
                        ]);

                        

                    }elseif(($newphilhealth - ($philhealth*4)) == 0){
                        $totalPayment -= ($sss + $pagibig + $totalminutesLate);
                        $totalPayment += $overtimePay;
                        Payslip::create([
                            'user_id' => $employee->id,
                            'payrun_id' => $payrun->id,
                            'payrun_period' => 'Weekly',
                            'payrun_type' => 'Default',
                            'status' => 'Pending',
                            'total_salary' => round($totalPayment, 2),
                            'net_salary' => $netsalary,
                            'condition' => 'not sent',
                            'sss' => $sss,
                            'pagibig' => $pagibig,
                            'philhealth' => 0,
                        ]);
                    }elseif(($newpagibig - ($pagibig*4)) == 0){
                        $totalPayment -= ($sss + $philhealth + $totalminutesLate);
                        $totalPayment += $overtimePay;
                        Payslip::create([
                            'user_id' => $employee->id,
                            'payrun_id' => $payrun->id,
                            'payrun_period' => 'Weekly',
                            'payrun_type' => 'Default',
                            'status' => 'Pending',
                            'total_salary' => round($totalPayment, 2),
                            'net_salary' => $netsalary,
                            'condition' => 'not sent',
                            'sss' => $sss,
                            'pagibig' => 0,
                            'philhealth' => $philhealth,
                        ]);
                    }elseif(($newsss - ($sss*4)) == 0){
                        $totalPayment -= ($philhealth + $pagibig + $totalminutesLate);
                        $totalPayment += $overtimePay;
                        Payslip::create([
                            'user_id' => $employee->id,
                            'payrun_id' => $payrun->id,
                            'payrun_period' => 'Weekly',
                            'payrun_type' => 'Default',
                            'status' => 'Pending',
                            'total_salary' => round($totalPayment, 2),
                            'net_salary' => $netsalary,
                            'condition' => 'not sent',
                            'sss' => 0,
                            'pagibig' => $pagibig,
                            'philhealth' => $philhealth,
                        ]);
                    }else{
                        $totalPayment -= ($sss + $philhealth + $pagibig + $totalminutesLate);
                        $totalPayment += $overtimePay;
                        Payslip::create([
                            'user_id' => $employee->id,
                            'payrun_id' => $payrun->id,
                            'payrun_period' => 'Weekly',
                            'payrun_type' => 'Default',
                            'status' => 'Pending',
                            'total_salary' => round($totalPayment, 2),
                            'net_salary' => $netsalary,
                            'condition' => 'not sent',
                            'sss' => $sss,
                            'pagibig' => $pagibig,
                            'philhealth' => $philhealth,
                        ]);
                    }
                }
                else{
                    $totalPayment -= ($sss + $philhealth + $pagibig + $totalminutesLate);
                    $totalPayment += $overtimePay;
                    Payslip::create([
                        'user_id' => $employee->id,
                        'payrun_id' => $payrun->id,
                        'payrun_period' => 'Weekly',
                        'payrun_type' => 'Default',
                        'status' => 'Pending',
                        'total_salary' => round($totalPayment, 2),
                        'net_salary' => $netsalary,
                        'condition' => 'not sent',
                        'sss' => $sss,
                        'pagibig' => $pagibig,
                        'philhealth' => $philhealth,
                    ]);
                }

                $lastAttendance = Attendance::where('user_id', '=', $employee->id)
                ->latest('id')
                ->first();

                if($lastAttendance){
                    $lastAttendance->status = 'received';
                    $lastAttendance->save();
                }
            }
        }
        elseif ($request->method == '15 days') {
            $employees = User::where('payment_method', $request->method)->get();
            $hours = 206;

            $payrun = Payrun::create([
                'generated_id' => Str::upper(Str::random(8)), 
                'date' => Carbon::now(),
            ]);

            $monthYear = Carbon::createFromFormat('Y-m', $request->monthyear);
            $startOfMonth = $monthYear->copy()->startOfMonth(); 
            $endOfMonth = $monthYear->copy()->endOfMonth();     

            if ($request->has('is_first')) {
                // First cut-off: 1st to 15th
                $startDate = $startOfMonth;
                $endDate = $monthYear->copy()->startOfMonth()->addDays(14); // 15th day
            } else {
                // Second cut-off: 16th to 30th
                $startDate = $monthYear->copy()->startOfMonth()->addDays(15); // 16th day
                $endDate = min($monthYear->copy()->startOfMonth()->addDays(29), $endOfMonth);   // 30th day
            }

            $monthRange = $startDate->format('d') . ' - ' . $endDate->format('d') . ' ' . $monthYear->format('F Y');
            //dd($monthRange);
            $holidayCheck = HolidayPaymentIncrease::whereBetween('date', [$startDate, $endDate])->where('multiplier','=',2)->get();

            $ph_setting = ContributionSetting::where('name', 'Philhealth')->first();
            $ph_percent = $ph_setting->number_of_percent / 100;

            $pg_setting = ContributionSetting::where('name', 'Pagibig')->first();
            $pg_percent = $pg_setting->number_of_percent / 100;

            foreach ($employees as $employee) {

                $paid_absent_holiday = 0;
                $dailyCompensation = round(((int)str_replace(',', '', $employee->salary) / 20), 2);

                $payslips = Payslip::where('user_id', $employee->id)
                    ->whereBetween('created_at', [$startOfMonth, $endOfMonth])
                    ->get();

                $getAttendance = Attendance::where('user_id', $employee->id)
                    ->whereBetween('punched_in', [$startDate, $endDate])
                    ->get();

                foreach (new \DatePeriod($startDate, \DateInterval::createFromDateString('1 day'), $endDate->addDay()) as $currentDate) {
                    $isHoliday = $holidayCheck->contains(function($holiday) use ($currentDate) {
                        return Carbon::parse($holiday->date)->isSameDay($currentDate);
                    });

                    $hasAttendance = $getAttendance->contains(function($attendance) use ($currentDate) {
                        return Carbon::parse($attendance->punched_in)->isSameDay($currentDate);
                    });

                    if ($isHoliday && !$hasAttendance) {
                        $paid_absent_holiday += $dailyCompensation;
                    }
                    
                }

                $totalminutesLate = 0;
                $totalDailySalary = 0;
                $overtimeHours = 0;
                foreach ($getAttendance as $ghours) {
                
                    //dump($ghours->date);
                    $is_overtime = Overtime::where('date','=',$ghours->date)->where('employee_id','=',$ghours->user_id)->where('status','=','Approved')->first();

                    $punchedOutTime = Carbon::parse($ghours->punched_out);
                    $endTime = Carbon::parse($ghours->punched_out)->setTime(17, 0, 0);
                    
                    $punchedInTime = Carbon::parse($ghours->punched_in);
                    $morning = Carbon::parse('08:05');
                    $morning2 = Carbon::parse('10:00');
                    $afternoon = Carbon::parse('13:05');
                    $afternoon2 = Carbon::parse('15:00');
                    
                    if ($punchedOutTime > $endTime) {
                        $totalDailySalary += $ghours->amount;

                        if ($is_overtime) {
                            $ot_end = $punchedOutTime->copy()->setTimeFromTimeString($is_overtime->end_time);

                            if ($punchedOutTime > $ot_end) {
                                $ot = $ot_end->diffInHours($endTime);
                            } else {
                                $ot = $punchedOutTime->diffInHours($endTime);
                            }

                            $overtimeHours += $ot;
                        }

                    
                        // Late calculation
                        if ($punchedInTime > $morning && $punchedInTime < $morning2) {
                            $late_start = Carbon::parse('08:00');
                            $totalminutesLate += $punchedInTime->diffInMinutes($late_start);
                        } elseif ($punchedInTime > $afternoon && $punchedInTime < $afternoon2) {
                            $late_start_a = Carbon::parse('13:00');
                            $totalminutesLate += $punchedInTime->diffInMinutes($late_start_a);
                        } else {
                            $totalminutesLate += 0;
                        }
                    } else {
                        // No overtime
                        //$totalActiveHours += intval($ghours->total_hours);
                    
                        if($ghours->amount == 'Not paid'){
                            $totalDailySalary += 0;
                        }else{
                            $totalDailySalary += $ghours->amount;
                        }
                        
                        // Late calculation
                        if ($punchedInTime > $morning && $punchedInTime < $morning2) {
                            $late_start = Carbon::parse('08:00');
                            $totalminutesLate += $punchedInTime->diffInMinutes($late_start);
                        } elseif ($punchedInTime > $afternoon && $punchedInTime < $afternoon2) {
                            $late_start_a = Carbon::parse('13:00');
                            $totalminutesLate += $punchedInTime->diffInMinutes($late_start_a);
                        } else {
                            $totalminutesLate += 0;
                        }
                    }
                }

                $overtimePay = $overtimeHours * ((((int)str_replace(',', '', $employee->salary) / 20) / 8) * 1.25);
                $origPaymentNoDeduc = $totalDailySalary + $paid_absent_holiday;

                $deduction = 0;
                $deduction_list = DeductionReal::where('employee_id','=',$employee->id)->where('expected_end_date', '>=', $endDate->subDay())->get();
                // if ($employee->id == 12){
                //     foreach($deduction_list as $d){
                //         dump($d->id, $endDate);
                //     }
                // }

                if($deduction_list){
                    foreach($deduction_list as $d){
                        $deduction += ($d->amount / 2);
                    }
                }
                

                $totalPayment = ($totalDailySalary + $paid_absent_holiday) - $deduction;
                $totalDeduction = 0;
                $netsalary = $origPaymentNoDeduc + round($overtimePay,2);
                $sss = 0; //35.50 trial expectation
                $philhealth = (($netsalary) * $ph_percent) ; //As of now based on the table, starting from 10k to 99k it the 5% of the salary should be contributed.
                $pagibig = (($netsalary) * $pg_percent) ;
                $halfSalary = ((int)str_replace(',', '', $employee->salary) / 2);

                $tax_income = 0;

                if($halfSalary > 10417 && $halfSalary < 16666){
                    $tax_income = ($halfSalary - 10417) * .15;
                }elseif($halfSalary > 16667 && $halfSalary < 33332){
                    $tax_income = (($halfSalary - 16667) * .20) + 937.50;
                }elseif($halfSalary > 33333 && $halfSalary < 83332){
                    $tax_income = (($halfSalary - 33333) * .25) + 4270.70;
                }elseif($halfSalary > 83333 && $halfSalary < 333332){
                    $tax_income = (($halfSalary - 83333) * .30) + 16770.70;
                }elseif($halfSalary >= 333333){
                    $tax_income = (($halfSalary - 333333) * .35) + 91770.70;
                };

                $sssRanges = SssTable::all(); 

                foreach ($sssRanges as $range) {
                    if ($employee->salary >= $range->min_amount && $employee->salary <= $range->max_amount) {
                        $sss = $range->employee_share / 2;
                        break; 
                    }
                }

                // foreach ($this->sssTable as $range) {
                //     if ($employee->salary >= $range['min'] && $employee->salary <= $range['max']) {
                //         $sss = $range['employee_share'] / 2; // Divide the contribution by 4 for weekly payment
                //     }
                // }
                //$netsalary = $totalPayment + $overtimePay;


                if($payslips->isNotEmpty()){
                    $newsss = 0;
                    $newpagibig = 0;
                    $newphilhealth = 0;

                    foreach($payslips as $payslip){
                        $newsss += $payslip->sss;
                        $newpagibig += $payslip->pagibig;
                        $newphilhealth += $payslip->philhealth;
                    }

                    if(($newsss - ($sss*2)) == 0 && ($newphilhealth - ($philhealth*2)) == 0 && ($newpagibig - ($pagibig*2)) == 0){
                        //$totalPayment -= ($philhealth + $pagibig + $totalminutesLate);
                        $totalPayment += $overtimePay;
                        Payslip::create([
                            'user_id' => $employee->id,
                            'payrun_id' => $payrun->id,
                            'payrun_period' => 'Semi-monthly',
                            'payrun_type' => 'Default',
                            'status' => 'Pending',
                            'total_salary' => round($totalPayment, 2),
                            'net_salary' => $netsalary,
                            'condition' => 'not sent',
                            'sss' => 0,
                            'pagibig' => 0,
                            'philhealth' => 0,
                            'tax_income' => $tax_income,
                            'month_range' => $monthRange
                        ]);

                        

                    }elseif(($newsss - ($sss*2)) == 0 && $newphilhealth - ($philhealth*2) == 0){
                        $totalPayment -= ($pagibig + $totalminutesLate + $tax_income);
                        $totalPayment += $overtimePay;
                        Payslip::create([
                            'user_id' => $employee->id,
                            'payrun_id' => $payrun->id,
                            'payrun_period' => 'Semi-monthly',
                            'payrun_type' => 'Default',
                            'status' => 'Pending',
                            'total_salary' => round($totalPayment, 2),
                            'net_salary' => $netsalary,
                            'condition' => 'not sent',
                            'sss' => 0,
                            'pagibig' => $pagibig,
                            'philhealth' => 0,
                            'tax_income' => $tax_income,
                            'month_range' => $monthRange
                        ]);

                        

                    }elseif(($newsss - ($sss*2)) == 0 && ($newpagibig - ($pagibig*2)) == 0){
                        $totalPayment -= ($philhealth + $totalminutesLate + $tax_income);
                        $totalPayment += $overtimePay;
                        Payslip::create([
                            'user_id' => $employee->id,
                            'payrun_id' => $payrun->id,
                            'payrun_period' => 'Semi-monthly',
                            'payrun_type' => 'Default',
                            'status' => 'Pending',
                            'total_salary' => round($totalPayment, 2),
                            'net_salary' => $netsalary,
                            'condition' => 'not sent',
                            'sss' => 0,
                            'pagibig' => 0,
                            'philhealth' => $philhealth,
                            'tax_income' => $tax_income,
                            'month_range' => $monthRange
                        ]);

                        

                    }elseif(($newphilhealth - ($philhealth*2)) == 0 && ($newpagibig - ($pagibig*2)) == 0){
                        $totalPayment -= ($sss + $totalminutesLate + $tax_income);
                        $totalPayment += $overtimePay;
                        Payslip::create([
                            'user_id' => $employee->id,
                            'payrun_id' => $payrun->id,
                            'payrun_period' => 'Semi-monthly',
                            'payrun_type' => 'Default',
                            'status' => 'Pending',
                            'total_salary' => round($totalPayment, 2),
                            'net_salary' => $netsalary,
                            'condition' => 'not sent',
                            'sss' => $sss,
                            'pagibig' => 0,
                            'philhealth' => 0,
                            'tax_income' => $tax_income,
                            'month_range' => $monthRange
                        ]);

                        

                    }elseif(($newphilhealth - ($philhealth*2)) == 0){
                        $totalPayment -= ($sss + $pagibig + $totalminutesLate + $tax_income);
                        $totalPayment += $overtimePay;
                        Payslip::create([
                            'user_id' => $employee->id,
                            'payrun_id' => $payrun->id,
                            'payrun_period' => 'Semi-monthly',
                            'payrun_type' => 'Default',
                            'status' => 'Pending',
                            'total_salary' => round($totalPayment, 2),
                            'net_salary' => $netsalary,
                            'condition' => 'not sent',
                            'sss' => $sss,
                            'pagibig' => $pagibig,
                            'philhealth' => 0,
                            'tax_income' => $tax_income,
                            'month_range' => $monthRange
                        ]);
                    }elseif(($newpagibig - ($pagibig*2)) == 0){
                        $totalPayment -= ($sss + $philhealth + $totalminutesLate + $tax_income);
                        $totalPayment += $overtimePay;
                        Payslip::create([
                            'user_id' => $employee->id,
                            'payrun_id' => $payrun->id,
                            'payrun_period' => 'Semi-monthly',
                            'payrun_type' => 'Default',
                            'status' => 'Pending',
                            'total_salary' => round($totalPayment, 2),
                            'net_salary' => $netsalary,
                            'condition' => 'not sent',
                            'sss' => $sss,
                            'pagibig' => 0,
                            'philhealth' => $philhealth,
                            'tax_income' => $tax_income,
                            'month_range' => $monthRange
                        ]);
                    }elseif(($newsss - ($sss*2)) == 0){
                        $totalPayment -= ($philhealth + $pagibig + $totalminutesLate + $tax_income);
                        $totalPayment += $overtimePay;
                        Payslip::create([
                            'user_id' => $employee->id,
                            'payrun_id' => $payrun->id,
                            'payrun_period' => 'Semi-monthly',
                            'payrun_type' => 'Default',
                            'status' => 'Pending',
                            'total_salary' => round($totalPayment, 2),
                            'net_salary' => $netsalary,
                            'condition' => 'not sent',
                            'sss' => 0,
                            'pagibig' => $pagibig,
                            'philhealth' => $philhealth,
                            'tax_income' => $tax_income,
                            'month_range' => $monthRange
                        ]);
                    }else{
                        $totalPayment -= ($sss + $philhealth + $pagibig + $totalminutesLate + $tax_income);
                        $totalPayment += $overtimePay;
                        Payslip::create([
                            'user_id' => $employee->id,
                            'payrun_id' => $payrun->id,
                            'payrun_period' => 'Semi-monthly',
                            'payrun_type' => 'Default',
                            'status' => 'Pending',
                            'total_salary' => round($totalPayment, 2),
                            'net_salary' => $netsalary,
                            'condition' => 'not sent',
                            'sss' => $sss,
                            'pagibig' => $pagibig,
                            'philhealth' => $philhealth,
                            'tax_income' => $tax_income,
                            'month_range' => $monthRange
                        ]);
                    }
                }
                else{
                    $totalPayment -= ($sss + $philhealth + $pagibig + $totalminutesLate + $tax_income);
                    $totalPayment += $overtimePay;
                    Payslip::create([
                        'user_id' => $employee->id,
                        'payrun_id' => $payrun->id,
                        'payrun_period' => 'Semi-monthly',
                        'payrun_type' => 'Default',
                        'status' => 'Pending',
                        'total_salary' => round($totalPayment, 2),
                        'net_salary' => $netsalary,
                        'condition' => 'not sent',
                        'sss' => $sss,
                        'pagibig' => $pagibig,
                        'philhealth' => $philhealth,
                        'tax_income' => $tax_income,
                        'month_range' => $monthRange
                    ]);
                }



                $lastAttendance = Attendance::where('user_id', '=', $employee->id)
                ->latest()
                ->first();

                if($lastAttendance){
                    $lastAttendance->status = 'received';
                    $lastAttendance->save();
                }

            }
        }

        return redirect()->route('hr_payrunview');
    }

    public function sendPayslip(Payrun $payrun)
    {
    // Retrieve employee payslips that have not been sent
    $employee_payslips = Payslip::where('payrun_id', $payrun->id)
        ->where('condition', '=', 'not sent')
        ->get();

    // Get the authenticated user
    $user = Auth::user();

    // Update the condition of each payslip to 'sent'
    foreach ($employee_payslips as $payslip) {
        $payslip->condition = 'sent';
        $payslip->save();
        // Use the Laravel logger instead of console.log
    }

    // Return the view with the updated payslips and user
    return redirect()->route('hr_adminpayslip', $payrun->id)->with('employee_payslips', 'user');
    }

    public function payslipsview(Payrun $payrun){
        $employee_payslips = Payslip::where('payrun_id', '=', $payrun->id)->get();
        $user = Auth::user();

        return view('payroll_officer.payroll.payslippayroll',compact('employee_payslips', 'user'));
    }

    public function searchpayslip(Request $request) {
        $searchTerm = $request->search;
    
        $employee_payslips = Payslip::whereHas('employee', function ($query) use ($searchTerm) {
            $query->where('name', 'like', '%' . $searchTerm . '%');
        })
        ->orderBy('created_at', 'desc')
        ->get();
    
        $user = Auth::user();
    
        return view('payroll_officer.payroll.searchpayslip', compact('employee_payslips', 'user'));
    }

    public function downloadpayslip($id)
    {
        $payslip = Payslip::find($id);
        
        $range = $payslip->month_range; 

        $parts = explode(' ', $range);

        $endDay = $parts[2];
        $month  = $parts[3];
        $year   = $parts[4];

        $endDate = Carbon::parse("$endDay $month $year");
        //dd($endDate);
        $deductions_sum = DeductionReal::where('employee_id',$payslip->employee->id)->where('expected_end_date', '>=', $endDate->subDay())->sum('amount') / 2;
        if($payslip->employee->payment_method == 'Weekly'){
            $data = [
                'name' => $payslip->employee->name,
                'period' => $payslip->month_range,
                'salary' => (int)str_replace(',', '', $payslip->employee->salary) / 4,
                'total_earning' => (int)str_replace(',', '', $payslip->employee->salary) / 4,
                'sss' => $payslip->sss,
                'pagibig' => $payslip->pagibig,
                'philhealth' => $payslip->philhealth,
                'tax_income' => $payslip->tax_income,
                'absences' => ((((int)str_replace(',', '', $payslip->employee->salary) / 4) - ($payslip->total_salary + $payslip->sss + $payslip->pagibig + $payslip->philhealth))) + ($payslip->sss + $payslip->pagibig + $payslip->philhealth) - ($payslip->sss + $payslip->pagibig + $payslip->philhealth),
                'total_deduction' => ((((int)str_replace(',', '', $payslip->employee->salary) / 4) - ($payslip->total_salary + $payslip->sss + $payslip->pagibig + $payslip->philhealth + $payslip->tax_income))) + ($payslip->sss + $payslip->pagibig + $payslip->philhealth + $payslip->tax_income),
                'net_salary' => ((int)str_replace(',', '', $payslip->employee->salary) / 4) - (((((int)str_replace(',', '', $payslip->employee->salary) / 4) - ($payslip->total_salary + $payslip->sss + $payslip->pagibig + $payslip->philhealth + $payslip->tax_income))) + ($payslip->sss + $payslip->pagibig + $payslip->philhealth + $payslip->tax_income)),
            ];
        
            $pdf = PDF::loadView('admin.download.payslip', $data);
        
            $pdf->setPaper('A4', 'portrait');
        }else{
            $data = [
                'name' => $payslip->employee->name,
                'period' => $payslip->month_range,
                'salary' => (int)str_replace(',', '', $payslip->employee->salary) / 2,
                'total_earning' => round($payslip->net_salary, 2),
                'sss' => $payslip->sss,
                'pagibig' => $payslip->pagibig,
                'philhealth' => round($payslip->philhealth,2),
                'tax_income' => $payslip->tax_income,
                'deductions' => DeductionReal::where('employee_id',$payslip->employee->id)->where('expected_end_date', '>=', $endDate)->get(),
                'absences' => max(0, ((((int)str_replace(',', '', $payslip->employee->salary) / 2) - ($payslip->total_salary + $payslip->sss + $payslip->pagibig + $payslip->philhealth + $payslip->tax_income))) + ($payslip->sss + $payslip->pagibig + $payslip->philhealth + $payslip->tax_income) - ($payslip->sss + $payslip->pagibig + $payslip->philhealth + $payslip->tax_income)),
                'total_deduction' => round(($payslip->sss + $payslip->pagibig + $payslip->philhealth + $payslip->tax_income + $deductions_sum),2),
                'net_salary' => ((int)str_replace(',', '', $payslip->employee->salary) / 2) - (((((int)str_replace(',', '', $payslip->employee->salary) / 2) - ($payslip->total_salary + $payslip->sss + $payslip->pagibig + $payslip->philhealth + $payslip->tax_income))) + ($payslip->sss + $payslip->pagibig + $payslip->philhealth + $payslip->tax_income)),
            ];
        
            $pdf = PDF::loadView('admin.download.payslip', $data);
        
            $pdf->setPaper('A4', 'portrait');
        }
    
        return $pdf->download('Payslip_'. $payslip->employee->name .'.pdf');
    }

    public function recalculate($id) {
        $payslip = Payslip::find($id);
        $user = Auth::user();
        if($payslip->employee->payment_method == 'Weekly'){
            $basicsalary = (int)str_replace(',', '', $payslip->employee->salary) / 4;
        }else{
            $basicsalary = (int)str_replace(',', '', $payslip->employee->salary) / 2;
        }

        return view('payroll_officer.payroll.recalculatepayslip', compact('payslip', 'user', 'basicsalary'));
    }

    public function saverecalculate($id, Request $request) {
        $user = Auth::user();
        $payslip = Payslip::find($id);
        $sss = 0;

        if ($request->has('remove_deductions') && $request->remove_deductions) {
            $payslip->total_salary = ($payslip->total_salary + $payslip->sss + $payslip->pagibig + $payslip->philhealth);
            $payslip->sss = 0;
            $payslip->pagibig = 0;
            $payslip->philhealth = 0;
            $payslip->save();
        }
        

        if($request->sss_option == 'fsss' && $request->pagibig_option == 'fpagibig' && $request->philhealth_option == 'fphilhealth'){
            foreach ($this->sssTable as $range) {
                if ($payslip->employee->salary >= $range['min'] && $payslip->employee->salary <= $range['max']) {
                    $sss = $range['employee_share']; // Divide the contribution by 4 for weekly payment
                }
            }

            $pagibig = ((int)str_replace(',', '', $payslip->employee->salary) * .02); 
            $philhealth = ((int)str_replace(',', '', $payslip->employee->salary) * .05);

            $payslip->total_salary = $payslip->net_salary - ($sss + $pagibig + $philhealth);
            $payslip->sss = $sss;
            $payslip->pagibig = $pagibig;
            $payslip->philhealth = $philhealth;
            $payslip->save();

            return redirect()->route('admin.payslips.index');

        }elseif($request->sss_option == 'fsss' && $request->pagibig_option == 'fpagibig'){
            foreach ($this->sssTable as $range) {
                if ($payslip->employee->salary >= $range['min'] && $payslip->employee->salary <= $range['max']) {
                    $sss = $range['employee_share']; // Divide the contribution by 4 for weekly payment
                }
            }

            $pagibig = ((int)str_replace(',', '', $payslip->employee->salary) * .02); 

            $payslip->total_salary = $payslip->net_salary - ($sss + $pagibig);
            $payslip->sss = $sss;
            $payslip->pagibig = $pagibig;
            $payslip->philhealth = 0;
            $payslip->save();

            return redirect()->route('admin.payslips.index');

        }elseif($request->sss_option == 'fsss' && $request->philhealth_option == 'fphilhealth'){
            foreach ($this->sssTable as $range) {
                if ($payslip->employee->salary >= $range['min'] && $payslip->employee->salary <= $range['max']) {
                    $sss = $range['employee_share']; // Divide the contribution by 4 for weekly payment
                }
            }

            $philhealth = ((int)str_replace(',', '', $payslip->employee->salary) * .05);

            $payslip->total_salary = $payslip->net_salary - ($sss + $philhealth);
            $payslip->sss = $sss;
            $payslip->pagibig = 0;
            $payslip->philhealth = $philhealth;
            $payslip->save();

            return redirect()->route('admin.payslips.index');

        }elseif($request->sss_option == 'fsss'){
            foreach ($this->sssTable as $range) {
                if ($payslip->employee->salary >= $range['min'] && $payslip->employee->salary <= $range['max']) {
                    $sss = $range['employee_share']; // Divide the contribution by 4 for weekly payment
                }
            }

            $payslip->total_salary = $payslip->net_salary - $sss;
            $payslip->sss = $sss;
            $payslip->pagibig = 0;
            $payslip->philhealth = 0;
            $payslip->save();
        }elseif($request->sss_option == 'hsss'){
            foreach ($this->sssTable as $range) {
                if ($payslip->employee->salary >= $range['min'] && $payslip->employee->salary <= $range['max']) {
                    $sss = $range['employee_share'] / 2; // Divide the contribution by 4 for weekly payment
                }
            }

            $payslip->total_salary = $payslip->net_salary - $sss;
            $payslip->sss = $sss;
            $payslip->pagibig = 0;
            $payslip->philhealth = 0;
            $payslip->save();
        }elseif($request->sss_option == 'frsss'){
            foreach ($this->sssTable as $range) {
                if ($payslip->employee->salary >= $range['min'] && $payslip->employee->salary <= $range['max']) {
                    $sss = $range['employee_share'] / 4; // Divide the contribution by 4 for weekly payment
                }
            }

            $payslip->total_salary = $payslip->net_salary - $sss;
            $payslip->sss = $sss;
            $payslip->pagibig = 0;
            $payslip->philhealth = 0;
            $payslip->save();
        }

        if($request->philhealth_option == 'fphilhealth' && $request->pagibig_option == 'fpagibig'){

            $philhealth = ((int)str_replace(',', '', $payslip->employee->salary) * .05);
            $pagibig = ((int)str_replace(',', '', $payslip->employee->salary) * .02); 

            $payslip->total_salary = $payslip->net_salary - ($pagibig + $philhealth);
            $payslip->sss = 0;
            $payslip->pagibig = $pagibig;
            $payslip->philhealth = $philhealth;
            $payslip->save();

            return redirect()->route('admin.payslips.index');

        }elseif($request->pagibig_option == 'fpagibig'){
            $pagibig = ((int)str_replace(',', '', $payslip->employee->salary) * .02); 
            $payslip->total_salary = $payslip->net_salary - $pagibig;
            $payslip->pagibig = $pagibig;
            $payslip->sss = 0;
            $payslip->philhealth = 0;
            $payslip->save();

        }elseif($request->pagibig_option == 'hpagibig'){
            $pagibig = round($payslip->net_salary*0.0088, 2); 
            $payslip->total_salary = $payslip->net_salary - $pagibig;
            $payslip->pagibig = $pagibig;
            $payslip->sss = 0;
            $payslip->philhealth = 0;
            $payslip->save();

        }elseif($request->pagibig_option == 'frpagibig'){
            $pagibig = round($payslip->net_salary*0.0044, 2); 
            $payslip->total_salary = $payslip->net_salary - $pagibig;
            $payslip->pagibig = $pagibig;
            $payslip->sss = 0;
            $payslip->philhealth = 0;
            $payslip->save();
        }

        if($request->philhealth_option == 'fphilhealth'){
            $philhealth = ((int)str_replace(',', '', $payslip->employee->salary) * .05);
            $payslip->total_salary = $payslip->net_salary - $philhealth;
            $payslip->philhealth = $philhealth;
            $payslip->sss = 0;
            $payslip->pagibig = 0;
            $payslip->save();

        }elseif($request->philhealth_option == 'hphilhealth'){
            $philhealth = ((int)str_replace(',', '', $payslip->employee->salary) * .05)/2;
            $payslip->total_salary = $payslip->net_salary - $philhealth;
            $payslip->philhealth = $philhealth;
            $payslip->sss = 0;
            $payslip->pagibig = 0;
            $payslip->save();

        }elseif($request->philhealth_option == 'frphilhealth'){
            $philhealth = ((int)str_replace(',', '', $payslip->employee->salary) * .05)/4;
            $payslip->total_salary = $payslip->net_salary - $philhealth;
            $payslip->philhealth = $philhealth;
            $payslip->sss = 0;
            $payslip->pagibig = 0;
            $payslip->save();

        }

        return redirect()->route('admin.payslips.index');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:dat,txt',
        ]);

        $file = $request->file('file');

        // Read lines from .dat file
        $lines = file($file->getPathname(), FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        $punchinmoring = null;
        $punchoutmoring = null;
        $punchinafternoon = null;
        $punchoutafternoon = null;

        $employee = null;
        $previousDate = null;
        $previousPunchTimeMorning = null;
        $previousPunchTimeAfternoon = null;
        $behavior = null;

        //$in_punchin_m = null;
        //$in_punchin_a = null;
        //$is_new_employee_line = null;
        foreach ($lines as $lineIndex => $line) {
            // Assume line format is like: "E025 2025-09-16 08:00:05"
            $parts = preg_split('/\s+/', trim($line)); // splits on spaces/tabs/etc.

            if (count($parts) < 3) {
                continue; // skip malformed lines
            }

            $employeeId = $parts[0];
            $datetimeStr = $parts[1] . ' ' . $parts[2];

            try {
                $Time = Carbon::parse($datetimeStr);
            } catch (\Exception $e) {
                continue; // skip bad datetime
            }

            $currentDate = $Time->format('Y-m-d');

            if ($previousDate && $previousDate != $currentDate) {
                $punchinmoring = null;
                $punchoutmoring = null;
                $punchinafternoon = null;
                $punchoutafternoon = null;
                $previousPunchTimeMorning = null;
                $previousPunchTimeAfternoon = null;
            }

            $previousDate = $currentDate;

            $currentEmployee = User::where('employee_id', $employeeId)->first(); // assuming 'employee_id' is used in DB

            if (!$currentEmployee) {
                $punchinmoring = null;
                $punchoutmoring = null;
                $punchinafternoon = null;
                $punchoutafternoon = null;
                continue; // skip unknown employees
            }

            if ($employee && $employee->id !== $currentEmployee->id) {
                $punchinmoring = null;
                $punchoutmoring = null;
                $punchinafternoon = null;
                $punchoutafternoon = null;
                $previousPunchTimeMorning = null;
                $previousPunchTimeAfternoon = null;
            }

            $employee = $currentEmployee;

            // ----- Time range logic stays same -----
            $morning = Carbon::parse('07:00');
            $morning2 = Carbon::parse('09:00');
            $morning3 = Carbon::parse('11:00');
            $morning4 = Carbon::parse('12:30');

            $afternoon = Carbon::parse('12:30');
            $afternoon2 = Carbon::parse('13:30');
            $afternoon3 = Carbon::parse('16:00');
            $afternoon4 = Carbon::parse('17:50');

            // Validate and assign punch-in and punch-out times based on defined ranges for morning
            if ($Time->format('H:i') >= $morning->format('H:i') && $Time->format('H:i') < $morning2->format('H:i')) {
                // Check if it's within 10 minutes of the previous punch-in time for the morning
                if (!$previousPunchTimeMorning || $Time->diffInMinutes($previousPunchTimeMorning) > 10) {
                    $punchinmoring = $Time;  // Set punch-in time if it's in the morning range and 10 minutes apart

                    if ($Time->format('H:i') >= $morning->format('H:i') && $Time->format('H:i') < '08:00'){
                        $now = Carbon::parse($Time);
                        $targetTime = $now->copy()->setTimeFromTimeString('08:00');  
                        $diffInMinutes = $targetTime->diffInMinutes($now, false); // signed difference in minutes
                        $minutes = abs($diffInMinutes);

                        if ($minutes >= 60) {
                            $hours = floor($minutes / 60);
                            $behavior = $hours . ' hour' . ($hours > 1 ? 's' : '') . ' early';
                        } else {
                            $behavior = $minutes . ' minutes early';
                        }

                        //$behavior = 'Early';
                    }
                    elseif($Time->format('H:i') >= '08:00' && $Time->format('H:i') <= '08:05'){
                        $behavior = 'On time';
                    }
                    elseif($Time->format('H:i') > '08:05' && $Time->format('H:i') < '11:30'){
                        $now = Carbon::parse($Time);
                        $targetTime = $now->copy()->setTimeFromTimeString('08:00');  
                        $diffInMinutes = $targetTime->diffInMinutes($now, false); // signed difference in minutes
                        $minutes = abs($diffInMinutes);

                        if ($minutes >= 60) {
                            $hours = floor($minutes / 60);
                            $behavior = $hours . ' hour' . ($hours > 1 ? 's' : '') . ' late';
                        } else {
                            $behavior = $minutes . ' minutes late';
                        }
                        //$behavior = 'Late';
                    }
                }
            } elseif ($Time->format('H:i') >= $morning3->format('H:i') && $Time->format('H:i') < $morning4->format('H:i')) {
                // Check if it's within 10 minutes of the previous punch-out time for the morning
                if (!$previousPunchTimeMorning || $Time->diffInMinutes($previousPunchTimeMorning) > 10) {
                    $punchoutmoring = $Time; // Set punch-out time if it's in the morning range and 10 minutes apart
                }
            }
    
            // Validate and assign punch-in and punch-out times based on defined ranges for afternoon
            if ($Time->format('H:i') >= $afternoon->format('H:i') && $Time->format('H:i') < $afternoon2->format('H:i')) {
                // Check if it's within 10 minutes of the previous punch-in time for the afternoon
                if (!$previousPunchTimeAfternoon || $Time->diffInMinutes($previousPunchTimeAfternoon) > 10) {
                    $punchinafternoon = $Time;  // Set punch-in time if it's in the afternoon range and 10 minutes apart

                    if ($Time->format('H:i') >= $afternoon->format('H:i') && $Time->format('H:i') < '13:00'){
                        $now = Carbon::parse($Time);
                        $targetTime = $now->copy()->setTimeFromTimeString('13:00');  
                        $diffInMinutes = $targetTime->diffInMinutes($now, false); // signed difference in minutes
                        $minutes = abs($diffInMinutes);

                        if ($minutes >= 60) {
                            $hours = floor($minutes / 60);
                            $behavior = $hours . ' hour' . ($hours > 1 ? 's' : '') . ' early';
                        } else {
                            $behavior = $minutes . ' minutes early';
                        }
                        //$behavior = 'Early';
                    }
                    elseif($Time->format('H:i') >= '13:00' && $Time->format('H:i') <= '13:05'){
                        $behavior = 'On time';
                    }
                    elseif($Time->format('H:i') > '13:05' && $Time->format('H:i') < '15:30'){
                        $now = Carbon::parse($Time);
                        $targetTime = $now->copy()->setTimeFromTimeString('13:00');  
                        $diffInMinutes = $targetTime->diffInMinutes($now, false); // signed difference in minutes
                        $minutes = abs($diffInMinutes);

                        if ($minutes >= 60) {
                            $hours = floor($minutes / 60);
                            $behavior = $hours . ' hour' . ($hours > 1 ? 's' : '') . ' late';
                        } else {
                            $behavior = $minutes . ' minutes late';
                        }

                        //$behavior = 'Late';
                    }
                }
            } elseif ($Time->format('H:i') >= $afternoon3->format('H:i') && $Time->format('H:i') < $afternoon4->format('H:i')) {
                // Check if it's within 10 minutes of the previous punch-out time for the afternoon
                if (!$previousPunchTimeAfternoon || $Time->diffInMinutes($previousPunchTimeAfternoon) > 10) {
                    $punchoutafternoon = $Time; // Set punch-out time if it's in the afternoon range and 10 minutes apart
                }
            }
    
            // Save the attendance data for morning
            if ($punchinmoring || $punchoutmoring) {

                if($punchinmoring){
                    $existingMorningAttendance = Attendance::where('user_id', $employee->id)
                        ->where('date', $punchinmoring->format('Y-m-d'))
                        ->where('punched_in', $punchinmoring)
                        ->first();

                    if ($existingMorningAttendance) {
                        // Delete the existing records if a duplicate is found
                        $existingMorningAttendance->update([
                            'punched_in' => $punchinmoring,
                            'behavior' => $behavior,
                        ]);
                    }else{
                        //$total_hours = Carbon::parse($punchinmoring)->diffInHours($punchoutmoring);
                        // Create a new Attendance record for morning
                        Attendance::create([
                            'user_id' => $employee->id,
                            'date' => $punchinmoring->format('Y-m-d'),
                            'punched_in' => $punchinmoring,
                            'punched_out' => '',
                            'behavior' => $behavior,
                            'type' => 'imported',
                            'total_hours' => 0,
                            'entry' => 'imported',
                            'status' => '',
                            'amount' => 0,
                        ]);
                    }

                    //$in_punchin_m = 'Yah';
                    
                }elseif($punchoutmoring){
                    $existingMorningAttendance = Attendance::where('user_id', $employee->id)
                        ->where('date', $punchoutmoring->format('Y-m-d'))
                        ->first();
                    

                    if($existingMorningAttendance){
                        $total_hours = Carbon::parse($existingMorningAttendance->punched_in)->diffInHours($punchoutmoring);
                        // Create a new Attendance record for morning
                        $amount = round(((int)str_replace(',', '', $employee->salary) / 20) / 2, 2);
                        $holiday = HolidayPaymentIncrease::whereDate('date',$existingMorningAttendance->date)->first();

                        if($holiday){
                            $amount = $amount * $holiday->multiplier;
                        };

                        $existingMorningAttendance->update([
                            'punched_out' => $punchoutmoring,
                            'type' => 'imported',
                            'total_hours' => $total_hours,
                            'entry' => 'imported',
                            'status' => '',
                            'amount' => $amount,
                        ]);
                    }

                    //$in_punchin_m = 'Nahh';
                }
    
                // if ($existingMorningAttendance) {
                //     // Delete the existing records if a duplicate is found
                //     $existingMorningAttendance->delete();
                // }
                
            }
    
            // Save the attendance data for afternoon
            if ($punchinafternoon || $punchoutafternoon) {

                if ($punchinafternoon) {
                    $existingAfternoonAttendance = Attendance::where('user_id', $employee->id)
                        ->where('date', $punchinafternoon->format('Y-m-d'))
                        ->where('punched_in', $punchinafternoon)
                        ->first();

                    if ($existingAfternoonAttendance) {
                        // Update punch-in time and behavior
                        $existingAfternoonAttendance->update([
                            'punched_in' => $punchinafternoon,
                            'behavior' => $behavior,
                        ]);
                    } else {
                        // Create new entry with only punch-in
                        Attendance::create([
                            'user_id' => $employee->id,
                            'date' => $punchinafternoon->format('Y-m-d'),
                            'punched_in' => $punchinafternoon,
                            'punched_out' => '',
                            'behavior' => $behavior,
                            'type' => 'imported',
                            'total_hours' => 0,
                            'entry' => 'imported',
                            'status' => '',
                            'amount' => 0,
                        ]);
                    }
                    //$in_punchin_a = 'A Yahh';
                } elseif ($punchoutafternoon) {
                    $existingAfternoonAttendance = Attendance::where('user_id', $employee->id)
                        ->where('date', $punchoutafternoon->format('Y-m-d'))
                        ->orderBy('punched_in', 'desc')
                        ->first();

                    if ($existingAfternoonAttendance && $existingAfternoonAttendance->punched_in) {
                        $total_hours = Carbon::parse($existingAfternoonAttendance->punched_in)->diffInHours($punchoutafternoon);

                        $amount = round(((int)str_replace(',', '', $employee->salary) / 20) / 2, 2);
                        $holiday = HolidayPaymentIncrease::whereDate('date',$existingAfternoonAttendance->date)->first();

                        if($holiday){
                            $amount = $amount * $holiday->multiplier;
                        };

                        $existingAfternoonAttendance->update([
                            'punched_out' => $punchoutafternoon,
                            'type' => 'imported',
                            'total_hours' => $total_hours,
                            'entry' => 'imported',
                            'status' => '',
                            'amount' => $amount,
                        ]);
                    }
                    //$in_punchin_a = 'A Nahh';
                }
            }
    
            // Update the previous punch-in/out times for future comparisons
            $previousPunchTimeMorning = $punchoutmoring ?? $punchinmoring;
            $previousPunchTimeAfternoon = $punchoutafternoon ?? $punchinafternoon;

            //dump("Line {$lineIndex}", $parts, $punchinmoring, $punchoutmoring, $in_punchin_m, $punchinafternoon, $punchoutafternoon, $in_punchin_a);
        }

        return redirect('/payroll-officer/all-employee-attendance')->with('success', 'Attendance imported successfully!');
    }

    public function approveundertime(Undertime $undertime) {
        if ($undertime) {

            $undertime->status = 'Approved';
            $undertime->approved_by = Auth::user()->id;
            $undertime->save();
        }
        
        return redirect()->back();
    }

    public function disapproveundertime(Undertime $undertime){
        if ($undertime) {
            $undertime->status = 'Disapproved';
            $undertime->approved_by = Auth::user()->id;
            $undertime->save();  
        }
        
        return redirect()->back();
    }

    public function approveovertime(Overtime $overtime) {
        if ($overtime) {

            $overtime->status = 'Approved';
            $overtime->approved_by = Auth::user()->id;
            $overtime->save();
        }
        
        return redirect()->back();
    }

    public function disapproveovertime(Overtime $overtime){
        if ($overtime) {
            $overtime->status = 'Disapproved';
            $overtime->approved_by = Auth::user()->id;
            $overtime->save();  
        }
        
        return redirect()->back();
    }

    public function leaveallowance(){
        $user = Auth::user();

        $sss = 0; //35.50 trial expectation
        $philhealth = ((int)str_replace(',', '', $user->salary) * .05); //As of now based on the table, starting from 10k to 99k it the 5% of the salary should be contributed.
        $pagibig = ((int)str_replace(',', '', $user->salary) * .02); //13.67

        foreach ($this->sssTable as $range) {
            if ($user->salary >= $range['min'] && $user->salary <= $range['max']) {
                $sss = $range['employee_share']; // Divide the contribution by 4 for weekly payment
            }
        }

        return view('payroll_officer.jobdesk.leaveallowance',compact('user', 'sss', 'pagibig', 'philhealth'));
    }

    public function attendance_filter(Request $request)
    {
        $user = Auth::user();

        $getAttendance = Attendance::where('user_id', '=', $user->id)
        ->whereYear('punched_in', '=', \Carbon\Carbon::parse($request->search_month_attendance)->year)
        ->whereMonth('punched_in', '=', \Carbon\Carbon::parse($request->search_month_attendance)->month)
        ->get();

        $monthSearch = $request->search_month_attendance;
    
        $totalActiveHours = 0;
        foreach ($getAttendance as $ghours) {
            $totalActiveHours += intval($ghours->total_hours);
        }

        $groupedByDate = $getAttendance->groupBy(function ($item) {
            return $item->created_at->toDateString(); // e.g. "2025-10-10"
        });

        // Mark duplicates
        foreach ($groupedByDate as $date => $items) {
            if ($items->count() > 1) {
                foreach ($items as $attendance) {
                    $attendance->is_duplicate = true;
                }
            } else {
                $items->first()->is_duplicate = false;
            }
        }
        
        return view('payroll_officer.jobdesk.attendance', compact('getAttendance', 'user', 'totalActiveHours', 'monthSearch'));
    
    }

    public function change_details(Request $request)
    {
        // Custom messages
        $messages = [
            'name.required' => 'The name field is required.',
            'email.required' => 'The email field is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'This email address is already taken.',
            'password.min' => 'The password should be at least 8 characters long.',
            'profile_image.image' => 'The uploaded file must be an image.',
            'profile_image.max' => 'The profile image must not be larger than 2MB.'
        ];
        //dd($request->profile_image);
        // Validate
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . Auth::id(),
            'password' => 'nullable|min:8',
            'confirm_password' => 'nullable|same:password',
            //'profile_image' => 'nullable|mimes:jpeg,png,jpg,webp,gif,bmp,svg,tiff|max:4096',
        ], $messages);

        $user = Auth::user();

        // Update text fields
        $user->name = $validated['name'];
        $user->email = $validated['email'];

        // Update password if provided
        if ($request->filled('password') && $request->password === $request->confirm_password) {
            $user->password = Hash::make($validated['password']);
        }

        // Handle profile image upload
        if ($request->hasFile('profile_image') && $request->file('profile_image')->isValid()) {
            $file = $request->file('profile_image');
            $filename = time() . '_' . $file->getClientOriginalName();

            // Delete old image if exists
            if ($user->profile_img && file_exists(public_path('profiles/' . $user->profile_img))) {
                unlink(public_path('profiles/' . $user->profile_img));
            }

            // Move new image to public/profiles
            $file->move(public_path('profiles'), $filename);

            // Update user record
            $user->profile_img = $filename;
        }


        $user->save();

        return redirect()->back()->with('success', 'Your details have been updated successfully!');
    }

    public function month_export(Request $request)
    {
        // month will be like "2025-09"
        $month = $request->query('month', Carbon::now()->format('Y-m'));

        // Build start and end of that month
        $start = Carbon::createFromFormat('Y-m', $month)->startOfMonth();
        $end   = Carbon::createFromFormat('Y-m', $month)->endOfMonth();

        $attendances = Attendance::where('user_id', Auth::id())
            ->whereBetween('date', [$start, $end])
            ->get(['user_id', 'punched_in', 'punched_out']);

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'Employee ID');
        $sheet->setCellValue('B1', 'Punched In');
        $sheet->setCellValue('C1', 'Punched Out');

        $row = 2;
        foreach ($attendances as $a) {
            $sheet->setCellValue('A' . $row, $a->user_id);
            $sheet->setCellValue('B' . $row, $a->punched_in);
            $sheet->setCellValue('C' . $row, $a->punched_out);
            $row++;
        }

        $fileName = "attendance_{$month}.xlsx";

        return response()->streamDownload(function () use ($spreadsheet) {
            $writer = new Xlsx($spreadsheet);
            $writer->save('php://output');
        }, $fileName, [
            'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
        ]);
    }

    public function print_dtr(Request $request)
    {
        $month = $request->query('month', Carbon::now()->format('Y-m'));

        $monthCarbon = Carbon::createFromFormat('Y-m', $month);

        $monthName = $monthCarbon->monthName;

        $start = Carbon::createFromFormat('Y-m', $month)->startOfMonth();
        $end   = Carbon::createFromFormat('Y-m', $month)->endOfMonth();

        $today = Carbon::now();
        $today_day = $today->day;

        $is_current_month = $today->format('Y-m') === $month;

        if ($is_current_month) {
            if ($today_day <= 27) {
                $rangeStart = Carbon::parse($month . '-01');
                $rangeEnd   = Carbon::parse($month . '-15');
            } else {
                $rangeStart = $start;
                $rangeEnd   = $end;
            }
        } else {
            $rangeStart = $start;
            $rangeEnd   = $end;
        }

        //dd($rangeStart,$rangeEnd);
        $attendances = Attendance::where('user_id', Auth::id())
            ->whereBetween('date', [$rangeStart, $rangeEnd])
            ->get(['user_id', 'punched_in', 'punched_out', 'date','behavior']);

        //dd($attendances);
        $days_present = 0;
        $days_absent  = 0;
        $total_hours = 0;

        // $today = Carbon::now();
        // $today_day = $today->day;

        // $is_current_month = $today->format('Y-m') === $month;

        // if ($is_current_month) {
        //     if ($today_day <= 25) {
        //         $current_range = Carbon::parse($month.'-01')->to(Carbon::parse($month.'-25'));
        //     } 
        //     else {
        //         $current_range = Carbon::parse($month.'-01')->to($end);
        //     }
        // } 
        // else {
        //     $current_range = Carbon::parse($month.'-01')->to($end);
        // }

        $dates = [];
        for ($date = $rangeStart; $date->lte($rangeEnd); $date->addDay()) {
            $dates[] = $date->copy();
        }

        foreach ($dates as $date) {
            if ($date->isWeekday()) {
                $attendance_for_day = $attendances->where('date', $date->format('Y-m-d'))->first();

                if ($attendance_for_day) {
                    $days_present++;
                } else {
                    $days_absent++;
                }
            }
        }

        $minutes_late = 0;
        foreach ($attendances as $a) {
            $punched_in = Carbon::parse($a->punched_in);
            $punched_out = Carbon::parse($a->punched_out);

            $morning_start = Carbon::parse($a->date . ' 08:00:00');
            $morning_end = Carbon::parse($a->date . ' 12:00:00');

            $afternoon_start = Carbon::parse($a->date . ' 13:00:00');
            $afternoon_end = Carbon::parse($a->date . ' 17:00:00');

            $morning_hours = 0;
            $afternoon_hours = 0;

            if ($punched_in <= $morning_end && $punched_out >= $morning_start) {
                $start = max($punched_in, $morning_start);
                $end = min($punched_out, $morning_end);

                if ($start < $end) {
                    $morning_hours = $start->diffInMinutes($end) / 60;
                }
            }

            if ($punched_in <= $afternoon_end && $punched_out >= $afternoon_start) {
                $start = max($punched_in, $afternoon_start);
                $end = min($punched_out, $afternoon_end);

                if ($start < $end) {
                    $afternoon_hours = $start->diffInMinutes($end) / 60;
                }
            }

            $total_hours += $morning_hours + $afternoon_hours;
            
            $behavior = $a->behavior;
            //dd($behavior);
            if (preg_match('/(\d+)\s?(minute|minutes)\s?late/i', $behavior, $matches)) {
                $minutes_late += (int)$matches[1]; // Add minutes
            } elseif (preg_match('/(\d+)\s?(hour|hours)\s?late/i', $behavior, $matches)) {
                $minutes_late += (int)$matches[1] * 60; // Convert hours to minutes
            }
        }

        $data = [
            'month_name' => $monthName,
            'name' => Auth::user()->name,
            'attendances' => $attendances,
            'minutes_late' => $minutes_late,
            'days_present' => $days_present,
            'days_absent' => $days_absent,
            'total_hours' => round($total_hours,0) ?? 0 // You may need to calculate total hours
        ];

        $pdf = PDF::loadView('admin.download.dtr_summary', $data);
        $pdf->setPaper('A4', 'landscape');

        return $pdf->download('Attendance_Summary_' . Auth::user()->name . '.pdf');
    }

    public function leaver(Request $request){
        date_default_timezone_set('Asia/Manila');

        $user = Auth::user();

        $totalLeaves = Leave::where('user_id', '=', $user->id)->where('status', '=', 'Approved')
        ->whereYear('updated_at', '=', Carbon::now()->year)
        ->get();

        $employee = User::findOrFail($user->id);

        $paid_leave_count = 0;

        foreach ($totalLeaves as $leave) {
            if (Str::contains($leave->leave_type, 'Paid')) {
                $paid_leave_count += 1;
            }
        }

        if ($paid_leave_count >= $employee->leave_count){
            if ($employee->update_leave_count == null || $employee->update_leave_count->year != Carbon::now()->year ){
                $employee->leave_count += 1;
                $employee->update_leave_count = Carbon::now();
                $employee->save();
            }
        }

        $startDate = Carbon::parse($request->start_date);
        $endDate = Carbon::parse($request->end_date);

        $duration = $startDate->diffInDays($endDate);

        $duration = abs($duration) + 1;

        $count = 0;

        if ($employee->update_leave_count == null || $employee->update_leave_count->year != Carbon::now()->year ){
            $count = $employee->leave_count - 1;
        }else{
            $count = $employee->leave_count - 2;
        }

        if($totalLeaves->count() <= $count){
            if ($request->leave_type == 'Leave'){
                if ($request->is_paid && !($paid_leave_count >= $count)){
                    $ftype = "Paid {$request->leave_specific}";
                    Leave::create([
                        'user_id' => $request->employee,
                        'leave_type' => $ftype,
                        'start_date' => $request->start_date,
                        'end_date' => $request->end_date,
                        'status' => 'Pending',
                        'activity' => $request->reason,
                        'duration' => $duration,
                    ]);
                }else{
                    Leave::create([
                        'user_id' => $request->employee,
                        'leave_type' => $request->leave_specific,
                        'start_date' => $request->start_date,
                        'end_date' => $request->end_date,
                        'status' => 'Pending',
                        'activity' => $request->reason,
                        'duration' => $duration,
                    ]);
                }
            } elseif($request->leave_type == 'Overtime'){

                if ($request->is_paid && !($paid_leave_count >= $count)){
                    $ftype = "Paid {$request->leave_type}: {$request->hours_rendered} hrs";
                    Leave::create([
                        'user_id' => $request->employee,
                        'leave_type' => $ftype,
                        'start_date' => $request->start_date,
                        'end_date' => $request->end_date,
                        'status' => 'Pending',
                        'activity' => $request->reason,
                        'duration' => $duration,
                    ]);
                }else{
                    $ftype = "{$request->leave_type}: {$request->hours_rendered} hrs";
                    Leave::create([
                        'user_id' => $request->employee,
                        'leave_type' => $ftype,
                        'start_date' => $request->start_date,
                        'end_date' => $request->end_date,
                        'status' => 'Pending',
                        'activity' => $request->reason,
                        'duration' => $duration,
                    ]);
                }
            }elseif($request->leave_type == 'Undertime'){

                if ($request->is_paid && !($paid_leave_count >= $count)){
                    $ftype = "Paid {$request->leave_type}: {$request->undertime_hours_rendered} hrs";
                    Leave::create([
                        'user_id' => $request->employee,
                        'leave_type' => $ftype,
                        'start_date' => $request->start_date,
                        'end_date' => $request->end_date,
                        'status' => 'Pending',
                        'activity' => $request->reason,
                        'duration' => $duration,
                    ]);
                }else{
                    $ftype = "{$request->leave_type}: {$request->undertime_hours_rendered} hrs";
                    Leave::create([
                        'user_id' => $request->employee,
                        'leave_type' => $ftype,
                        'start_date' => $request->start_date,
                        'end_date' => $request->end_date,
                        'status' => 'Pending',
                        'activity' => $request->reason,
                        'duration' => $duration,
                    ]);
                }
            }
            else{
                Leave::create([
                    'user_id' => $request->employee,
                    'leave_type' => $request->leave_type,
                    'start_date' => $request->start_date,
                    'end_date' => $request->end_date,
                    'status' => 'Pending',
                    'activity' => $request->reason,
                    'duration' => $duration,
                ]);
            }
        }else{
            return redirect()->back()->with('message', 'Employee have reached the maximum number of leaves for this Year ' .$paid_leave_count);
        }

        return redirect()->back();//->with('message', 'Request Successfully sent' .$request->is_paid .$paid_leave_count);
    }

    public function edit_contribution(Request $request)
    {
        $cont = ContributionSetting::findOrFail($request->cont_id);
        $name = $request->edit_contname;
        $perc = $request->edit_contperc;

        $cont->name = $name;
        $cont->number_of_percent = $perc;
        $cont->save();

        return redirect()->back()->with('success', $cont->name .' have been updated successfully!');
    }

    public function add_sssrange(Request $request)
    {
        $min = $request->sss_min;
        $max = $request->sss_max;
        $empr = $request->sss_empr;
        $emp = $request->sss_emp;

        SssTable::create([
            'min_amount'=> $min,
            'max_amount'=> $max,
            'employer_share' => $empr,
            'employee_share' => $emp
        ]);

        return redirect()->back()->with('success', 'Salary range have been added to SSS table successfully!');
    }

    public function edit_sssrange(Request $request)
    {
        $sss = SssTable::findOrFail($request->esss_id);
        $min = $request->esss_min;
        $max = $request->esss_max;
        $empr = $request->esss_empr;
        $emp = $request->esss_emp;

        $sss->min_amount = $min;
        $sss->max_amount = $max;
        $sss->employer_share = $empr;
        $sss->employee_share = $emp;
        $sss->save();

        return redirect()->back()->with('success', 'Salary range have been updated successfully!');
    }

    public function delete_sssrange(Request $request, $sss_id)
    {
        // Retrieve employee payslips that have not been sent
        $sss = SssTable::findOrFail($sss_id);

        $sss->delete();

        return redirect()->back()->with('success', 'Salary range have been deleted successfully!');
    }

    public function add_holiday(Request $request)
    {
        $name = $request->hol_name;
        $type = $request->hol_type;
        $multiplier = $request->hol_mult;
        $date = $request->hol_date;

        HolidayPaymentIncrease::create([
            'name'=> $name,
            'type'=> $type,
            'multiplier' => $multiplier,
            'date' => $date
        ]);

        return redirect()->back()->with('success', 'Holiday have been added successfully!');
    }

    public function edit_holiday(Request $request)
    {
        $holiday = HolidayPaymentIncrease::findOrFail($request->hol_id);
        $name = $request->ehol_name;
        $type = $request->ehol_type;
        $multiplier = $request->ehol_mult;
        $date = $request->ehol_date;

        $holiday->name = $name;
        $holiday->type = $type;
        $holiday->multiplier = $multiplier;
        $holiday->date = $date;
        $holiday->save();

        return redirect()->back()->with('success', 'Holiday have been updated successfully!');
    }

    public function delete_holiday(Request $request, $holiday_id)
    {
        // Retrieve employee payslips that have not been sent
        $holiday = HolidayPaymentIncrease::findOrFail($holiday_id);

        $holiday->delete();

        return redirect()->back()->with('success', 'Holiday have been deleted successfully!');
    }

    public function filterEmployeeSearchUpdate(Request $request)
    {
        $user = Auth::user();
        $name = $request->employee_search;
        
        // Perform the search based on the query
        $employees = User::where('name','like',"%{$name}%")
        ->orderBy("employment_id", 'asc')
        ->get();

        $emp_stat = EmploymentStatus::all();

        // Return the data as a JSON response
        return view("payroll_officer.employees.deductions",compact('employees', 'user','emp_stat'));
        
    }

    public function add_deduction(Request $request)
    {
        $id = $request->employee_id;
        $name = $request->ded_name;
        $amount = $request->ded_amount;
        $ded_date = $request->ded_date;

        DeductionReal::create([
            'employee_id'=> $id,
            'deduction_name'=>$name,
            'amount'=>$amount,
            'expected_end_date' => $ded_date

        ]);

        return redirect()->back()->with('success', 'Deduction have been added successfully!');
    }

    public function delete_deduction(Request $request, $deduction_id)
    {
        // Retrieve employee payslips that have not been sent
        $deduction = DeductionReal::findOrFail($deduction_id);

        $deduction->delete();

        return redirect()->back()->with('success', 'Deduction have been deleted successfully!');
    }
}
