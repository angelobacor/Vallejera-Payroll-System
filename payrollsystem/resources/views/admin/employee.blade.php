@extends('admin.layouts.sidebar')

@section('username')
{{$user->name}}
@endsection@section('content')

@section('content')
@include('admin.modal.employeesmodal.inviteemployee')
@include('admin.modal.employeesmodal.addemployee')
@include('admin.modal.employeesmodal.CreatedModal')
@include('admin.modal.employeesmodal.joiningdate')
@include('admin.modal.employeesmodal.designation')
@include('admin.modal.employeesmodal.employmentstat')
@include('admin.modal.employeesmodal.department')


<div class="h-full ml-14 mt-14 mb-5 md:ml-64">
    <div class="flex items-center justify-between mt-5 ml-2">
        
        
        <!-- Heading -->
        <h1 class="text-2xl flex-grow">All Employees</h1>

        
        <!-- Buttons -->
        <div class="flex space-x-4 m-2">
        <div>
                <button onclick="AddEmployee(event)" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500">
                    Add Employee
                </button>
            </div>
            <div>
                <button onclick="InviteEmployee(event)" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Invite Employee
                </button>
            </div>
        </div>
    </div>

    
    <div class="mt-6 ml-2 flex flex-wrap gap-2">
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
    </div>

    <div class="mt-6 ml-2 grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="border border-gray-300 bg-white p-4 flex flex-col justify-between relative rounded-lg shadow-md max-w-sm">
            <button class="absolute top-2 right-2 text-gray-600 hover:text-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-500">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.625 12a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H8.25m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H12m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0h-.375M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
            </button>

           
            <div class="flex justify-center mb-4">
                <img src="https://therminic2018.eu/wp-content/uploads/2018/07/dummy-avatar.jpg" alt="Profile Picture" class="rounded-full w-16 h-16 object-cover">
            </div>

            <div class="text-center mb-2">
                <p class="font-semibold text-sm">John Doe</p>
                <p class="text-gray-500 text-xs">Senior Developer</p>
                <p class="text-gray-500 text-xs">EMP-3</p>
            </div>

            <!-- Details -->
            <div class="text-center mb-4">
                <p class="text-xs">
                    <span class="inline-block px-2 py-1 rounded-full bg-orange-500 text-white">Permanent</span>
                </p>
                <p class="text-xs text-gray-600"><span class="font-semibold">Department:</span> IT</p>
                <p class="text-xs text-gray-600"><span class="font-semibold">Shift:</span> Day Shift</p>
            </div>
            <div class="flex justify-center mt-4">
                <a href="/jobdesk" onclick="showNextPage()" class="text-blue-500 hover:underline text-xs focus:outline-none">View Details</a>
            </div>
        </div>
</div>

@endsection
