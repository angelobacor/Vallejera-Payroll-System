@extends('payroll_officer.layouts.sidebar')
@section('username')
{{$user->name}}
@endsection
@section('content')
@include('payroll_officer.jobdesk.Modal.addattendance')
@include('payroll_officer.jobdesk.Modal.assignleave')

<div class="h-full ml-14 mt-14 mb-5 md:ml-64 flex">
    <!-- Sidebar for Job Desk -->
    <div class="w-64 border border-gray-300 bg-white rounded-lg shadow-md p-4">
        <h2 class="text-lg font-semibold">Job Desk</h2>
        <ul class="mt-2">
            @foreach ([
                'employeeleaveallowance' => 'Leave Allowance',
                'employeeattendance' => 'Attendance',
                'employeeleave' => 'Leave',
                'employeedocuments' => 'Documents',
                'employeeassets' => 'Assets',
                'employeejobhistory' => 'Job History',
                'employeesalaryoverview' => 'Salary Overview',
                'employeepayslip' => 'Payslip',
                'employeeaddressdetails' => 'Address Details',
                'employeeupdateaccount' => 'Update Account',
            ] as $link => $text)
                <li class="flex items-center h-11 focus:outline-none hover:bg-blue-800 text-gray-800 hover:text-white border-l-4 border-transparent hover:border-blue-500 pr-6">
                    <a href="{{ route($link, $employee->id) }}" onclick="showNextPage()" class="flex-grow">
                        <span class="ml-2 text-sm tracking-wide truncate">{{ $text }}</span>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>

    <!-- Main Content Area -->
    <div class="flex-grow ml-6">
        <h1 class="text-2xl mt-5">Job Desk</h1>
        
        <!-- Action Button -->
        <div class="absolute top-0 right-0 mt-20 mr-4">
            <div class="relative">
                <button onclick="toggleAccordion(event)" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600 focus:outline-none">
                    Action
                    <svg class="w-5 h-5 inline ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <ul id="accordionContent" class="hidden accordion-content pl-12">
                    <div class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none">
                        <div class="py-1" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                            <a href="#" onclick="addattendance()" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Add Attendance</a>
                            <a href="#" onclick="assignleave()" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Assigned Leave</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Terminate</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Edit Salary</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Add Joining Date</a>
                        </div>
                    </div>
                </ul>
            </div>
        </div>

        <!-- Profile Information Rectangle -->
        <div class="flex items-center p-4 bg-white shadow rounded-half border mt-16 h-60">
            <!-- Left Section -->
            <div class="flex items-center justify-center mr-10">
                <div class="w-24 h-24 rounded-full overflow-hidden">
                    <img src="https://therminic2018.eu/wp-content/uploads/2018/07/dummy-avatar.jpg" alt="Profile Picture" class="w-full h-full object-cover rounded-full">
                </div>
            </div>

            <!-- Middle Section -->
            <div class="flex-1 flex-col items-center justify-center">
                <h2 class="text-xl font-bold">{{$employee->name}}</h2>
                <p class="text-gray-600">{{$employee->role}}</p>
                <p class="text-gray-600">{{$employee->id}}</p>
                <p class="text-gray-600">{{$employee->designation->designation_name}}</p>
            </div>

            <div class="border-l border-gray-300 h-full"></div>

            <div class="flex-1 flex flex-col ml-5">
                <div class="flex items-center mb-4">
                    <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 0 0 .75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 0 0-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0 1 12 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 0 1-.673-.38m0 0A2.18 2.18 0 0 1 3 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 0 1 3.413-.387m7.5 0V5.25A2.25 2.25 0 0 0 13.5 3h-3a2.25 2.25 0 0 0-2.25 2.25v.894m7.5 0a48.667 48.667 0 0 0-7.5 0M12 12.75h.008v.008H12v-.008Z"></path>
                    </svg>
                    <div class="ml-2">
                        <p class="text-black-600">Department</p>
                        <p class="text-gray-500">{{$employee->department->department_name}}</p>
                    </div>
                </div>

                <div class="flex items-center">
                    <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"></path>
                    </svg>
                    <div class="ml-2">
                        <div class="flex items-center">
                            <p class="text-black-600">Work Shift</p>
                            <a href="#" class="ml-2 px-4 py-1 border border-blue-400 text-blue-400 rounded-full bg-transparent">View</a>
                        </div>
                        <p class="text-gray-500">{{$employee->shift->shift_name}}</p>
                    </div>
                </div>
            </div>

            <div class="border-l border-gray-300 h-full"></div>

            <div class="flex-1 flex flex-col ml-5">
                <div class="flex items-center mb-4">
                    <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v12m-3-2.818.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"></path>
                    </svg>
                    <div class="ml-2">
                        <p class="text-black-600">Salary</p>
                        <div class="flex items-center">
                            <p class="text-gray-500">{{$employee->salary}}</p>
                            <a href="#" class="px-2 text-blue-600">(current)</a>
                        </div>
                    </div>
                </div>

                <div class="flex items-center">
                    <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5"></path>
                    </svg>
                    <div class="ml-2">
                        <p class="text-black-600">Joining Date</p>
                        <p class="text-gray-500">{{$employee->joining_date}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection