@extends('admin.layouts.sidebar')
@section('content')
<!-- @includenotfound('employees.Modal.CreatedModal') -->
@include('admin.Administration.Modal.type')
@include('admin.Administration.Modal.addannouncements')

<div class="h-full ml-14 mt-14 mb-5 md:ml-64">
    <div class="flex items-center justify-between mt-5 ml-2">
        <h1 class="text-2xl flex-grow">Announcements</h1>
        <div class="flex space-x-4 items-center m-2">
        <button onclick="addannouncement()" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none">
            Add Announcements
        </button>

        </div>
    </div>

    <div class="border-t border-gray-300 w-full mt-4 mb-4"></div>
    <div class = "flex items-center justify-between m-2">
    <div class="mt-6 ml-2 flex flex-wrap gap-2">
    <button class="text-gray-600 focus:outline-none">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"></path>
            </svg>
        </button>
        @foreach (['Created', 'Type'] as $filter)
            <button 
                class="bg-white text-gray-700 border border-gray-300 px-4 py-2 rounded-full hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-300"
                onclick="
                    @if ($filter === 'Created') showCalendarModal();
                    @elseif ($filter === 'Type') TypeAdmin();
                    @endif
                "
            >
                {{ $filter }}
            </button>
        @endforeach
        </div>

 
    <div class="bg-white rounded flex items-center max-w-xl p-2 shadow-sm border border-gray-200">
                <button class="outline-none focus:outline-none">
                    <svg class="w-5 h-5 text-gray-600 cursor-pointer" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </button>
                <input type="search" name="" id="" placeholder="Search" class="w-40 pl-3 pr-2 text-sm text-black outline-none focus:outline-none bg-transparent" />
            </div>
</div>

<div class="overflow-x-auto mt-6 ml-10 mr-10">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Departments</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Start Date</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">End Date</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Created By</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">John Doe</td>
                    <td class="px-6 py-4 whitespace-nowrap">Main Department</td>
                    <td class="px-6 py-4 whitespace-nowrap">6-11-12</td>
                    <td class="px-6 py-4 whitespace-nowrap">6-11-12</td>
                    <td class="px-6 py-4 whitespace-nowrap">-</td>
                    <td class="px-6 py-4 whitespace-nowrap">-</td>
                    <td class="px-6 py-4 whitespace-nowrap relative">

    <button onclick="toggleEditButton(event)" class="focus:outline-none">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5M12 17.25h8.25" />
    </svg>

    </button>

    <button onclick = "EditWorkingShift()" id="editButton" class="hidden absolute top-0 right-0 mt-8 mr-2 bg-blue-500 text-white px-3 py-1 rounded" onclick="editItem()">
        Edit
    </button>
</td>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

</div>

@endsection

