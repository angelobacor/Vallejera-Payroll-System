<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\Payrun;
use App\Models\Payslip;
use App\Models\User;
use App\Models\Leave;
use App\Models\Document;
use App\Models\Department;
use App\Models\HolidayPaymentIncrease;
use App\Models\Overtime;
use App\Models\Undertime;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use PDF;
use App\Models\Shift;
use App\Models\Designation;
use App\Models\EmploymentStatus;
use App\Models\Deduction;
use App\Models\DeductionReal;

class ItAdminController extends Controller
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

        return view('it_admin.home', compact('user', 'mattendance', 'aattendance', 'leaves_count', 'leaveavailable'));
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

    public function employeedetails($id) {
        $employee = User::findOrFail($id);
    
        $user = Auth::user();
        return view('it_admin.employees.employeedetails', compact('employee', 'user'));
    }

    public function employeeleaveallowance($id) {
        $employee = User::findOrFail($id);
    
        $user = Auth::user();
        return view('it_admin.employees.details.employeeleaveallowance', compact('employee', 'user'));
    }

    public function employeeattendance($id) {
        $employee = User::findOrFail($id);
        $getAttendance = Attendance::where('user_id', '=', $id)->whereDate('punched_in', '>=', Carbon::now()->startOfMonth()->setTimezone('Asia/Manila'))
        ->where('punched_in', '<=', Carbon::now()->endOfMonth()->setTimezone('Asia/Manila'))->get();

        $totalActiveHours = 0;
        foreach ($getAttendance as $ghours) {
            $totalActiveHours += intval($ghours->total_hours);
        }
        $user = Auth::user();

        $monthSearch = 'false';
        return view('it_admin.employees.details.employeeattendance', compact('employee', 'user', 'getAttendance', 'totalActiveHours', 'monthSearch'));
    }

    public function employeeattendance_filter($id, Request $request) {
        $employee = User::findOrFail($id);
        $getAttendance = Attendance::where('user_id', '=', $employee->id)
        ->whereYear('punched_in', '=', \Carbon\Carbon::parse($request->search_month_attendance)->year)
        ->whereMonth('punched_in', '=', \Carbon\Carbon::parse($request->search_month_attendance)->month)
        ->get();

        $totalActiveHours = 0;
        foreach ($getAttendance as $ghours) {
            $totalActiveHours += intval($ghours->total_hours);
        }

        $monthSearch = $request->search_month_attendance;
        $user = Auth::user();

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
        return view('it_admin.employees.details.employeeattendance', compact('employee', 'user', 'getAttendance', 'totalActiveHours', 'monthSearch'));
    }

    public function employeeleave($id) {
        $employee = User::findOrFail($id);
        $leaves = Leave::where('user_id', '=', $id)->get();

        $user = Auth::user();
        return view('it_admin.employees.details.employeeleave', compact('employee', 'user', 'leaves'));
    }

    public function employeedocuments($id) {
        $employee = User::findOrFail($id);
        $user = Auth::user();
        $documents = Document::where('user_id', '=', Auth::user()->id)->get();
    
        return view('it_admin.employees.details.employeedocuments', compact('user', 'documents', 'employee'));
    }

    public function employeeassets($id) {
        $employee = User::findOrFail($id);
        $user = Auth::user();
        $documents = Document::where('user_id', '=', Auth::user()->id)->get();
    
        return view('it_admin.employees.details.employeeassets', compact('user', 'documents', 'employee'));
    }

    public function employeejobhistory($id) {
        $employee = User::findOrFail($id);
        $user = Auth::user();
        $departments = Department::all();
        $shifts = Shift::all();
        $designations = Designation::all();
        $estatus = EmploymentStatus::all();
    
        return view('it_admin.employees.details.employeejobhistory', compact('user', 'employee', 'departments', 'shifts', 'designations', 'estatus'));
    }

    public function employeesalaryoverview($id) {
        $employee = User::findOrFail($id);
        $user = Auth::user();
    
        return view('it_admin.employees.details.employeesalaryoverview', compact('user', 'employee'));
    }

    public function employeepayslip($id) {
        $user = Auth::user();
        $employee = User::findOrFail($id);
        $payslip = Payslip::where('user_id', '=', $employee->id)->get();
        
        return view('it_admin.employees.details.employeepayslip', compact('user', 'employee', 'payslip'));
    }

    public function employeeaddressdetails($id) {
        $user = Auth::user();
        $employee = User::findOrFail($id);
        
        return view('it_admin.employees.details.employeeaddress', compact('user', 'employee'));
    }

    public function employeeupdateaccount($id) {
        $user = Auth::user();
        $employee = User::findOrFail($id);
        
        return view('it_admin.employees.details.updateaccount', compact('user', 'employee'));
    }

    public function employeesaveupdateaccount(Request $request, $id) {
        $user = Auth::user();
        $employee = User::findOrFail($id);
    
        $messages = [
            'name.required' => 'The name field is required.',
            'name.string' => 'The name must be a valid string.',
            'name.max' => 'The name cannot be longer than 255 characters.',
            'email.required' => 'The email field is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'This email address is already taken.',
            'password.min' => 'The password should be at least 8 characters long.',
        ];
    
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $employee->id,
            'password' => 'nullable|min:8',
            'confirm_password' => 'nullable|same:password',
        ], $messages);
    
        $employee->name = $validated['name'];
        $employee->email = $validated['email'];
    
        if ($request->filled('password')) {
            if ($request->password === $request->confirm_password) {
                $employee->password = Hash::make($validated['password']);
            } else {
                return redirect()->back()->withErrors(['confirm_password' => 'The password confirmation does not match.']);
            }
        }
    
        $employee->save();
    
        return redirect()->route('it_employeeupdateaccount', $employee->id)
                         ->with('success', 'User Details Updated Successfully!');
    }

    public function addEmployee(Request $request)
    {
        // Validate first
        $request->validate([
            'email' => [
                'required', 'string', 'email', 'max:255',
                'unique:' . User::class
            ],
            'employee_id' => [
                'required', 'string', 'max:20',
                'unique:' . User::class
            ],
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'salary'=> 'required|numeric|min:0',
            'role'  => 'required|integer',
            // add rules for other fields if needed
        ]);

        try {
            // build default password
            $firstWord = $this->firstWord($request->fname . ' ' . $request->mname . ' ' . $request->lname);
            $password  = $firstWord . '112';

            // create the user
            $user = User::create([
                'name'           => trim($request->fname . ' ' . $request->mname . ' ' . $request->lname),
                'email'          => $request->email,
                'employee_id'    => $request->employee_id,
                'shift_id'       => $request->shift,
                'department_id'  => $request->department,
                'designation_id' => $request->designation,
                'employment_id'  => $request->status,
                'payment_method' => $request->method,
                'salary'         => $request->salary,
                'joining_date'   => $request->joining_date,
                'leave_count'    => 5,
                'update_leave_count' => null,
                'password'       => Hash::make($password),
                'role'           => $request->role,
                'profile_img' => ''
            ]);

            // compute deductions
            $salaryNum  = (int) str_replace(',', '', $user->salary);
            $philhealth = $salaryNum * 0.05;
            $pagibig    = round($salaryNum * 0.0176, 2);
            $sss        = 0;

            foreach ($this->sssTable as $range) {
                if ($salaryNum >= $range['min'] && $salaryNum <= $range['max']) {
                    $sss = $range['employee_share'];
                    break;
                }
            }

            // store deductions
            Deduction::create(['user_id' => $user->id, 'deduction_name' => 'Pagibig',   'percent' => $pagibig]);
            Deduction::create(['user_id' => $user->id, 'deduction_name' => 'Philhealth','percent' => $philhealth]);
            Deduction::create(['user_id' => $user->id, 'deduction_name' => 'SSS',       'percent' => $sss]);

            // ✅ success flash message
            return redirect()
                ->back()
                ->with('success', 'Employee added successfully.');

        } catch (QueryException $e) {
            // duplicate email or other DB constraint
            if ($e->getCode() === '23000') {
                return redirect()
                    ->back()
                    ->withInput()
                    ->withErrors(['email' => 'That email address is already in use.']);
            }

            // any other DB issue
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'A database error occurred. Please try again.');
        } catch (\Exception $e) {
            // catch-all for unexpected errors
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Something went wrong. Please try again.');
        }
    }

    private function firstWord($string)
    {
        return strtok($string, ' '); // Split the string by spaces and return the first part
    }

    public function leaveAllowance()
    {
        $user = Auth::user();

        $sss = 0;
        $philhealth = ((int)str_replace(',', '', $user->salary) * 0.05); // 5% of salary
        $pagibig = ((int)str_replace(',', '', $user->salary) * .02); // 1.76% of salary

        // Loop through the sssTable to calculate the contribution
        foreach ($this->sssTable as $range) {
            if ($user->salary >= $range['min'] && $user->salary <= $range['max']) {
                $sss = $range['employee_share']; // Divide the contribution by 4 for weekly payment
            }
        }

        // Return the view with the necessary data
        return view('it_admin.jobdesk.leaveallowance', compact('user', 'sss', 'pagibig', 'philhealth'));
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
        
        return view('it_admin.jobdesk.attendance', compact('getAttendance', 'user', 'totalActiveHours', 'monthSearch'));
    
    }

    public function save_overtime(Request $request)
    {
        $user = Auth::user();

        $date = $request->date;
        $start_time = $request->start_time;
        $end_time = $request->end_time;
        $reason = $request->reason;

        Overtime::create([
            'employee_id' => $user->id,
            'date' => $date,
            'start_time' => $start_time,
            'end_time' => $end_time,
            'reason' => $reason,
            'status' => 'Pending',
            'approved_by' => null
        ]);

        
        return redirect()->route('it_overtimes_view');
    
    }

    public function save_undertime(Request $request)
    {
        $user = Auth::user();

        $date = $request->date;
        $start_time = $request->start_time;
        $end_time = $request->end_time;
        $reason = $request->reason;

        Undertime::create([
            'employee_id' => $user->id,
            'date' => $date,
            'start_time' => $start_time,
            'end_time' => $end_time,
            'reason' => $reason,
            'status' => 'Pending',
            'approved_by' => null
        ]);

        
        return redirect()->route('it_undertimes_view');
    
    }

    public function edownloadpayslip($id)
    {
        $payslip = Payslip::find($id);
        $deductions_sum = DeductionReal::where('employee_id',$payslip->employee->id)->sum('amount') / 2;
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
                'deductions' => DeductionReal::where('employee_id',$payslip->employee->id)->where('expected_end_date', '>=', Carbon::today())->get(),
                'absences' => max(0, ((((int)str_replace(',', '', $payslip->employee->salary) / 2) - ($payslip->total_salary + $payslip->sss + $payslip->pagibig + $payslip->philhealth + $payslip->tax_income))) + ($payslip->sss + $payslip->pagibig + $payslip->philhealth + $payslip->tax_income) - ($payslip->sss + $payslip->pagibig + $payslip->philhealth + $payslip->tax_income)),
                'total_deduction' => round(($payslip->sss + $payslip->pagibig + $payslip->philhealth + $payslip->tax_income + $deductions_sum),2),
                'net_salary' => ((int)str_replace(',', '', $payslip->employee->salary) / 2) - (((((int)str_replace(',', '', $payslip->employee->salary) / 2) - ($payslip->total_salary + $payslip->sss + $payslip->pagibig + $payslip->philhealth + $payslip->tax_income))) + ($payslip->sss + $payslip->pagibig + $payslip->philhealth + $payslip->tax_income)),
            ];
        
            $pdf = PDF::loadView('admin.download.payslip', $data);
        
            $pdf->setPaper('A4', 'portrait');
        }
    
        return $pdf->download('Payslip_'. $payslip->employee->name .'.pdf');
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
}
