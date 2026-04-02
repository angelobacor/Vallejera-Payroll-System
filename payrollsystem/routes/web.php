<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DirectorController;
use App\Http\Controllers\ItAdminController;
use App\Http\Controllers\PayrollOfficerController;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Leave;
use App\Models\Payslip;
use App\Models\Address;
use App\Models\EmergencyContact;
use App\Models\Payrun;
use App\Models\Document;
use App\Models\Department;
use App\Models\Shift;
use App\Models\Designation;
use App\Models\EmploymentStatus;
use App\Models\Overtime;
use App\Models\Undertime;
use App\Models\HolidayPaymentIncrease;
use App\Models\DeductionReal;
use App\Models\ContributionSetting;
use App\Models\SssTable;

use App\Models\Attendance;
use Carbon\Carbon;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

/*
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
*/
Route::get('/admin/jobdesk', function () {
    $user = Auth::user();

    return view('admin.jobdesk',compact('user'));
})->middleware(['auth', 'user-role:admin']);

Route::get('/admin/settings', function () {
    $user = Auth::user();

    return view('admin.settings',compact('user'));
})->middleware(['auth', 'user-role:admin']);

Route::get('/admin/attendance', function () {
    $user = Auth::user();

    $getAttendance = Attendance::where('user_id', '=', Auth::user()->id)->whereDate('created_at', '>=', Carbon::now()->startOfMonth()->setTimezone('Asia/Manila'))
    ->where('created_at', '<=', Carbon::now()->endOfMonth()->setTimezone('Asia/Manila'))->get();

    $totalActiveHours = 0;
    foreach ($getAttendance as $ghours) {
        $totalActiveHours += intval($ghours->total_hours);
    }

    $monthSearch = 'false';

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

    return view('admin.jobdesk.attendance', compact('totalActiveHours','getAttendance', 'user', 'monthSearch'));
})->middleware(['auth', 'user-role:admin']);
$user = Auth::user();

Route::get('/admin/leave', function () {
    $user = Auth::user();

    $leaves = Leave::where('user_id', '=', Auth::user()->id)->get();
    return view('admin.jobdesk.leave', compact('leaves', 'user'));
})->middleware(['auth', 'user-role:admin']);

Route::get('/admin/documents', function () {
    $user = Auth::user();
    $documents = Document::where('user_id', '=', Auth::user()->id)->get();

    return view('admin.jobdesk.documents', compact('user', 'documents'));
})->middleware(['auth', 'user-role:admin']);

Route::get('/admin/assets', function () {
    $user = Auth::user();

    return view('admin.jobdesk.assets', compact('user'));
})->middleware(['auth', 'user-role:admin']);

Route::get('/admin/job-history', function () {
    $user = Auth::user();
    $departments = Department::all();
    $shifts = Shift::all();
    $designations = Designation::all();
    $estatus = EmploymentStatus::all();

    return view('admin.jobdesk.jobhistory', compact('user', 'departments', 'shifts', 'designations', 'estatus'));
})->middleware(['auth', 'user-role:admin']);

Route::get('/admin/salary-overview', function () {
    $user = Auth::user();

    return view('admin.jobdesk.salaryoverview', compact('user'));
})->middleware(['auth', 'user-role:admin']);

Route::get('/admin/payrun-badge', function () {
    $user = Auth::user();

    return view('admin.jobdesk.payrunbadge',compact('user'));
})->middleware(['auth', 'user-role:admin']);

Route::get('/admin/payslip', function () {
    $user = Auth::user();

    $payslip = Payslip::where('user_id', '=', Auth::user()->id)->get();

    return view('admin.jobdesk.payslip', compact('payslip','user'));
})->middleware(['auth', 'user-role:admin']);

Route::get('/admin/address-details', function () {
    $users = Auth::user();

    $user = Address::where('user_id', '=', Auth::user()->id)->get();

    return view('admin.jobdesk.addressdetails', compact('user' ,'users'));
})->middleware(['auth', 'user-role:admin']);

Route::get('/admin/emergency-contact', function () {
    $users = Auth::user();

    $user = EmergencyContact::where('user_id', '=', Auth::user()->id)->get();

    return view('admin.jobdesk.emergencycontact', compact('user', 'users'));
})->middleware(['auth', 'user-role:admin']);

Route::get('/admin/social-link', function () {
    $user = Auth::user();

    return view('admin.jobdesk.sociallink', compact('user'));
})->middleware(['auth', 'user-role:admin']);

Route::get('/admin/employee', function () {
    $user = Auth::user();

    return view('admin.employee', compact('user'));
})->middleware(['auth', 'user-role:admin']);

Route::get('/admin/all-employee', function () {
    $user = Auth::user();
    $departments = Department::all();
    $shifts = Shift::all();
    $designations = Designation::all();
    $estatus = EmploymentStatus::where('status','!=','Terminated')->get();
    $employees = User::where('id', '!=', $user->id)->get();

    return view('admin.employees.allemployee',compact('employees','user','departments', 'shifts', 'designations', 'estatus'));
})->middleware(['auth', 'user-role:admin'])->name("employees_all");

Route::get('/admin/all-employee-attendance', function () {
    $user = Auth::user();
    $getAttendance = Attendance::whereDate('punched_in', Carbon::today())
    ->orderBy('punched_in', 'desc')
    ->get();
    $departments = Department::all();


    return view('admin.employees.allattendance',compact('user','getAttendance', 'departments'));
})->middleware(['auth', 'user-role:admin']);

Route::get('/admin/designation', function () {
    $user = Auth::user();
    $designations = Designation::all();

    return view('admin.employees.designation', compact('user','designations'));
})->middleware(['auth', 'user-role:admin']);

Route::get('/admin/departments', function () {
    $user = Auth::user();
    $departments = Department::all();

    return view('admin.employees.departments', compact('user','departments'));
})->middleware(['auth', 'user-role:admin']);

Route::get('/admin/contributions', function () {
    $user = Auth::user();
    $contributions = ContributionSetting::all();

    return view('admin.employees.pagibigphilhealth', compact('user','contributions'));
})->middleware(['auth', 'user-role:admin']);

Route::get('/admin/holidays', function () {
    $user = Auth::user();
    $holidays = HolidayPaymentIncrease::all();

    return view('admin.employees.holidays', compact('user','holidays'));
})->middleware(['auth', 'user-role:admin']);

Route::get('/admin/sss-table', function () {
    $user = Auth::user();
    $sss = SssTable::orderBy('min_amount', 'asc')->get();

    return view('admin.employees.ssstable', compact('user','sss'));
})->middleware(['auth', 'user-role:admin']);

Route::get('/admin/employment-stat', function () {
    $user = Auth::user();

    $employees = User::where('role', '!=', '0')->orderBy('employment_id','asc')->get();
    $emp_stat = EmploymentStatus::all();

    return view('admin.employees.employmentstatus', compact('employees','user','emp_stat'));
})->middleware(['auth', 'user-role:admin']);

Route::get('/admin/user-management', function () {
    $user = Auth::user();

    $employees = User::where('role', '!=', '0')->orderBy('employment_id','asc')->get();
    $emp_stat = EmploymentStatus::all();

    return view('admin.employees.usermanagement', compact('employees','user','emp_stat'));
})->middleware(['auth', 'user-role:admin']);

