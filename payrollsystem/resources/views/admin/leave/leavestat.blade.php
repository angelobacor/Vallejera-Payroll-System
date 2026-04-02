@extends('admin.layouts.sidebar')

@section('username')
{{$user->name}}
@endsection@section('content')

@section('content')
@include('admin.modal.leave.assignleave')

<div class="h-full ml-14 mt-14 mb-5 md:ml-64">
    <div class="flex items-center justify-between mt-5 ml-2">
        <h1 class="text-2xl flex-grow">My Request</h1>
        <div class="flex space-x-4 m-2">

        <form action="{{ route('exportleave') }}" method="Get" enctype="multipart/form-data">
                <button style="margin-right:10px;" type='submit' class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none">
                    Export All
                </button>
            </form>

            <!-- <div>
            <button onclick="toggleAccordion(event)" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600 focus:outline-none">
                Settings
            </button>
            </div>

            <div>
            <button onclick="AssignLeave(event)" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none">
                Assign Leave
            </button>
            </div> -->
        </div>
    </div>

    
        

      
        <!-- <div class="bg-white shadow rounded-md border mt-2 p-4">
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
                            <td class="px-6 py-4 whitespace-nowrap">@if($leave->duration == 1) {{ date('M d, Y', strtotime($leave->start_date))}} @else {{ date('M d, Y', strtotime($leave->start_date))}} - {{ date('M d, Y', strtotime($leave->end_date))}} @endif</td>
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
                            <td class="text-center px-6 py-4 whitespace-nowrap" colspan="7">No Updates Yet</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
