@extends('employee.layouts.sidebar')
@section('username')
{{$user->name}}
@endsection
@section('content')
@include('employee.attendance.Modal.emstat')

<div class="h-full ml-14 mt-14 mb-5 md:ml-64">
    <div class="flex items-center justify-between mt-5 ml-2">
        <h1 class="text-2xl flex-grow">Attendance Request</h1>
        <div class="flex space-x-4 m-2">
            <div class="mt-2">
                <a href="/attendancesettings" onclick="showNextPage()" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600 focus:outline-none">
                    Settings
                </a>
            </div>
            <div class="relative">
                <button class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none">
                    Add Attendance
                    <svg class="w-5 h-5 inline ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <ul id="accordionContent" class="hidden accordion-content pl-12">
                    <div class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none">
                        <div class="py-1" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Add Attendance</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Assigned Leave</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Terminate</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Edit Salary</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Add Joining Date</a>
                        </div>
                    </div>
                </ul>
            </div>
        </div>
    </div>

    
    <div class="mt-6 ml-2 flex flex-wrap gap-2">
        <!-- Filter Buttons -->
        @foreach (['Department', 'Work Shift', 'Users', 'Designation', 'Employment Status'] as $filter)
        <button 
                class="bg-white text-gray-700 border border-gray-300 px-4 py-2 rounded-full hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-300"
                onclick="
                    @if ($filter === 'Employment Status') EmStat();
                    @endif
                "
            >
                {{ $filter }}
            </button>
        @endforeach
    </div>

    <div class="border-t border-gray-300 w-full mt-4 mb-4"></div>

    <!-- New Section Added Here -->
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
                @foreach (['Today', 'This Week', 'Last Week', 'This Month', 'Last Month', 'This Year'] as $timeframe)
                    <button class="text-black hover:text-blue-500" onclick="changeButtonColor(this)">
                        {{ $timeframe }}
                    </button>
                @endforeach
            </div>
        </div>
    </div>
    <!-- End of New Section -->


    
    
</div>

@endsection
