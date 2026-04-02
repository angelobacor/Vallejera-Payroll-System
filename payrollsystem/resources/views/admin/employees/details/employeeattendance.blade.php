@extends('admin.employees.details.jobdesk')

@section('username')
{{$user->name}}
@endsection

@section('jobdesk')

<div class="h-full ml-14 mt-14 mb-5 ">
    <div class="flex items-center justify-between mt-5 ml-2">
        <h1 class="text-2xl flex-grow">Attendance</h1>
    </div>
    <div class="border-t border-gray-300 w-full mt-4 mb-4"></div>
    <div class="m-3">
        <div class="flex justify-between items-center">
            <div class="flex items-center">
                <button>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>
                <span>{{ \Carbon\Carbon::now()->format('F j, Y') }}</span>
            </div>
            <div class="space-x-4">
                <form action="{{route('employeeattendance_filter', $employee->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                    <input type="month" name="search_month_attendance" class="col form-control" @if ($monthSearch != 'false') value="{{$monthSearch}}" @else value="<?php echo date('Y-m'); ?>" @endif/>
                    <button type="submit" class="col ml-2 btn btn-primary">Filter</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
    
    <div class="border-t border-gray-300 w-full mt-4 mb-4"></div>
    <div class="m-3 flex">
        <!-- Circle and legends -->
        <div class="ml-3 mt-3 flex items-center mr-3">
            <div class="mr-4">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 128 128" stroke="currentColor" class="w-32 h-32">
                    <circle cx="64" cy="64" r="30" stroke="red" stroke-width="10" fill="none"/>
                </svg>
            </div>
            <div class="space-y-2">
                <span class="flex items-center"><span class="inline-block w-4 h-4 bg-green-500 mr-2"></span><strong>Regular:</strong> 0 Days</span>
                <span class="flex items-center"><span class="inline-block w-4 h-4 bg-orange-500 mr-2"></span><strong>Early:</strong> 0 Days</span>
                <span class="flex items-center"><span class="inline-block w-4 h-4 bg-red-500 mr-2"></span><strong>Late:</strong> 1 Day</span>
                <span class="flex items-center"><span class="inline-block w-4 h-4 bg-purple-500 mr-2"></span><strong>On Leave:</strong> 0 Days</span>
            </div>
        </div>
    </div>
    
    <div class="overflow-x-auto mt-6 ml-10 mr-10">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Punched In</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Punched Out</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Behaviour</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total Hours</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Entry</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @if($getAttendance->count() > 0)
                    @foreach($getAttendance as $attendance)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">{{date('M d, Y', strtotime($attendance->date))}}</td>
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
                            <td class="px-6 py-4 whitespace-nowrap">{{$attendance->total_hours}}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{$attendance->entry}}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center justify-between">
                        
                                        <div class="relative">
                                <button class="focus:outline-none" onclick="toggleEditMenu(event)">
                                    <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v.01M12 12v.01M12 18v.01"></path>
                                    </svg>
                                </button>
                                <div class="hidden absolute top-8 right-5 w-20 bg-white border border-gray-300 rounded-md shadow-md p-2" id="editMenu">
                                    <a href="{{route('soloexport',$attendance->id)}}" class="text-blue-500 hover:underline">Export</a>
                                </div>
                            </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr ><td colspan='8' class='text-center mt-2'>No Attendance</td></tr>
                @endif
            </tbody>
        </table>
    </div>
</div>


@endsection