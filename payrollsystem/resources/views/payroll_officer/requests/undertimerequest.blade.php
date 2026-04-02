@extends('payroll_officer.layouts.sidebar')
@section('username')
{{$user->name}}
@endsection
@section('content')
@include('payroll_officer.requests.modal.undertimemodal')

<div class="h-full ml-14 mt-14 mb-5 md:ml-64">
    <div class="flex items-center justify-between mt-5 ml-2">
        <h1 class="text-2xl flex-grow">Undertime</h1>
        <div class="flex space-x-4 m-2">

            <!-- <div>
            <button onclick="toggleAccordion(event)" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600 focus:outline-none">
                Settings
            </button>
            </div> -->

        </div>
    </div>

    <div class="flex flex-col space-y-4 mt-4">
        <div class="flex items-start p-4 bg-white shadow rounded-md border mt-2">
            <div class="flex flex-grow items-center space-x-2">
                <span>{{ \Carbon\Carbon::now()->format('F j, Y') }}</span>
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
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Start time</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">End time</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Reason</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                    @if($leaves->count() > 0)
                        @foreach($leaves as $leave)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">{{$leave->employee->name}}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{$leave->date}}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ \Carbon\Carbon::parse($leave->start_time)->format('g:i A') }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ \Carbon\Carbon::parse($leave->end_time)->format('g:i A') }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">{{$leave->reason}}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{$leave->status}}</td>
                            @if($leave->status == 'Pending')
                            <td class="px-6 py-4 whitespace-nowrap">
                            <div class="d-flex gap-2"> <!-- Bootstrap: horizontal flex layout with spacing -->
                                <a href="{{ route('hr_approveundertime', $leave->id) }}" class="text-success" title="Approve">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                                        <path d="m10.97 4.97-.02.022-3.473 4.425-2.093-2.094a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05"/>
                                    </svg>
                                </a>
                                <a style="margin-left:15px" href="{{ route('hr_disapproveundertime', $leave->id) }}" class="text-danger" title="Disapprove">
                                    <svg  xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                                        <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"/>
                                    </svg>
                                </a>
                            </div>
                        </td>
                            @else
                            <td class="px-6 py-4 whitespace-nowrap">
                                No Action needed
                            </td>
                            @endif
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