// routes/web.php
Route::get('/admin/user-manage/{id}/modal', function ($id) {
    $employee = User::findOrFail($id);
    $designations = Designation::all();
    $departments = Department::all();
    $status = EmploymentStatus::all();

    // Render the modal body as plain HTML
    return view('admin.modal.update_user', ['employee' => $employee,'designations'=> $designations,'departments'=> $departments,'status'=> $status]);
});

Route::get('/admin/user-manage/{id}/deduction-modal', function ($id) {
    $employee = User::findOrFail($id);
    $deductions = DeductionReal::where('employee_id','=',$employee->id)->get();

    // Render the modal body as plain HTML
    return view('admin.modal.adddeduction', ['employee' => $employee,'deductions'=> $deductions]);
});


Route::get('/admin/leavestat', function () {
    $user = Auth::user();

    $leaverequests = Leave::where('status', '!=', 'Pending')->orderBy('created_at', 'desc')
    ->get();

    return view('admin.leave.leavestat',compact('user', 'leaverequests'));
})->middleware(['auth', 'user-role:admin']);

Route::get('/admin/overtimes', function () {
    $user = Auth::user();

    $leaves = Overtime::where('employee_id','!=',$user->id)->orderBy('created_at','desc')->get();

    return view('admin.requests.overtimerequest',compact('user', 'leaves'));
})->middleware(['auth', 'user-role:admin']);

Route::get('/admin/undertimes', function () {
    $user = Auth::user();

    $leaves = Undertime::where('employee_id', '!=', $user->id)->orderBy('created_at', 'desc')
    ->get();

    return view('admin.requests.undertimerequest',compact('user', 'leaves'));
})->middleware(['auth', 'user-role:admin']);

Route::get('/admin/leave-request', function () {
    $user = Auth::user();
    $departments = Department::all();

    $leaverequests = Leave::where('status', '!=', 'Approved')
    ->where('status', '!=', 'Disapproved')->orderBy('created_at', 'desc')
    ->get();
    
    return view('admin.leave.leavereq',compact('user', 'departments', 'leaverequests'));
})->middleware(['auth', 'user-role:admin']);

Route::get('/admin/leave-calendar', function () {
    $user = Auth::user();

    return view('admin.leave.leavecalendar',compact('user'));
})->middleware(['auth', 'user-role:admin']);

Route::get('/admin/leave-summ', function () {
    $user = Auth::user();

    return view('admin.leave.leavesumm',compact('user'));
})->middleware(['auth', 'user-role:admin']);

Route::get('/admin/daily-log', function () {
    $user = Auth::user();
    $departments = Department::all();
    $getAttendance = Attendance::where('user_id', '=', Auth::user()->id)->orderBy('created_at', 'desc')->get();

    return view('admin.attendance.dailylog',compact('user', 'departments', 'getAttendance'));
})->middleware(['auth', 'user-role:admin']);

Route::get('/admin/attendance-request', function () {
    $user = Auth::user();
    $departments = Department::all();

    return view('admin.attendance.attendancereq',compact('user', 'departments'));
})->middleware(['auth', 'user-role:admin']);

Route::get('/admin/attendancedetails', function () {
    $user = Auth::user();

    return view('admin.attendance.attendancedetails',compact('user'));
})->middleware(['auth', 'user-role:admin']);

Route::get('/admin/summary-attendance', function () {
    $user = Auth::user();

    return view('admin.attendance.summaryattendance',compact('user'));
})->middleware(['auth', 'user-role:admin']);

Route::get('/admin/payrunpayroll', function () {
    $payrolls = Payrun::orderBy('created_at', 'desc')->get();
    $user = Auth::user();

    return view('admin.payroll.payrunpayroll', compact('payrolls','user'));
})->middleware(['auth', 'user-role:admin'])->name('payrunview');


Route::get('/admin/manualpayrun', function () {
    $payrolls = Payrun::all();
    $user = Auth::user();

    return view('admin.payroll.manualpayrun', compact('payrolls','user'));
})->middleware(['auth', 'user-role:admin']);

Route::get('/admin/payslippayroll', function () {
    $employee_payslips = Payslip::where('condition', '!=', 'not sent')->orderBy('created_at', 'desc')->get();
    $user = Auth::user();

    return view('admin.payroll.payslippayroll', compact('employee_payslips','user'));
})->middleware(['auth', 'user-role:admin'])->name('admin.payslips.index');

Route::get('/admin/users-roles', function () {
    $user = Auth::user();
    $departments = Department::all();
    $shifts = Shift::all();
    $designations = Designation::all();
    $estatus = EmploymentStatus::all();
    $employees = User::where('role', '!=', '0')->get();

    return view('admin.administration.userroles',compact('employees','user','departments', 'shifts', 'designations', 'estatus'));
})->middleware(['auth', 'user-role:admin']);

Route::get('/admin/workshifts', function () {
    $user = Auth::user();
    $departments = Department::all();
    $shifts = Shift::all();
    $designations = Designation::all();
    $estatus = EmploymentStatus::all();
    $employees = User::where('role', '!=', '0')->get();

    return view('admin.administration.workshifts',compact('employees','user','departments', 'shifts', 'designations', 'estatus'));
})->middleware(['auth', 'user-role:admin']);

Route::get('/admin/departments-view', function () {
    $user = Auth::user();
    $departments = Department::all();
    $shifts = Shift::all();
    $designations = Designation::all();
    $estatus = EmploymentStatus::all();
    $employees = User::where('role', '!=', '0')->get();

    return view('admin.administration.DepartmentsAdministration',compact('employees','user','departments', 'shifts', 'designations', 'estatus'));
})->middleware(['auth', 'user-role:admin']);

// Route::get('/admin/holidays', function () {
//     $user = Auth::user();
//     $departments = Department::all();
//     $shifts = Shift::all();
//     $designations = Designation::all();
//     $estatus = EmploymentStatus::all();
//     $employees = User::where('role', '!=', '0')->get();

//     return view('admin.administration.holiday',compact('employees','user','departments', 'shifts', 'designations', 'estatus'));
// })->middleware(['auth', 'user-role:admin']);

Route::get('/admin/organization-structure', function () {
    $user = Auth::user();
    $departments = Department::all();
    $shifts = Shift::all();
    $designations = Designation::all();
    $estatus = EmploymentStatus::all();
    $employees = User::where('role', '!=', '0')->get();

    return view('admin.administration.orgstructure',compact('employees','user','departments', 'shifts', 'designations', 'estatus'));
})->middleware(['auth', 'user-role:admin']);

Route::get('/admin/announcements', function () {
    $user = Auth::user();
    $departments = Department::all();
    $shifts = Shift::all();
    $designations = Designation::all();
    $estatus = EmploymentStatus::all();
    $employees = User::where('role', '!=', '0')->get();

    return view('admin.administration.announcements',compact('employees','user','departments', 'shifts', 'designations', 'estatus'));
})->middleware(['auth', 'user-role:admin']);

