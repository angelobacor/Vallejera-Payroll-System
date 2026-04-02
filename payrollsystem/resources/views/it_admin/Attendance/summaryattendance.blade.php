@extends('it_admin.layouts.sidebar')
@section('username')
{{$user->name}}
@endsection
@section('content')
@include('it_admin.attendance.Modal.emstat')

<div class="h-full ml-14 mt-14 mb-5 md:ml-64">
    <div class="flex items-center justify-between mt-5 ml-2">
        <h1 class="text-2xl flex-grow">Summary</h1>
        <div class="flex space-x-4 m-2">
            <div class="mt-2">
                <a href="/exportall" onclick="showNextPage()" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600 focus:outline-none">
                    Export All
                </a>
            </div>
            <div class="mt-2">
                <a href="/export" onclick="showNextPage()" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600 focus:outline-none">
                    Export
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
        @foreach (['Users'] as $filter)
        <button 
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

    <div class="flex items-center space-x-4 ml-3 mb-5">
    
    <img src="https://therminic2018.eu/wp-content/uploads/2018/07/dummy-avatar.jpg" alt="Profile Picture" class="w-12 h-12 rounded-full border-2 border-gray-300" />

   
    <div class="flex flex-col">
      
        <p class="text-lg font-medium text-blue-600">John Doe</p>

       
        <p class="text-sm text-gray-600">Main Department, EMP-1</p>
    </div>
</div>



        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 m-2">
           
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

       <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 m-2">
           
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

       <div class="overflow-x-auto mt-4">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Punched In</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">In Geolocation</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Punched Out</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Out Geolocation</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Behavior</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total Hours</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Entry</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap"></td>
                    <td class="px-6 py-4 whitespace-nowrap"></td>
                    <td class="px-6 py-4 whitespace-nowrap"></td>
                    <td class="px-6 py-4 whitespace-nowrap"></td>
                    <td class="px-6 py-4 whitespace-nowrap"></td>
                    <td class="px-6 py-4 whitespace-nowrap"></td>
                    <td class="px-6 py-4 whitespace-nowrap"></td>
                    <td class="px-6 py-4 whitespace-nowrap"></td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center justify-between">
                            <div class="relative">
                                <button class="focus:outline-none" onclick="toggleEditMenu(event)">
                                    <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v.01M12 12v.01M12 18v.01"></path>
                                    </svg>
                                </button>
                                <div class="hidden absolute top-8 right-0 w-24 bg-white border border-gray-300 rounded-md shadow-md p-2" id="editMenu">
                                    <button class="text-blue-500 hover:underline">Edit</button>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    


    
    
</div>

@endsection
