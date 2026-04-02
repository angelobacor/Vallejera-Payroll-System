@extends('it_admin.layouts.sidebar')

@section('username')
    {{$user->name}}
@endsection

@section('content')
@include('it_admin.modal.employeesmodal.inviteemployee')
@include('it_admin.modal.employeesmodal.addemployee')
@include('it_admin.modal.employeesmodal.CreatedModal')
@include('it_admin.modal.employeesmodal.joiningdate')
@include('it_admin.modal.employeesmodal.designation')
@include('it_admin.modal.employeesmodal.employmentstat')
@include('it_admin.modal.employeesmodal.department')

<style>
    #flash-message {
        position: fixed;
        top: 20px;
        right: 20px;
        z-index: 9999;
        padding: 15px 25px;
        border-radius: 4px;
        background-color: #85e2a4ff; /* red */
        color: black;
        box-shadow: 0 2px 6px rgba(84, 84, 84, 1);
        opacity: 1;
        transition: opacity 0.5s ease;
    }

    #flash-message-2 {
        position: fixed;
        top: 20px;
        right: 20px;
        z-index: 9999;
        padding: 15px 25px;
        border-radius: 4px;
        background-color: #88d6f3ff; /* red */
        color: black;
        box-shadow: 0 2px 6px rgba(84, 84, 84, 1);
        opacity: 1;
        transition: opacity 0.5s ease;
    }

    #flash-message-3 {
        position: fixed;
        top: 20px;
        right: 20px;
        z-index: 9999;
        padding: 15px 25px;
        border-radius: 4px;
        background-color: #ed8383ff; /* red */
        color: black;
        box-shadow: 0 2px 6px rgba(84, 84, 84, 1);
        opacity: 1;
        transition: opacity 0.5s ease;
    }
</style>

<div class="h-full ml-14 mt-14 mb-5 md:ml-64 overflow-x-hidden"> <!-- overflow-x-hidden added -->
    <div class="flex items-center justify-between mt-5 ml-2">
        <!-- Heading -->
        <h1 class="text-2xl flex-grow font-semibold">All Employees</h1>

        <!-- Buttons -->
        <div class="flex space-x-4 m-2">
            <div>
                <button onclick="AddEmployee(event)" 
                        data-estatus="{{$estatus}}" 
                        data-designation="{{$designations}}" 
                        data-shift="{{$shifts}}" 
                        data-department="{{$departments}}" 
                        class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500">
                    Add User
                </button>
            </div>
        </div>
    </div>

    @if (session('success'))
        <div id="flash-message" class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div id="flash-message-3" class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    {{-- show validation errors --}}
    @error('email')
        <div id="flash-message-3" class="alert alert-info">
            {{ $message }}
        </div>
    @enderror

    @error('employee_id')
        <div id="flash-message-3" class="alert alert-info">
            {{ $message }}
        </div>
    @enderror
    
    <!-- Employee Cards Grid -->
    <div class="grid grid-cols-4 gap-4 mt-6 ml-2 mr-2"> <!-- grid layout with 4 columns -->
        @if($employees->count() > 0)
            @foreach($employees as $employee)
                <div>
                    <div class="border border-gray-300 bg-white p-4 flex flex-col justify-between relative rounded-lg shadow-md h-full">
                        <!-- Options Button -->
                        <button class="absolute top-2 right-2 text-gray-600 hover:text-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-500">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.625 12a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H8.25m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H12m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0h-.375M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                        </button>

                        <!-- Employee Info -->
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
                            <a href="{{ route('it_employeedetails', $employee->id) }}" class="text-blue-500 hover:underline text-xs focus:outline-none">
                                View Details
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>

<script>
    window.addEventListener('DOMContentLoaded', (event) => {
        const flash = document.getElementById('flash-message');
        const flash2 = document.getElementById('flash-message-2');
        const flash3 = document.getElementById('flash-message-3');
        if (flash || flash2 || flash3) {
            // Wait 4 seconds then fade out
            [flash, flash2, flash3].forEach(el => {
                if (!el) return;            // skip if it doesn't exist
                setTimeout(() => {
                    el.style.transition = 'opacity 0.5s'; // ensure smooth fade
                    el.style.opacity = '0';
                    setTimeout(() => el.remove(), 500);   // remove after fade
                }, 1500);
            });
        }
    });
</script>
@endsection