Route::middleware(['auth', 'user-role:admin'])->group(function()
{
    Route::get('/admin-dashboard', [AdminController::class, 'home'])->name('admin.home');
    Route::get('/admin-leave-request', [AdminController::class, 'leave'])->name('admin.leave');

    Route::get('/admin/export-leaves', [AdminController::class, 'exportleave'])->name('exportleave');
    Route::get('/admin/leave-allowance', [AdminController::class, 'leaveallowance'])->name('leaveallowance');

    Route::get('/admin/export-month', [AdminController::class, 'month_export'])->name('admin.att.export');

    Route::get('/admin/export', [AdminController::class, 'export'])->name('export');
    Route::get('/admin/export_all', [AdminController::class, 'exportAll'])->name('exportAll');
    Route::post('/admin/import', [AdminController::class, 'import'])->name('import');

    Route::post('/admin/change-details', [AdminController::class, 'change_details'])->name('change_details');

    //line for Employee details
    Route::get('/admin/solo-export/{export}', [AdminController::class, 'soloexport'])->name('soloexport');
    Route::get('/admin/document-download/{id}', [AdminController::class, 'downloadDocument'])->name('download.document');
    Route::get('/admin/employee-details/{id}', [AdminController::class, 'employeedetails'])->name('employeedetails');
    Route::get('/admin/employee-details/leave-allowance/{id}', [AdminController::class, 'employeeleaveallowance'])->name('employeeleaveallowance');
    Route::get('/admin/employee-details/attendance/{id}', [AdminController::class, 'employeeattendance'])->name('employeeattendance');
    Route::post('/admin/employee-details/attendance_filter/{id}', [AdminController::class, 'employeeattendance_filter'])->name('employeeattendance_filter');

    Route::get('/admin/employee-details/leave/{id}', [AdminController::class, 'employeeleave'])->name('employeeleave');
    Route::get('/admin/employee-details/documents/{id}', [AdminController::class, 'employeedocuments'])->name('employeedocuments');
    Route::get('/admin/employee-details/assets/{id}', [AdminController::class, 'employeeassets'])->name('employeeassets');
    Route::get('/admin/employee-details/jobhistory/{id}', [AdminController::class, 'employeejobhistory'])->name('employeejobhistory');
    Route::get('/admin/employee-details/salaryoverview/{id}', [AdminController::class, 'employeesalaryoverview'])->name('employeesalaryoverview');
    Route::get('/admin/employee-details/payslip/{id}', [AdminController::class, 'employeepayslip'])->name('employeepayslip');
    Route::get('/admin/employee-details/address-details/{id}', [AdminController::class, 'employeeaddressdetails'])->name('employeeaddressdetails');
    Route::get('/admin/employee-details/account-update/{id}', [AdminController::class, 'employeeupdateaccount'])->name('employeeupdateaccount');
    Route::post('/admin/employee-details/save-account-update/{id}', [AdminController::class, 'employeesaveupdateaccount'])->name('employeesaveupdateaccount');

    Route::get('/admin/employee-details/emergency-contact/{id}', [AdminController::class, 'employeecontact'])->name('employeecontact');
    Route::get('/admin/employee-details/social-link/{id}', [AdminController::class, 'employeesociallink'])->name('employeesociallink');
    
    Route::get('/admin/recalculate-payslip/{id}', [AdminController::class, 'recalculate'])->name('recalculate');
    Route::post('/admin/recalculate-payslip/{id}', [AdminController::class, 'saverecalculate'])->name('saverecalculate');


    Route::get('/admin/download-payslip/{id}', [AdminController::class, 'downloadpayslip'])->name('download');

    Route::post('/admin/search/attendance', [AdminController::class, 'filterDateAttendanceAdmin'])->name('attendance_search');

    Route::get('/admin/approve-leave/{leave}', [AdminController::class, 'approveleave'])->name('approveleave');
    Route::get('/admin/disapprove-leave/{leave}', [AdminController::class, 'disapproveleave'])->name('disapproveleave');

    Route::get('/admin/approve-overtime/{overtime}', [AdminController::class, 'approveovertime'])->name('approveovertime');
    Route::get('/admin/disapprove-overtime/{overtime}', [AdminController::class, 'disapproveovertime'])->name('disapproveovertime');

    Route::get('/admin/approve-undertime/{undertime}', [AdminController::class, 'approveundertime'])->name('approveundertime');
    Route::get('/admin/disapprove-undertime/{undertime}', [AdminController::class, 'disapproveundertime'])->name('disapproveundertime');


    Route::get('/admin/employees/{departmentId}', [AdminController::class, 'getEmployeesByDepartment']);

    Route::post('/admin/documents-upload', [AdminController::class, 'upload'])->name('upload');
    Route::post('/admin/attendance_filter', [AdminController::class, 'attendance_filter'])->name('filter_date_attendance_admin');

    Route::post('/admin/change-department', [AdminController::class, 'changeDepartment'])->name('changeDepartment');
    Route::post('/admin/change-shift', [AdminController::class, 'changeShift'])->name('changeShift');
    Route::post('/admin/change-designation', [AdminController::class, 'changeDesignation'])->name('changeDesignation');
    Route::post('/admin/change-status', [AdminController::class, 'changeStatus'])->name('changeStatus');

    Route::post('/admin/add-employee', [AdminController::class, 'addEmployee'])->name('addEmployee');

    Route::post('/admin/send-payslip/{payrun}', [AdminController::class, 'sendpayslip'])->name('sendpayslip');
    Route::post("/admin-punch-in",[AdminController::class,'punchin'])->name('adminpunchin');
    Route::post("/admin-punch-out",[AdminController::class,'punchout'])->name('adminpunchout');
    Route::post("/admin-payrun",[AdminController::class,'payrun'])->name('adminpayrun');
    Route::post("/admin-leave",[AdminController::class,'leaver'])->name('adminleaver');
    
    Route::post("/admin/manual-attendance",[AdminController::class,'manualattendance'])->name('manualattendance');

    Route::post("/admin-payment-increase",[AdminController::class,'paymentIncrease'])->name('payment.increase');


    Route::get('/admin-payslips/{payrun}', [AdminController::class, 'payslipsview'])->name('adminpayslip');
    Route::post('/admin-payslips/search', [AdminController::class, 'searchpayslip'])->name('searchpayslip');

    Route::get('/admin/search/employee', [AdminController::class, 'filterEmployeeSearch'])->name('employee_search');
    Route::post('/admin/add-employment-status', [AdminController::class, 'add_employment_status'])->name('add_employment_status');
    Route::post('/admin/edit-employment-status', [AdminController::class, 'edit_employment_status'])->name('edit_employment_status');

    Route::post('/admin/edit-designation', [AdminController::class, 'edit_designation'])->name('edit_designation');
    Route::post('/admin/add-designation', [AdminController::class, 'add_designation'])->name('add_designation');

    Route::post('/admin/edit-department', [AdminController::class, 'edit_department'])->name('edit_department');
    Route::post('/admin/add-department', [AdminController::class, 'add_department'])->name('add_department');
    Route::get('/admin/delete-department/{department_id}', [AdminController::class, 'delete_department'])->name('delete_department');
    Route::get('/admin/delete-designation/{designation_id}', [AdminController::class, 'delete_designation'])->name('delete_designation');

    Route::post('/admin/update-user/{id}', [AdminController::class, 'updateUser'])->name('UpdateUser');
    Route::get('/admin/search/update-user', [AdminController::class, 'filterEmployeeSearchUpdate'])->name('employee_update_search');

    Route::get('/admin/export-dtr', [AdminController::class, 'print_dtr'])->name('admin.att.dtr');

    Route::post('/admin/add-holiday', [AdminController::class, 'add_holiday'])->name('add_holiday');
    Route::post('/admin/edit-holiday', [AdminController::class, 'edit_holiday'])->name('edit_holiday');
    Route::get('/admin/delete-holiday/{holiday_id}', [AdminController::class, 'delete_holiday'])->name('delete_holiday');

    Route::post('/admin/add-deduction', [AdminController::class, 'add_deduction'])->name('add_deduction');
    Route::get('/admin/delete-deduction/{deduction_id}', [AdminController::class, 'delete_deduction'])->name('delete_deduction');

    Route::post('/admin/edit-contribution', [AdminController::class, 'edit_contribution'])->name('edit_contribution');

    Route::post('/admin/add-sss-table', [AdminController::class, 'add_sssrange'])->name('add_sssrange');
    Route::post('/admin/edit-sss-table', [AdminController::class, 'edit_sssrange'])->name('edit_sssrange');
    Route::get('/admin/delete-sss-table/{sss_id}', [AdminController::class, 'delete_sssrange'])->name('delete_sssrange');

});








