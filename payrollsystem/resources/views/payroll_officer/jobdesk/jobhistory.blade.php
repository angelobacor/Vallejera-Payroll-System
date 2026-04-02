@extends('payroll_officer.layouts.sidebar')

@section('username')
{{$user->name}}
@endsection@section('content')

@section('content')
@include('payroll_officer.modal.departmentJH')
@include('payroll_officer.modal.workshiftJH')
@include('payroll_officer.modal.designationJH')
@include('payroll_officer.modal.employementstatJH')

<div class="h-full ml-14 mt-14 mb-5 md:ml-64">
    <div class="flex items-center justify-between mt-5 ml-2">
        <h1 class="text-2xl flex-grow">Job History</h1>
    </div> 

    <div class="border-t border-gray-300 w-full mt-4 mb-4"></div>

    <div class="flex-1 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
    <div class="relative flex items-center">
            <div class="flex-1 m-5">
                <h2 class="font-semibold ">Department</h2>
                <button onclick="toggleModal()" class="text-blue-500 hover:underline" data-department="{{$departments}}">Change</button>                </div>
    <div class="flex flex-col items-center ml-2">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 0 0 .75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 0 0-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0 1 12 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 0 1-.673-.38m0 0A2.18 2.18 0 0 1 3 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 0 1 3.413-.387m7.5 0V5.25A2.25 2.25 0 0 0 13.5 3h-3a2.25 2.25 0 0 0-2.25 2.25v.894m7.5 0a48.667 48.667 0 0 0-7.5 0M12 12.75h.008v.008H12v-.008Z" />
        </svg>

        <div class="border-l border-gray-400 h-20"></div>
    </div>
    
</div>

        <div class="relative p-3 m-3 border bg-gray-200">
            <p class="font-semibold">{{$user->department->department_name}}</p>
            <p class="text-gray-500">16-11-2023</p>
            <p class="text-blue-500 font-semibold">Present</p>
        </div>

    </div>
    
    <div class="flex-1 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
    <div class="relative flex items-center">
            <div class="flex-1 m-5">
                <h2 class="font-semibold ">Work Shift</h2>
                <button onclick="WorkingShift()" data-shift="{{$shifts}}" class="text-blue-500 hover:underline">Change</button>
            </div>
    <div class="flex flex-col items-center ml-2">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
        </svg>


        <div class="border-l border-gray-400 h-20"></div>
    </div>
    
</div>

        <div class="relative p-1 m-3 border bg-gray-200 inline-block">
            <p class="font-semibold">{{$user->shift->shift_name}}</p>
        </div>

    </div>

    <div class="flex-1 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
    <div class="relative flex items-center">
            <div class="flex-1 m-5">
                <h2 class="font-semibold ">Designation</h2>
                <button onclick = "designation()" data-designation="{{$designations}}" class="text-blue-500 hover:underline">Change</button>
            </div>
    <div class="flex flex-col items-center ml-2">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 18.75h-9m9 0a3 3 0 0 1 3 3h-15a3 3 0 0 1 3-3m9 0v-3.375c0-.621-.503-1.125-1.125-1.125h-.871M7.5 18.75v-3.375c0-.621.504-1.125 1.125-1.125h.872m5.007 0H9.497m5.007 0a7.454 7.454 0 0 1-.982-3.172M9.497 14.25a7.454 7.454 0 0 0 .981-3.172M5.25 4.236c-.982.143-1.954.317-2.916.52A6.003 6.003 0 0 0 7.73 9.728M5.25 4.236V4.5c0 2.108.966 3.99 2.48 5.228M5.25 4.236V2.721C7.456 2.41 9.71 2.25 12 2.25c2.291 0 4.545.16 6.75.47v1.516M7.73 9.728a6.726 6.726 0 0 0 2.748 1.35m8.272-6.842V4.5c0 2.108-.966 3.99-2.48 5.228m2.48-5.492a46.32 46.32 0 0 1 2.916.52 6.003 6.003 0 0 1-5.395 4.972m0 0a6.726 6.726 0 0 1-2.749 1.35m0 0a6.772 6.772 0 0 1-3.044 0" />
        </svg>


        <div class="border-l border-gray-400 h-20"></div>
    </div>
    
</div>

        <div class="relative p-3 m-3 border bg-gray-200">
            <p class="font-semibold">{{$user->designation->designation_name}}</p>
            <p class="text-gray-500">16-11-2023</p>
            <p class="text-blue-500 font-semibold">Present</p>
        </div>

    </div>
    
    <div class="flex-1 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
    <div class="relative flex items-center">
            <div class="flex-1 m-5">
                <h2 class="font-semibold ">Employment Status</h2>
                <button onclick="employmentstatus()" data-estatus="{{$estatus}}" class="text-blue-500 hover:underline">Change</button>
            </div>
    <div class="flex flex-col items-center ml-2">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
        </svg>



        <div class="border-l border-gray-400 h-20"></div>
    </div>
    
</div>

        <div class="relative p-3 m-3 border bg-gray-200">
            <p class="font-semibold">{{$user->employment->status}}</p>
            <p class="text-gray-500">16-11-2023</p>
            <p class="text-blue-500 font-semibold">Present</p>
        </div>

    </div>

    <div class="flex-1 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
    <div class="relative flex items-center">
            <div class="flex-1 m-5">
                <h2 class="font-semibold ">Role</h2>
                <!-- <button onclick="toggleModal()" class="text-blue-500 hover:underline">Change</button> -->
            </div>
    <div class="flex flex-col items-center ml-2">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3 3v1.5M3 21v-6m0 0 2.77-.693a9 9 0 0 1 6.208.682l.108.054a9 9 0 0 0 6.086.71l3.114-.732a48.524 48.524 0 0 1-.005-10.499l-3.11.732a9 9 0 0 1-6.085-.711l-.108-.054a9 9 0 0 0-6.208-.682L3 4.5M3 15V4.5" />
        </svg>

        <div class="border-l border-gray-400 h-20"></div>
    </div>
    
</div>

        <div class="relative p-3 m-3 border bg-gray-200">
            <p class="font-semibold">{{$user->role}}</p>
            <p class="text-blue-500 font-semibold">Present</p>
        </div>

    </div>

    <div class="flex-1 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
    <div class="relative flex items-center">
            <div class="flex-1 m-5">
                <h2 class="font-semibold ">Joining Date</h2>
                <!-- <button onclick="toggleModal()" class="text-blue-500 hover:underline">Change</button> -->
            </div>
    <div class="flex flex-col items-center ml-2">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" className="size-6">
            <path strokeLinecap="round" strokeLinejoin="round" d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 5.25h.008v.008H12v-.008Z" />
        </svg>



        <div class="border-l border-gray-400 h-20"></div>
    </div>
    
</div>

        <div class="relative p-1 m-3 border bg-gray-200 inline-block">
            <p class="font-semibold">{{$user->joining_date}}</p>
        </div>

    </div>


</div>

@endsection
