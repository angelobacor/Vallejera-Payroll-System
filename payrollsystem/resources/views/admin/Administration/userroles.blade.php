@extends('admin.layouts.sidebar')
@section('content')
@include('admin.Administration.Modal.roleswrench')
@include('admin.Administration.Modal.adduser')
@include('admin.Administration.Modal.inviteuser')

<div class="h-full ml-14 mt-14 mb-5 md:ml-64">
    <div class="flex items-center justify-between mt-5 ml-2">
        <h1 class="text-2xl flex-grow">User and Roles</h1>
       
        <div class="flex space-x-4 m-2">

            <div>
            <button onclick="adduser(event)" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600 focus:outline-none">
                Add User
            </button>
            </div>

            <div>
            <button onclick="inviteuser(event)" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none">
                Invite User
            </button>
            </div>
        </div>
    </div>
        


  

   
        <div class="flex gap-4 mt-5">
            <!-- Users Box -->
            <div class="flex-1 bg-white shadow rounded-md p-4 border">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-xl font-semibold">Users</h2>
                <input type="text" placeholder="Search..." class="border rounded-md p-2">
            </div>
                <div class="overflow-x-auto">
                <div class="flex space-x-4 mb-4">
    <button class="px-4 py-2 text-xs font-medium text-gray-500 bg-gray-200 rounded hover:bg-gray-300 uppercase tracking-wider">
        All Users
    </button>
    <button class="px-4 py-2 text-xs font-medium text-gray-500 bg-gray-200 rounded hover:bg-gray-300 uppercase tracking-wider">
        Active
    </button>
    <button class="px-4 py-2 text-xs font-medium text-gray-500 bg-gray-200 rounded hover:bg-gray-300 uppercase tracking-wider">
        Inactive
    </button>
    <button class="px-4 py-2 text-xs font-medium text-gray-500 bg-gray-200 rounded hover:bg-gray-300 uppercase tracking-wider">
        Invited
    </button>
</div>
<div class="bg-white divide-y divide-gray-200">
    <div class="flex items-center justify-between px-6 py-4">
        <div>
            <h3 class="text-lg font-semibold">John Doe</h3>
            <p class="text-sm text-gray-500">Software Engineer</p>
        </div>
        <div class="flex items-center">
            <span class="bg-green-500 text-white text-xs font-medium px-2 py-1 rounded-full">Active</span>
           

        </div>
        <div class="relative inline-block text-left">
    <button class="ml-3 text-gray-500 hover:text-gray-700 focus:outline-none" onclick="toggleManageUsersMenu()">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h8m-4-4h4m-4 8h4" />
        </svg>
    </button>
    
    <div id="manage-users-menu" class="hidden absolute right-0 z-10 mt-2 w-48 bg-white rounded-md shadow-lg">
        <div class="py-1" role="menu" aria-orientation="vertical" aria-labelledby="manage-users-menu">
            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" onclick="manageUsersEdit()">Edit</a>
            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" onclick="manageUsersDeactivate()">Deactivate</a>
            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" onclick="manageUsersRole()">Manage Role</a>
            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" onclick="manageUsersRemove()">Remove from Employee List</a>
        </div>
    </div>
</div>
    </div>
</div>       
                </div>
            </div>

            <!-- Roles Box -->
            <div class="flex-1 bg-white shadow rounded-md p-4 border">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-xl font-semibold">Roles</h2>
                <input type="text" placeholder="Search..." class="border rounded-md p-2">
            </div>
                <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
    <thead class="bg-gray-50">
        <tr>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Role Name</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Permission</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Users</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Manage Users</th>
        </tr>
    </thead>
    <tbody class="bg-white item-center divide-y divide-gray-200">
        <!-- Sample Row -->
        <tr>
            <td class="px-6 py-4 whitespace-nowrap">Admin</td>
            <td><span class="item-center bg-blue-500 text-white text-xs font-medium px-2 py-1 rounded-full">Manage</span></td>
            <td class="px-6 py-4 whitespace-nowrap">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="inline-block h-6 w-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                </svg> 
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
    <button onclick="manageusers()" class="focus:outline-none">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="inline-block h-6 w-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75a4.5 4.5 0 0 1-4.884 4.484c-1.076-.091-2.264.071-2.95.904l-7.152 8.684a2.548 2.548 0 1 1-3.586-3.586l8.684-7.152c.833-.686.995-1.874.904-2.95a4.5 4.5 0 0 1 6.336-4.486l-3.276 3.276a3.004 3.004 0 0 0 2.25 2.25l3.276-3.276c.256.565.398 1.192.398 1.852Z" />
            <path stroke-linecap="round" stroke-linejoin="round" d="M4.867 19.125h.008v.008h-.008v-.008Z" />
        </svg>
    </button>
</td>

        </tr>
    </tbody>
</table>

                </div>
            </div>
        </div>

    </div>
</div>

@endsection