Route::get('/employee/settings', function () {
    $user = Auth::user();

    return view('employee.settings',compact('user'));
})->middleware(['auth', 'user-role:employee']);

Route::get('/employee/jobdesk', function () {
    $user = Auth::user();

    return view('employee.jobdesk',compact('user'));
})->middleware(['auth', 'user-role:employee']);

Route::get('/employee/settings', function () {
    $user = Auth::user();

    return view('employee.settings',compact('user'));
})->middleware(['auth', 'user-role:employee']);

// Route::get('/employee/leave-allowance', function () {
//         $user = Auth::user();

//         $sss = 0; //35.50 trial expectation
//         $philhealth = ((int)str_replace(',', '', $user->salary) * .05); //As of now based on the table, starting from 10k to 99k it the 5% of the salary should be contributed.
//         $pagibig = round((int)str_replace(',', '', $user->salary)*0.0176, 2); //13.67

//         foreach ($sssTable as $range) {
//             if ($user->salary >= $range['min'] && $user->salary <= $range['max']) {
//                 $sss = $range['employee_share']; // Divide the contribution by 4 for weekly payment
//             }
//         }    

//     return view('employee.jobdesk.leaveallowance',compact('user', 'sss', 'pagibig', 'philhealth'));
// })->middleware(['auth', 'user-role:employee']);

Route::get('/employee/leave-allowance', [EmployeeController::class, 'leaveAllowance'])
    ->middleware(['auth', 'user-role:employee']);


Route::get('/employee/attendance', function () {
    $user = Auth::user();

    $getAttendance = Attendance::where('user_id', '=', Auth::user()->id)->whereDate('created_at', '>=', Carbon::now()->startOfMonth()->setTimezone('Asia/Manila'))
    ->where('created_at', '<=', Carbon::now()->endOfMonth()->setTimezone('Asia/Manila'))->get();

    $totalActiveHours = 0;
    foreach ($getAttendance as $ghours) {
        $totalActiveHours += intval($ghours->total_hours);
    }

    $monthSearch = 'false';

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

    return view('employee.jobdesk.attendance', compact('totalActiveHours','getAttendance', 'user', 'monthSearch'));
})->middleware(['auth', 'user-role:employee']);

Route::get('/employee/leave', function () {
    $user = Auth::user();

    $leaves = Leave::where('user_id', '=', Auth::user()->id)->get();
    return view('employee.jobdesk.leave', compact('leaves', 'user'));
})->middleware(['auth', 'user-role:employee']);

Route::get('/employee/documents', function () {
    $user = Auth::user();
    $documents = Document::where('user_id', '=', Auth::user()->id)->get();

    return view('employee.jobdesk.documents', compact('user', 'documents'));
})->middleware(['auth', 'user-role:employee']);

Route::get('/employee/assets', function () {
    $user = Auth::user();

    return view('employee.jobdesk.assets', compact('user'));
})->middleware(['auth', 'user-role:employee']);

Route::get('/employee/job-history', function () {
    $user = Auth::user();
    $departments = Department::all();
    $shifts = Shift::all();
    $designations = Designation::all();
    $estatus = EmploymentStatus::all();

    return view('employee.jobdesk.jobhistory', compact('user', 'departments', 'shifts', 'designations', 'estatus'));
})->middleware(['auth', 'user-role:employee']);

Route::get('/employee/salary-overview', function () {
    $user = Auth::user();

    return view('employee.jobdesk.salaryoverview', compact('user'));
})->middleware(['auth', 'user-role:employee']);

Route::get('/employee/payrun-badge', function () {
    $user = Auth::user();

    return view('employee.jobdesk.payrunbadge',compact('user'));
})->middleware(['auth', 'user-role:employee']);

Route::get('/employee/payslip', function () {
    $user = Auth::user();

    $payslip = Payslip::where('user_id', '=', Auth::user()->id)->orderBy('created_at', 'desc')->get();

    return view('employee.jobdesk.payslip', compact('payslip','user'));
})->middleware(['auth', 'user-role:employee']);

Route::get('/employee/address-details', function () {
    $users = Auth::user();

    $user = Address::where('user_id', '=', Auth::user()->id)->get();

    return view('employee.jobdesk.addressdetails', compact('user' ,'users'));
})->middleware(['auth', 'user-role:employee']);

Route::get('/employee/emergency-contact', function () {
    $users = Auth::user();

    $user = EmergencyContact::where('user_id', '=', Auth::user()->id)->get();

    return view('employee.jobdesk.emergencycontact', compact('user', 'users'));
})->middleware(['auth', 'user-role:employee']);

Route::get('/employee/social-link', function () {
    $user = Auth::user();

    return view('employee.jobdesk.sociallink', compact('user'));
})->middleware(['auth', 'user-role:employee']);

Route::get('/employee/daily-log', function () {
    $user = Auth::user();
    $departments = Department::all();

    $getAttendance = Attendance::where('user_id', '=', Auth::user()->id)->orderBy('date', 'asc')->get();

    return view('employee.attendance.dailylog',compact('user', 'departments', 'getAttendance'));
})->middleware(['auth', 'user-role:employee']);

Route::get('/employee/attendance-request', function () {
    $user = Auth::user();

    return view('employee.attendance.attendancereq',compact('user'));
})->middleware(['auth', 'user-role:employee']);

Route::get('/employee/attendancedetails', function () {
    $user = Auth::user();

    return view('employee.attendance.attendancedetails',compact('user'));
})->middleware(['auth', 'user-role:employee']);

Route::get('/employee/summary-attendance', function () {
    $user = Auth::user();

    return view('employee.attendance.summaryattendance',compact('user'));
})->middleware(['auth', 'user-role:employee']);

