@extends('payroll_officer.layouts.sidebar')

@section('username')
{{$user->name}}
@endsection@section('content')

@section('content')
@include('payroll_officer.Attendance.Modal.addattendanceModal')

<div class="h-full ml-14 mt-14 mb-5 md:ml-64">
    <div class="flex items-center justify-between mt-5 ml-2">
        <h1 class="text-2xl flex-grow">Daily Log</h1>
        <div class="flex space-x-4 m-2">
            <!-- <div class="mt-2">
                <a href="/attendancesettings" onclick="showNextPage()" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600 focus:outline-none">
                    Settings
                </a> 
            </div> -->
            <!-- <div>
                <button onclick="AddAttendance(event)" data-department="{{$departments}}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none">
                    Add Attendance
                </button>
            </div> -->
            <!-- <div class="relative">
                <button onclick="toggleAccordion(event)" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-800 focus:outline-none">
                    Action
                    <svg class="w-5 h-5 inline ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <ul id="accordionContent" class="hidden absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none">
                    <div class="py-1" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                        <a  href="/importattendance" onclick = "showNextPage()" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 flex items-center space-x-2" role="menuitem">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5m-13.5-9L12 3m0 0 4.5 4.5M12 3v13.5" />
                            </svg>
                            <span>Import Attendance</span>
                        </a>
                        <a href="/exportattendance" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 flex items-center space-x-2" role="menuitem">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
                            </svg>
                            <span>Export Attendance</span>
                        </a>
                    </div>
                </ul>

            </div> -->
        </div>
    </div>

    
      
    <div class="overflow-x-auto mt-4">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Punched In</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Punched Out</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Behavior</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <tr>
                @if($getAttendance->count() > 0)
                    @foreach($getAttendance as $attendance)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">{{ date('l - M d, Y', strtotime($attendance->date)) }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ date('h:i A', strtotime($attendance->punched_in))}}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($attendance->punched_out != null)
                                {{ date('h:i A', strtotime($attendance->punched_out))}}
                                @else
                                Not Record Yet
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">{{$attendance->behavior}}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{$attendance->type}}</td>
                        </tr>
                    @endforeach
                @else
                    <tr ><td colspan='6' class='text-center mt-2'>No Attendance</td></tr>
                @endif
                </tr>
            </tbody>
        </table>
    </div>
</div>


@endsection
