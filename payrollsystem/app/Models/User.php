<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Casts\Attribute;
use App\Models\EmploymentStatus;
use App\Models\Department;
use App\Models\Shift;
use App\Models\Designation;
use App\Models\Attendance;
use App\Models\DeductionReal;
use Carbon\Carbon;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'employee_id',
        'password',
        'salary',
        'department_id',
        'shift_id',
        'designation_id',
        'employment_id',
        'payment_method',
        'joining_date',
        'role',
        'leave_count',
        'update_leave_count',
        'profile_img'
    ];

    public function employment()
    {
        return $this->belongsTo(EmploymentStatus::class, 'employment_id', 'id');
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id', 'id');
    }

    public function shift()
    {
        return $this->belongsTo(Shift::class, 'shift_id', 'id');
    }

    public function designation()
    {
        return $this->belongsTo(Designation::class, 'designation_id', 'id');
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }

    public function deductions()
    {
        return $this->hasMany(DeductionReal::class, 'employee_id','id')->where('expected_end_date', '>=', Carbon::today());
    }

    public function deductionsByRange($monthRange)
    {
        $parts = explode(' ', $monthRange);

        $endDay = $parts[2];      
        $month  = $parts[3];      
        $year   = $parts[4];      

        $endDate = Carbon::parse("$endDay $month $year");

        return $this->hasMany(DeductionReal::class, 'employee_id', 'id')
                    ->where('expected_end_date', '>=', $endDate->subDay());
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'update_leave_count' => 'date',
    ];

    protected function role(): Attribute {
        return new Attribute(
            get:fn($value) => ["admin", "employee", "director","it admin","payroll officer"][$value],
        );
    }
}