Route::get('/employee/leavestat', function () {
    $user = Auth::user();

    $leaves = Leave::where('user_id', '=', Auth::user()->id)->where('status', '!=', 'Pending')->orderBy('created_at', 'desc')
    ->get();

    return view('employee.leave.leavestatus',compact('user', 'leaves'));
})->middleware(['auth', 'user-role:employee']);

Route::get('/employee/overtimes', function () {
    $user = Auth::user();

    $leaves = Overtime::where('employee_id', '=', Auth::user()->id)->orderBy('created_at', 'desc')
    ->get();

    return view('employee.requests.overtimerequest',compact('user', 'leaves'));
})->middleware(['auth', 'user-role:employee'])->name('overtimes_view');

Route::get('/employee/undertimes', function () {
    $user = Auth::user();

    $leaves = Undertime::where('employee_id', '=', Auth::user()->id)->orderBy('created_at', 'desc')
    ->get();

    return view('employee.requests.undertimerequest',compact('user', 'leaves'));
})->middleware(['auth', 'user-role:employee'])->name('undertimes_view');

Route::get('/employee/leave-request', function () {
    $user = Auth::user();
    $departments = Department::all();

    $leaverequests = Leave::where('user_id', '=', Auth::user()->id)->where('status', '!=', 'Approved')
    ->where('status', '!=', 'Disapproved')->orderBy('created_at','desc')
    ->get();
    
    return view('employee.leave.leavereq',compact('user', 'departments', 'leaverequests'));
})->middleware(['auth', 'user-role:employee']);

Route::get('/employee/leave-calendar', function () {
    $user = Auth::user();

    return view('employee.leave.leavecalendar',compact('user'));
})->middleware(['auth', 'user-role:employee']);

Route::get('/employee/leave-summ', function () {
    $user = Auth::user();

    return view('employee.leave.leavesumm',compact('user'));
})->middleware(['auth', 'user-role:employee']);

Route::middleware(['auth', 'user-role:employee'])->group(function()
{
    Route::get('/employee-dashboard', [EmployeeController::class, 'home'])->name('employee.home');

    Route::get('/employee/download-payslip/{id}', [EmployeeController::class, 'edownloadpayslip'])->name('employeedownload');

    Route::post('/employee/attendance_filter', [EmployeeController::class, 'attendance_filter'])->name('filter_date_attendance');

    Route::post('/employee/save_overtime', [EmployeeController::class, 'save_overtime'])->name('save_overtime');

    Route::post('/employee/save_undertime', [EmployeeController::class, 'save_undertime'])->name('save_undertime');

    Route::post("/employee-punch-in",[EmployeeController::class,'punchin'])->name('punchin');
    Route::post("/employee-punch-out",[EmployeeController::class,'punchout'])->name('punchout');
    Route::post("/employee-leave",[EmployeeController::class,'leaver'])->name('leaver');

    Route::post('/employee/change-details', [EmployeeController::class, 'change_details'])->name('emp_change_details');

    Route::get('/employee/export-month', [EmployeeController::class, 'month_export'])->name('employee.att.export');

    Route::get('/employee/export-dtr', [EmployeeController::class, 'print_dtr'])->name('employee.att.dtr');

});





Route::get('/it-admin/settings', function () {
    $user = Auth::user();

    return view('it_admin.settings',compact('user'));
})->middleware(['auth', 'user-role:it admin']);

Route::get('/it-admin/all-employee', function () {
    $user = Auth::user();
    $departments = Department::all();
    $shifts = Shift::all();
    $designations = Designation::all();
    $estatus = EmploymentStatus::where('status','!=','Terminated')->get();
    $employees = User::where('id', '!=', $user->id)->where('id','!=',$user->id)->get();

    return view('it_admin.employees.allemployee',compact('employees','user','departments', 'shifts', 'designations', 'estatus'));
})->middleware(['auth', 'user-role:it admin'])->name("it_employees_all");

Route::get('/it-admin/jobdesk', function () {
    $user = Auth::user();

    return view('it_admin.jobdesk',compact('user'));
})->middleware(['auth', 'user-role:it admin']);

Route::get('/it-admin/settings', function () {
    $user = Auth::user();

    return view('it_admin.settings',compact('user'));
})->middleware(['auth', 'user-role:it admin']);



Route::get('/it-admin/leave-allowance', [ItAdminController::class, 'leaveAllowance'])
    ->middleware(['auth', 'user-role:it admin']);


Route::get('/it-admin/attendance', function () {
    $user = Auth::user();

    $getAttendance = Attendance::where('user_id', '=', Auth::user()->id)->whereDate('created_at', '>=', Carbon::now()->startOfMonth()->setTimezone('Asia/Manila'))
    ->where('created_at', '<=', Carbon::now()->endOfMonth()->setTimezone('Asia/Manila'))->get();

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

    $monthSearch = 'false';

    return view('it_admin.jobdesk.attendance', compact('totalActiveHours','getAttendance', 'user', 'monthSearch'));
})->middleware(['auth', 'user-role:it admin']);

Route::get('/it-admin/leave', function () {
    $user = Auth::user();

    $leaves = Leave::where('user_id', '=', Auth::user()->id)->get();
    return view('it_admin.jobdesk.leave', compact('leaves', 'user'));
})->middleware(['auth', 'user-role:it admin']);

Route::get('/it-admin/documents', function () {
    $user = Auth::user();
    $documents = Document::where('user_id', '=', Auth::user()->id)->get();

    return view('it_admin.jobdesk.documents', compact('user', 'documents'));
})->middleware(['auth', 'user-role:it admin']);

Route::get('/it-admin/assets', function () {
    $user = Auth::user();

    return view('it_admin.jobdesk.assets', compact('user'));
})->middleware(['auth', 'user-role:it admin']);

Route::get('/it-admin/job-history', function () {
    $user = Auth::user();
    $departments = Department::all();
    $shifts = Shift::all();
    $designations = Designation::all();
    $estatus = EmploymentStatus::all();

    return view('it_admin.jobdesk.jobhistory', compact('user', 'departments', 'shifts', 'designations', 'estatus'));
})->middleware(['auth', 'user-role:it admin']);

Route::get('/it-admin/salary-overview', function () {
    $user = Auth::user();

    return view('it_admin.jobdesk.salaryoverview', compact('user'));
})->middleware(['auth', 'user-role:it admin']);

Route::get('/it-admin/payrun-badge', function () {
    $user = Auth::user();

    return view('it_admin.jobdesk.payrunbadge',compact('user'));
})->middleware(['auth', 'user-role:it admin']);

Route::get('/it-admin/payslip', function () {
    $user = Auth::user();

    $payslip = Payslip::where('user_id', '=', Auth::user()->id)->orderBy('created_at', 'desc')->get();

    return view('it_admin.jobdesk.payslip', compact('payslip','user'));
})->middleware(['auth', 'user-role:it admin']);

Route::get('/it-admin/address-details', function () {
    $users = Auth::user();

    $user = Address::where('user_id', '=', Auth::user()->id)->get();

    return view('it_admin.jobdesk.addressdetails', compact('user' ,'users'));
})->middleware(['auth', 'user-role:it admin']);

