@extends('employee.layouts.sidebar')
@section('username')
{{$user->name}}
@endsection
@section('content')
@include('employee.leave.Modal.assignleave')

<div class="h-full ml-14 mt-14 mb-5 md:ml-64">
        @if(session('message'))
            <div class="alert alert-danger">
                {{ session('message') }}
            </div>
        @endif

    <div class="flex items-center justify-between mt-5 ml-2">
        <h1 class="text-2xl flex-grow">Leave Request</h1>
        <div class="flex space-x-4 m-2">

            <!-- <div>
            <button onclick="toggleAccordion(event)" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600 focus:outline-none">
                Settings
            </button>
            </div> -->

            <div>
            @if($user->employment_id != 2 && $user->employment_id != 3)
            <button onclick="AssignLeave(event)" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none">
                Request Leave
            </button>
            @else
            <button disabled class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600 focus:outline-none" style="cursor:not-allowed">
                Request Leave
            </button>
            @endif

            </div>
        </div>
    </div>

    <!-- <div class="mt-6 ml-2 flex flex-wrap gap-2">
        @foreach (['Department', 'Work Shift', 'Leave Duration', 'Users'] as $filter)
            <button class="bg-white text-gray-700 border border-gray-300 px-4 py-2 rounded-full hover:bg-gray-100 focus:outline-none">
                {{ $filter }}
            </button>
        @endforeach
    </div>

    <div class="flex flex-col space-y-4 mt-4">
        <div class="flex items-start p-4 bg-white shadow rounded-md border mt-2">
            <div class="flex flex-grow items-center space-x-2">
                <button>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>
                <span>{{ \Carbon\Carbon::now()->format('F j, Y') }}</span>
            </div>

            <div class="flex flex-shrink-0 space-x-4 ml-auto">
                @foreach (['Today', 'This Week', 'Last Week', 'This Month', 'Last Month', 'This Year'] as $timeframe)
                    <button class="text-black hover:text-blue-500" onclick="changeButtonColor(this)">
                        {{ $timeframe }}
                    </button>
                @endforeach
            </div>
        </div>
        

      
        <div class="bg-white shadow rounded-md border mt-2 p-4">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
        <div class="relative p-6 border bg-gray-300 rounded-md">
            <p class="text-center text-3xl">0</p>
            <p class="text-gray-500 text-center">Employees Leave</p>
        </div>
        <div class="relative p-6 border bg-gray-300 rounded-md">
            <p class="text-center text-3xl">0</p>
            <p class="text-gray-500 text-center">Total Leave Hours</p>
        </div>
        <div class="relative p-6 border bg-gray-300 rounded-md">
            <p class="text-center text-3xl">0</p>
            <p class="text-gray-500 text-center">On Leave (Single Day)</p>
        </div>
        <div class="relative p-6 border bg-gray-300 rounded-md">
            <p class="text-center text-3xl">0</p>
            <p class="text-gray-500 text-center">On Leave (Multi Day)</p>
        </div>
    </div>
</div> -->


            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Profile</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Leave Duration</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Leave Type</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Attachments</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Activity</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                    @if($leaverequests->count() > 0)
                        @foreach($leaverequests as $leave)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">{{$leave->employee->name}}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{$leave->date}}</td>
                            <td class="px-6 py-4 whitespace-nowrap">@if ($leave->duration > 1){{$leave->duration}} days @else{{$leave->duration}} day @endif</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{$leave->leave_type}}</td>
                            <td class="px-6 py-4 whitespace-nowrap">None</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{$leave->activity}}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{$leave->status}}
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td class="text-center px-6 py-4 whitespace-nowrap" colspan="7">No Leave Request</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
