@extends('payroll_officer.layouts.sidebar')

@section('username')
{{$user->name}}
@endsection@section('content')

@section('content')
@include('payroll_officer.modal.employeesmodal.inviteemployee')
@include('payroll_officer.modal.employeesmodal.addemployee')
@include('payroll_officer.modal.employeesmodal.CreatedModal')
@include('payroll_officer.modal.employeesmodal.joiningdate')
@include('payroll_officer.modal.employeesmodal.designation')
@include('payroll_officer.modal.employeesmodal.employmentstat')
@include('payroll_officer.modal.employeesmodal.department')

<div class="h-full ml-14 mt-14 mb-5 md:ml-64">
    <div class="flex items-center justify-between mt-5 ml-2">
        <!-- Heading -->
        <h1 class="text-2xl flex-grow font-semibold">All Employees</h1>

        <!-- Buttons -->
        <div class="flex space-x-4 m-2">
            <div>
                <button onclick="AddEmployee(event)" data-estatus="{{$estatus}}" data-designation="{{$designations}}" data-shift="{{$shifts}}" data-department="{{$departments}}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500">
                    Add User
                </button>
            </div>
        </div>
    </div>

    <!-- Filters -->
    <!-- <div class="mt-6 ml-2 flex flex-wrap gap-2">
        <button class="text-gray-600 focus:outline-none">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"></path>
            </svg>
        </button>
        @foreach (['Created', 'Joining Date', 'Designation', 'Employment Status', 'Department', 'Workshift', 'Role', 'Gender', 'Salary'] as $filter)
            <button 
                class="bg-white text-gray-700 border border-gray-300 px-4 py-2 rounded-full hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-300"
                onclick="
                    @if ($filter === 'Joining Date') JoiningDate();
                    @elseif ($filter === 'Created') showCalendarModal();
                    @elseif ($filter === 'Designation') DesignationAE();
                    @elseif ($filter === 'Employment Status') EmploymentStat();
                    @elseif ($filter === 'Department') DepartmentModal();
                    @endif
                "
            >
                {{ $filter }}
            </button>
        @endforeach
    </div> -->
    <div class='row'>
   @if($employees->count() > 0)
         @foreach($employees as $employee)
            <div class="col mt-6 ml-2" style='flex: 0 20%;'>
                <div class="border border-gray-300 bg-white p-4 flex flex-col justify-between relative rounded-lg shadow-md max-w-sm">
                    <button class="absolute top-2 right-2 text-gray-600 hover:text-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.625 12a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H8.25m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H12m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0h-.375M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                    </button>

                    <div class="text-center mb-2">
                        <p class="font-semibold text-sm">{{$employee->name}}</p>
                        <p class="text-gray-500 text-xs">{{$employee->role}}</p>
                        <p class="text-gray-500 text-xs">employee_code</p>
                    </div>

                    <!-- Details -->
                    <div class="text-center mb-4">
                        <p class="text-xs">
                            <span class="inline-block px-2 py-1 rounded-full bg-orange-500 text-white">{{$employee->status}}</span>
                        </p>
                        <p class="text-xs text-gray-600"><span class="font-semibold">Department:</span> IT test</p>
                        <p class="text-xs text-gray-600"><span class="font-semibold">Shift:</span> Day Shift test</p>
                    </div>

                    <div class="flex justify-center mt-4">
                        <a href="{{route('employeedetails', $employee->id)}}" class="text-blue-500 hover:underline text-xs focus:outline-none">View Details</a>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
    </div>
</div>

@endsection