Route::get('/it-admin/emergency-contact', function () {
    $users = Auth::user();

    $user = EmergencyContact::where('user_id', '=', Auth::user()->id)->get();

    return view('it_admin.jobdesk.emergencycontact', compact('user', 'users'));
})->middleware(['auth', 'user-role:it admin']);

Route::get('/it-admin/social-link', function () {
    $user = Auth::user();

    return view('it_admin.jobdesk.sociallink', compact('user'));
})->middleware(['auth', 'user-role:it admin']);

Route::get('/it-admin/daily-log', function () {
    $user = Auth::user();
    $departments = Department::all();

    $getAttendance = Attendance::where('user_id', '=', Auth::user()->id)->orderBy('date', 'asc')->get();

    return view('it_admin.attendance.dailylog',compact('user', 'departments', 'getAttendance'));
})->middleware(['auth', 'user-role:it admin']);

Route::get('/it-admin/attendance-request', function () {
    $user = Auth::user();

    return view('it_admin.attendance.attendancereq',compact('user'));
})->middleware(['auth', 'user-role:it admin']);

Route::get('/it-admin/attendancedetails', function () {
    $user = Auth::user();

    return view('it_admin.attendance.attendancedetails',compact('user'));
})->middleware(['auth', 'user-role:it admin']);

Route::get('/it-admin/summary-attendance', function () {
    $user = Auth::user();

    return view('it_admin.attendance.summaryattendance',compact('user'));
})->middleware(['auth', 'user-role:it admin']);

Route::get('/it-admin/leavestat', function () {
    $user = Auth::user();

    $leaves = Leave::where('user_id', '=', Auth::user()->id)->where('status', '!=', 'Pending')->orderBy('created_at', 'desc')
    ->get();

    return view('it_admin.leave.leavestatus',compact('user', 'leaves'));
})->middleware(['auth', 'user-role:it admin']);

Route::get('/it-admin/overtimes', function () {
    $user = Auth::user();

    $leaves = Overtime::where('employee_id', '=', Auth::user()->id)->orderBy('created_at', 'desc')
    ->get();

    return view('it_admin.requests.overtimerequest',compact('user', 'leaves'));
})->middleware(['auth', 'user-role:it admin'])->name('it_overtimes_view');

Route::get('/it-admin/undertimes', function () {
    $user = Auth::user();

    $leaves = Undertime::where('employee_id', '=', Auth::user()->id)->orderBy('created_at', 'desc')
    ->get();

    return view('it_admin.requests.undertimerequest',compact('user', 'leaves'));
})->middleware(['auth', 'user-role:it admin'])->name('it_undertimes_view');

Route::get('/it-admin/leave-request', function () {
    $user = Auth::user();
    $departments = Department::all();

    $leaverequests = Leave::where('user_id', '=', Auth::user()->id)->where('status', '!=', 'Approved')
    ->where('status', '!=', 'Disapproved')->orderBy('created_at','desc')
    ->get();
    
    return view('it_admin.leave.leavereq',compact('user', 'departments', 'leaverequests'));
})->middleware(['auth', 'user-role:it admin']);

Route::get('/it-admin/leave-calendar', function () {
    $user = Auth::user();

    return view('it_admin.leave.leavecalendar',compact('user'));
})->middleware(['auth', 'user-role:it admin']);

Route::get('/it-admin/leave-summ', function () {
    $user = Auth::user();

    return view('it_admin.leave.leavesumm',compact('user'));
})->middleware(['auth', 'user-role:it admin']);

Route::middleware(['auth', 'user-role:it admin'])->group(function()
{
    Route::get('/it-admin-dashboard', [ItAdminController::class, 'home'])->name('itadmin.home');
    Route::get('/it-admin/employee-details/{id}', [ItAdminController::class, 'employeedetails'])->name('it_employeedetails');
    Route::get('/it-admin/employee-details/leave-allowance/{id}', [ItAdminController::class, 'employeeleaveallowance'])->name('it_employeeleaveallowance');
    Route::get('/it-admin/employee-details/attendance/{id}', [ItAdminController::class, 'employeeattendance'])->name('it_employeeattendance');
    Route::post('/it-admin/employee-details/attendance_filter/{id}', [ItAdminController::class, 'employeeattendance_filter'])->name('it_employeeattendance_filter');

    Route::get('/it-admin/employee-details/leave/{id}', [ItAdminController::class, 'employeeleave'])->name('it_employeeleave');
    Route::get('/it-admin/employee-details/documents/{id}', [ItAdminController::class, 'employeedocuments'])->name('it_employeedocuments');
    Route::get('/it-admin/employee-details/assets/{id}', [ItAdminController::class, 'employeeassets'])->name('it_employeeassets');
    Route::get('/it-admin/employee-details/jobhistory/{id}', [ItAdminController::class, 'employeejobhistory'])->name('it_employeejobhistory');
    Route::get('/it-admin/employee-details/salaryoverview/{id}', [ItAdminController::class, 'employeesalaryoverview'])->name('it_employeesalaryoverview');
    Route::get('/it-admin/employee-details/payslip/{id}', [ItAdminController::class, 'employeepayslip'])->name('it_employeepayslip');
    Route::get('/it-admin/employee-details/address-details/{id}', [ItAdminController::class, 'employeeaddressdetails'])->name('it_employeeaddressdetails');
    Route::get('/it-admin/employee-details/account-update/{id}', [ItAdminController::class, 'employeeupdateaccount'])->name('it_employeeupdateaccount');
    Route::post('/it-admin/employee-details/save-account-update/{id}', [ItAdminController::class, 'employeesaveupdateaccount'])->name('it_employeesaveupdateaccount');

    Route::post('/it-admin/add-employee', [ItAdminController::class, 'addEmployee'])->name('it_addEmployee');


    Route::get('/it-admin/download-payslip/{id}', [ItAdminController::class, 'edownloadpayslip'])->name('it_admindownload');

    Route::post('/it-admin/attendance_filter', [ItAdminController::class, 'attendance_filter'])->name('it_filter_date_attendance');

    Route::post('/it-admin/save_overtime', [ItAdminController::class, 'save_overtime'])->name('it_save_overtime');

    Route::post('/it-admin/save_undertime', [ItAdminController::class, 'save_undertime'])->name('it_save_undertime');

    Route::post("/it-admin-punch-in",[ItAdminController::class,'punchin'])->name('it_punchin');
    Route::post("/it-admin-punch-out",[ItAdminController::class,'punchout'])->name('it_punchout');
    Route::post("/it-admin-leave",[ItAdminController::class,'leaver'])->name('it_leaver');

    Route::post('/it-admin/change-details', [ItAdminController::class, 'change_details'])->name('it_change_details');

    Route::get('/it-admin/export-month', [ItAdminController::class, 'month_export'])->name('itadmin.att.export');

    Route::get('/it-admin/export-dtr', [ItAdminController::class, 'print_dtr'])->name('itadmin.att.dtr');
});










Route::get('/payroll-officer/settings', function () {
    $user = Auth::user();

    return view('payroll_officer.settings',compact('user'));
})->middleware(['auth', 'user-role:payroll officer']);

