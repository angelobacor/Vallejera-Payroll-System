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
 @include('payroll_officer.attendance.Modal.addattendanceModal')

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

<div class="h-full ml-14 mt-14 mb-5 md:ml-64">
    <div class="flex items-center justify-between mt-5 ml-2">
            <h1 class="text-2xl flex-grow font-semibold">All Attendance</h1>
            <div class="flex space-x-4 m-2 items-center">
                <button onclick="downloadExport()" class="bg-orange-500 text-white px-4 py-2 rounded-md hover:bg-orange-600 focus:outline-none focus:ring-2 focus:ring-orange-400 transition duration-200">
                    Export All
                </button>

                <!-- <button onclick="AddAttendance(event)" data-department="{{$departments}}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none">
                    Add Attendance
                </button> -->
            </div>
        </div>

    <!-- Filters -->
    <div class="mt-6 ml-2 flex flex-wrap gap-2">
        <button class="text-gray-600 focus:outline-none">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"></path>
            </svg>
        </button>
        <div class="flex space-x-4 w-full items-center">
                <!-- Search Form -->
                <form action="{{ route('attendance_search') }}" method="POST" enctype="multipart/form-data" class="flex items-center space-x-3">
                    @csrf

                    <select id="searchType" name="filter" class="form-control w-auto p-2 border border-gray-500 rounded-md">
                        <option value="Date">Date</option>
                        <option value="Month">Month</option>
                        <option value="Name" selected>Name</option>
                    </select>

                    <input 
                        type="text" 
                        name="attendance_search" 
                        id="searchInput" 
                        class="form-control p-2 border border-gray-300 rounded-md w-64" 
                        placeholder="Search Attendance"
                    />

                    <button 
                        type="submit" 
                        id="searchButton"
                        class="ml-2 btn btn-primary px-4 py-2 rounded-md"
                    >
                        Search
                    </button>
                </form>



                <!-- Import Form -->
                <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data" class="flex items-center space-x-2" style="margin-left:25%">
                    @csrf
                    <input type="file" name="file" required class="p-2 text-gray-700 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 transition duration-200" />
                    <button type="submit" class="font-semibold text-red-600 hover:underline focus:outline-none">
                        Import
                    </button>
                </form>
            </div>
    </div>
    <div id="attendance_div">
        @include('admin.employees.attendance_list')
    </div>
</div>

<script>
function downloadExport() {
    fetch("{{ route('exportAll') }}", {
        method: 'GET',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
        }
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Failed to export');
        }
        return response.blob();
    })
    .then(blob => {
        const link = document.createElement('a');
        link.href = window.URL.createObjectURL(blob);
        link.download = 'attendance.xlsx';  
        link.click();
    })
    .catch(error => {
        console.error('Error during export:', error);
        alert('An error occurred: ' + error);
    });
}
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const select = document.getElementById('searchType');
        const input = document.getElementById('searchInput');
        const button = document.getElementById('searchButton');

        function updateInputAndButton() {
            const selected = select.value;

            if (selected === 'Date') {
                input.type = 'date';
                input.placeholder = 'Select Date';
                button.textContent = 'Filter';
            } else if (selected === 'Month') {
                input.type = 'month';
                input.placeholder = 'Select Month';
                button.textContent = 'Filter';
            } else if (selected === 'Name') {
                input.type = 'text';
                input.placeholder = 'Search by Name';
                button.textContent = 'Search';
            }
        }

        // Update immediately on load
        updateInputAndButton();

        // Listen for changes
        select.addEventListener('change', updateInputAndButton);
    });
</script>

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
