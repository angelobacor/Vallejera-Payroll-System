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
        <h1 class="text-2xl flex-grow font-semibold">All Attendance</h1>

        <!-- Buttons -->
        <div class="flex space-x-4 m-2">
            <div>
                <!-- <button onclick="AddEmployee(event)"  class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500">
                    Import Attendance
                </button> -->
                <button onclick="downloadExport()" class="bg-orange-500 text-white px-4 py-2 rounded-md hover:bg-orange-600 focus:outline-none focus:ring-2 focus:ring-green-500">
                    Export All
                </button>
            </div>
        </div>
    </div>

    <!-- Filters -->
    <div class="mt-6 ml-2 flex flex-wrap gap-2">
        <button class="text-gray-600 focus:outline-none">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"></path>
            </svg>
        </button>
        <div class="space-x-4" style="margin-left:2%;">
        <form action="{{route('attendance_search')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
            <input style="width:200px;" type="text" name="attendance_search" class="col form-control"/>
            <button type="submit" class="col ml-2 btn btn-primary" >Search</button>
            </div>

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
@endsection