Route::get('/payroll-officer/all-employee-attendance', function () {
    $user = Auth::user();
    $getAttendance = Attendance::whereDate('punched_in', Carbon::today())
    ->orderBy('punched_in', 'desc')
    ->get();
    $departments = Department::all();

    return view('payroll_officer.employees.allattendance',compact('user','getAttendance','departments'));
})->middleware(['auth', 'user-role:payroll officer']);

Route::get('/payroll-officer/designation', function () {
    $user = Auth::user();
    $designations = Designation::all();

    return view('payroll_officer.employees.designation', compact('user','designations'));
})->middleware(['auth', 'user-role:payroll officer']);

Route::get('/payroll-officer/departments', function () {
    $user = Auth::user();
    $departments = Department::all();

    return view('payroll_officer.employees.departments', compact('user','departments'));
})->middleware(['auth', 'user-role:payroll officer']);

Route::get('/payroll-officer/employment-stat', function () {
    $user = Auth::user();

    $employees = User::where('role', '!=', '0')->orderBy('employment_id','asc')->get();
    $emp_stat = EmploymentStatus::all();

    return view('payroll_officer.employees.employmentstatus', compact('employees','user','emp_stat'));
})->middleware(['auth', 'user-role:payroll officer']);

Route::get('/payroll-officer/payrunpayroll', function () {
    $payrolls = Payrun::orderBy('created_at', 'desc')->get();
    $user = Auth::user();

    return view('payroll_officer.payroll.payrunpayroll', compact('payrolls','user'));
})->middleware(['auth', 'user-role:payroll officer'])->name('hr_payrunview');


Route::get('/payroll-officer/manualpayrun', function () {
    $payrolls = Payrun::all();
    $user = Auth::user();

    return view('payroll_officer.payroll.manualpayrun', compact('payrolls','user'));
})->middleware(['auth', 'user-role:payroll officer']);

Route::get('/payroll-officer/payslippayroll', function () {
    $employee_payslips = Payslip::where('condition', '!=', 'not sent')->orderBy('created_at', 'desc')->get();
    $user = Auth::user();

    return view('payroll_officer.payroll.payslippayroll', compact('employee_payslips','user'));
})->middleware(['auth', 'user-role:payroll officer'])->name('payroll_officer.payslips.index');

Route::get('/payroll-officer/daily-log', function () {
    $user = Auth::user();
    $departments = Department::all();
    $getAttendance = Attendance::where('user_id', '=', Auth::user()->id)->orderBy('created_at', 'desc')->get();

    return view('payroll_officer.attendance.dailylog',compact('user', 'departments', 'getAttendance'));
})->middleware(['auth', 'user-role:payroll officer']);

Route::get('/payroll-officer/attendance-request', function () {
    $user = Auth::user();
    $departments = Department::all();

    return view('payroll_officer.attendance.attendancereq',compact('user', 'departments'));
})->middleware(['auth', 'user-role:payroll officer']);

Route::get('/payroll-officer/overtimes', function () {
    $user = Auth::user();

    $leaves = Overtime::where('employee_id','!=',$user->id)->orderBy('created_at','desc')->get();

    return view('payroll_officer.requests.overtimerequest',compact('user', 'leaves'));
})->middleware(['auth', 'user-role:payroll officer']);

Route::get('/payroll-officer/undertimes', function () {
    $user = Auth::user();

    $leaves = Undertime::where('employee_id', '!=', $user->id)->orderBy('created_at', 'desc')
    ->get();

    return view('payroll_officer.requests.undertimerequest',compact('user', 'leaves'));
})->middleware(['auth', 'user-role:payroll officer']);

Route::get('/payroll-officer/attendance', function () {
    $user = Auth::user();

    $getAttendance = Attendance::where('user_id', '=', Auth::user()->id)->whereDate('created_at', '>=', Carbon::now()->startOfMonth()->setTimezone('Asia/Manila'))
    ->where('created_at', '<=', Carbon::now()->endOfMonth()->setTimezone('Asia/Manila'))->get();

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

    $monthSearch = 'false';

    return view('payroll_officer.jobdesk.attendance', compact('totalActiveHours','getAttendance', 'user', 'monthSearch'));
})->middleware(['auth', 'user-role:payroll officer']);

Route::get('/payroll-officer/leave', function () {
    $user = Auth::user();

    $leaves = Leave::where('user_id', '=', Auth::user()->id)->get();
    return view('payroll_officer.jobdesk.leave', compact('leaves', 'user'));
})->middleware(['auth', 'user-role:payroll officer']);

Route::get('/payroll-officer/job-history', function () {
    $user = Auth::user();
    $departments = Department::all();
    $shifts = Shift::all();
    $designations = Designation::all();
    $estatus = EmploymentStatus::all();

    return view('payroll_officer.jobdesk.jobhistory', compact('user', 'departments', 'shifts', 'designations', 'estatus'));
})->middleware(['auth', 'user-role:payroll officer']);

Route::get('/payroll-officer/salary-overview', function () {
    $user = Auth::user();

    return view('payroll_officer.jobdesk.salaryoverview', compact('user'));
})->middleware(['auth', 'user-role:payroll officer']);

Route::get('/payroll-officer/payslip', function () {
    $user = Auth::user();

    $payslip = Payslip::where('user_id', '=', Auth::user()->id)->get();

    return view('payroll_officer.jobdesk.payslip', compact('payslip','user'));
})->middleware(['auth', 'user-role:payroll officer']);

Route::get('/payroll-officer/leavestat', function () {
    $user = Auth::user();

    $leaves = Leave::where('user_id', '=', Auth::user()->id)->where('status', '!=', 'Pending')->orderBy('created_at', 'desc')
    ->get();

    return view('payroll_officer.leave.leavestatus',compact('user', 'leaves'));
})->middleware(['auth', 'user-role:payroll officer']);

Route::get('/payroll-officer/leave-request', function () {
    $user = Auth::user();
    $departments = Department::all();

    $leaverequests = Leave::where('status', '!=', 'Approved')
    ->where('status', '!=', 'Disapproved')->orderBy('created_at', 'desc')
    ->get();
    
    return view('payroll_officer.leave.leavereq',compact('user', 'departments', 'leaverequests'));
})->middleware(['auth', 'user-role:payroll officer']);

Route::get('/payroll-officer/contributions', function () {
    $user = Auth::user();
    $contributions = ContributionSetting::all();

    return view('payroll_officer.employees.pagibigphilhealth', compact('user','contributions'));
})->middleware(['auth', 'user-role:payroll officer']);

Route::get('/payroll-officer/holidays', function () {
    $user = Auth::user();
    $holidays = HolidayPaymentIncrease::all();

    return view('payroll_officer.employees.holidays', compact('user','holidays'));
})->middleware(['auth', 'user-role:payroll officer']);

Route::get('/payroll-officer/sss-table', function () {
    $user = Auth::user();
    $sss = SssTable::orderBy('min_amount', 'asc')->get();

    return view('payroll_officer.employees.ssstable', compact('user','sss'));
})->middleware(['auth', 'user-role:payroll officer']);


