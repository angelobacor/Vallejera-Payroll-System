@extends('payroll_officer.layouts.sidebar')

@section('username')
{{$user->name}}
@endsection@section('content')

@section('content')

<div class="h-full ml-14 mt-14 mb-5 md:ml-64">
    <div class="flex items-center justify-between mt-5 ml-2">
        <h1 class="text-2xl flex-grow">Leave</h1>
    </div>
    <div class="border-t border-gray-300 w-full mt-4 mb-4"></div>
    <div class="m-3">
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
           
            <div class="relative p-6 border bg-gray-300">
                <p class="text-center text-3xl">0</p>
                <p class="font-semibold text-center">Leave Approved</p>
            </div>
            <div class="relative p-6 border bg-gray-300">
                <p class="text-center text-3xl">0</p>
                <p class="font-semibold text-center">Upcoming Leave (Days)</p>
            </div>
            <div class="relative p-6 border bg-gray-300">
                <p class="text-center text-3xl">0</p>
                <p class="font-semibold text-center">Pending Request</p>
            </div>
        </div>

        <div class="flex justify-between items-center m-3">
            <div class="flex items-center">
                <button>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>
                <span>{{ \Carbon\Carbon::now()->format('F j, Y') }}</span>
            </div>
            <div class="space-x-4">
                @foreach (['Today', 'This Week', 'Last Week', 'This Month', 'Last Month', 'This Year'] as $timeframe)
                    <button class="text-black hover:text-blue-500" onclick="changeButtonColor(this)">
                        {{ $timeframe }}
                    </button>
                @endforeach
            </div>
        </div>
    </div>

    
    <div class="overflow-x-auto mt-6 ml-10 mr-10">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date & Time</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Leave duration</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Leave Type</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Attachments</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Activity</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @if($leaves->count() > 0)
                    @foreach($leaves as $leave)
                        <tr>
                            @if($leave->start_date == $leave->end_date)
                            <td class="px-6 py-4 whitespace-nowrap">{{$leave->start_date}} - {{$leave->end_date}}</td>
                            @else
                            <td class="px-6 py-4 whitespace-nowrap">{{$leave->start_date}}</td>
                            @endif
                            <td class="px-6 py-4 whitespace-nowrap">8</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{$leave->leave_type}}</td>
                            <td class="px-6 py-4 whitespace-nowrap"></td>
                            <td class="px-6 py-4 whitespace-nowrap">{{$leave->status}}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{$leave->activity}}</td>
                            <!-- <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center justify-between">
                        
                                        <div class="relative">
                                <button class="focus:outline-none" onclick="toggleEditMenu(event)">
                                    <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v.01M12 12v.01M12 18v.01"></path>
                                    </svg>
                                </button>
                                <div class="hidden absolute top-8 right-5 w-20 bg-white border border-gray-300 rounded-md shadow-md p-2" id="editMenu">
                                    <button class="text-blue-500 hover:underline">Edit</button>
                                </div>
                            </div>
                                </div>
                            </td> -->
                        </tr>
                    @endforeach

                @else
                <tr><td colspan='7' class='text-center'>No Leaves</td></tr>
                @endif
            </tbody>
        </table>
    </div>
</div>


    
   
     

    </div>
</div>

@endsection
