@extends('it_admin.layouts.sidebar')
@section('username')
{{$user->name}}
@endsection
@section('content')
@include('it_admin.leave.Modal.assignleave')

<div class="h-full ml-14 mt-14 mb-5 md:ml-64">
    <div class="flex items-center justify-between mt-5 ml-2">
    <h1 class="text-2xl flex-grow">Summary</h1>
        <div class="flex space-x-4 m-2">

        <!-- <div>
            <button  class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600 focus:outline-none">
                Export All
            </button>
            </div>

            <div>
            <button class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none">
                Export
            </button>
            </div>
            <div>
            <button onclick="toggleAccordion(event)" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600 focus:outline-none">
                Settings
            </button>
            </div>

            <div>
            <button onclick="AssignLeave(event)" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none">
                Assign Leave
            </button>
            </div>
        </div> -->
        </div>
    </div>

    <div class="mt-2 ml-2 flex flex-wrap gap-2">
      
    </div>

    
    <div class="bg-gray-50 p-3 mt-3 mx-2 rounded-lg shadow-md flex flex-col">
        
        <div class="flex justify-between items-center mb-4">
            <div class="flex items-center">
                <button class="outline-none focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>
                <span class="ml-2">{{ \Carbon\Carbon::now()->format('F j, Y') }}</span>
            </div>
            <div class="space-x-4">
                @foreach (['Today', 'This Week', 'Last Week','This Month', 'Last Month', 'This Year'] as $timeframe)
                    <button class="text-black hover:text-blue-500" onclick="changeButtonColor(this)">
                        {{ $timeframe }}
                    </button>
                @endforeach
            </div>
        </div>

        
        <div class="border-t border-gray-300 w-full mb-4"></div>

        <div class="flex items-center space-x-4 ml-3 mb-3">
    
    <img src="https://therminic2018.eu/wp-content/uploads/2018/07/dummy-avatar.jpg" alt="Profile Picture" class="w-12 h-12 rounded-full border-2 border-gray-300" />

   
    <div class="flex flex-col">
      
        <p class="text-lg font-medium text-blue-600">John Doe</p>

       
        <p class="text-sm text-gray-600">Main Department, EMP-1</p>
    </div>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 m-2">
           
           <div class="relative p-6 border bg-gray-300">
               <p class="text-center text-3xl">0</p>
               <p class="font-semibold text-center">Leave Approved (Days)</p>
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
       
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date & Time</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Leave Duration</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Leave Type</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Attachments</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Activity</th>
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
                        
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center justify-between">
                        
                                <div class="relative">
                                <button class="focus:outline-none" onclick="toggleEditMenu(event)">
                                    <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v.01M12 12v.01M12 18v.01"></path>
                                    </svg>
                                </button>
                                
                            </div>
                                </div>
                            </td>

                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