Route::get('/payroll-officer/user-deductions', function () {
    $user = Auth::user();

    $employees = User::where('role', '!=', '0')->orderBy('employment_id','asc')->get();
    $emp_stat = EmploymentStatus::all();

    return view('payroll_officer.employees.deductions', compact('employees','user','emp_stat'));
})->middleware(['auth', 'user-role:payroll officer']);


Route::get('/payroll-officer/user-manage/{id}/deduction-modal', function ($id) {
    $employee = User::findOrFail($id);
    $deductions = DeductionReal::where('employee_id','=',$employee->id)->get();

    // Render the modal body as plain HTML
    return view('payroll_officer.modal.adddeduction', ['employee' => $employee,'deductions'=> $deductions]);
});


Route::middleware(['auth', 'user-role:payroll officer'])->group(function()
{
    Route::get('/payroll-officer-dashboard', [PayrollOfficerController::class, 'home'])->name('payrollofficer.home');

    Route::get('/payroll-officer/leave-allowance', [PayrollOfficerController::class, 'leaveallowance'])->name('hr_leaveallowance');

    Route::post("/payroll-officer-punch-in",[PayrollOfficerController::class,'punchin'])->name('hr_punchin');
    Route::post("/payroll-officer-punch-out",[PayrollOfficerController::class,'punchout'])->name('hr_punchout');

    Route::post('/payroll-officer/search/attendance', [PayrollOfficerController::class, 'filterDateAttendanceAdmin'])->name('hr_attendance_search');
    Route::get('/payroll-officer/export_all', [PayrollOfficerController::class, 'exportAll'])->name('hr_exportAll');
    Route::get('/payroll-officer/solo-export/{export}', [PayrollOfficerController::class, 'soloexport'])->name('hr_soloexport');

    Route::post('/payroll-officer/add-designation', [PayrollOfficerController::class, 'add_designation'])->name('hr_add_designation');
    Route::post('/payroll-officer/edit-designation', [PayrollOfficerController::class, 'edit_designation'])->name('hr_edit_designation');
    Route::get('/payroll-officer/delete-designation/{designation_id}', [PayrollOfficerController::class, 'delete_designation'])->name('hr_delete_designation');

    Route::post('/payroll-officer/edit-department', [PayrollOfficerController::class, 'edit_department'])->name('hr_edit_department');
    Route::post('/payroll-officer/add-department', [PayrollOfficerController::class, 'add_department'])->name('hr_add_department');
    Route::get('/payroll-officer/delete-department/{department_id}', [PayrollOfficerController::class, 'delete_department'])->name('hr_delete_department');

    Route::get('/payroll-officer/search/employee', [PayrollOfficerController::class, 'filterEmployeeSearch'])->name('hr_employee_search');
    Route::post('/payroll-officer/add-employment-status', [PayrollOfficerController::class, 'add_employment_status'])->name('hr_add_employment_status');
    Route::post('/payroll-officer/edit-employment-status', [PayrollOfficerController::class, 'edit_employment_status'])->name('hr_edit_employment_status');

    Route::post("/payroll-officer/payrun",[PayrollOfficerController::class,'payrun'])->name('hr_adminpayrun');
    Route::post('/payroll-officer/send-payslip/{payrun}', [PayrollOfficerController::class, 'sendpayslip'])->name('hr_sendpayslip');
    Route::get('/payroll-officer/payslips/{payrun}', [PayrollOfficerController::class, 'payslipsview'])->name('hr_adminpayslip');
    Route::post('/payroll-officer/payslips/search', [PayrollOfficerController::class, 'searchpayslip'])->name('searchpayslip');

    Route::get('/payroll-officer/download-payslip/{id}', [PayrollOfficerController::class, 'downloadpayslip'])->name('hr_download');

    Route::get('/payroll-officer/recalculate-payslip/{id}', [PayrollOfficerController::class, 'recalculate'])->name('hr_recalculate');
    Route::post('/payroll-officer/recalculate-payslip/{id}', [PayrollOfficerController::class, 'saverecalculate'])->name('hr_saverecalculate');

    Route::post('/payroll-officer/import', [PayrollOfficerController::class, 'import'])->name('hr_import');

    Route::get('/payroll-officer/approve-undertime/{undertime}', [PayrollOfficerController::class, 'approveundertime'])->name('hr_approveundertime');
    Route::get('/payroll-officer/disapprove-undertime/{undertime}', [PayrollOfficerController::class, 'disapproveundertime'])->name('hr_disapproveundertime');

    Route::get('/payroll-officer/approve-overtime/{overtime}', [PayrollOfficerController::class, 'approveovertime'])->name('hr_approveovertime');
    Route::get('/payroll-officer/disapprove-overtime/{overtime}', [PayrollOfficerController::class, 'disapproveovertime'])->name('hr_disapproveovertime');

    Route::post('/payroll-officer/attendance_filter', [PayrollOfficerController::class, 'attendance_filter'])->name('hr_filter_date_attendance_admin');

    Route::post('/payroll-officer/change-details', [PayrollOfficerController::class, 'change_details'])->name('hr_change_details');

    Route::get('/payroll-officer/export-month', [PayrollOfficerController::class, 'month_export'])->name('payrollofficer.att.export');

    Route::get('/payroll-officer/export-dtr', [PayrollOfficerController::class, 'print_dtr'])->name('payrollofficer.att.dtr');

    Route::post("/payroll-officer-leave",[PayrollOfficerController::class,'leaver'])->name('payrollofficer_leaver');

    Route::post('/payroll-officer/add-holiday', [PayrollOfficerController::class, 'add_holiday'])->name('hr_add_holiday');
    Route::post('/payroll-officer/edit-holiday', [PayrollOfficerController::class, 'edit_holiday'])->name('hr_edit_holiday');
    Route::get('/payroll-officer/delete-holiday/{holiday_id}', [PayrollOfficerController::class, 'delete_holiday'])->name('hr_delete_holiday');

    Route::post('/payroll-officer/edit-contribution', [PayrollOfficerController::class, 'edit_contribution'])->name('hr_edit_contribution');

    Route::post('/payroll-officer/add-sss-table', [PayrollOfficerController::class, 'add_sssrange'])->name('hr_add_sssrange');
    Route::post('/payroll-officer/edit-sss-table', [PayrollOfficerController::class, 'edit_sssrange'])->name('hr_edit_sssrange');
    Route::get('/payroll-officer/delete-sss-table/{sss_id}', [PayrollOfficerController::class, 'delete_sssrange'])->name('hr_delete_sssrange');

    Route::get('/payroll-officer/search/update-user', [PayrollOfficerController::class, 'filterEmployeeSearchUpdate'])->name('hr_employee_update_search');

    Route::post('/payroll-officer/add-deduction', [PayrollOfficerController::class, 'add_deduction'])->name('hr_add_deduction');
    Route::get('/payroll-officer/delete-deduction/{deduction_id}', [AdminController::class, 'delete_deduction'])->name('hr_delete_deduction');
});































Route::middleware(['auth', 'user-role:director'])->group(function()
{
    Route::get('/director-dashboard', [DirectorController::class, 'home'])->name('director.home');
});

require __DIR__.'/auth.php';

Auth::routes();