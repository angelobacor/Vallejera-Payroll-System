@extends('it_admin.layouts.sidebar')
@section('username')
{{$user->name}}
@endsection
@section('content')
@include('it_admin.jobdesk.Modal.salary')

<div class="h-full ml-14 mt-14 mb-5 md:ml-64">
    <div class="flex items-center justify-between mt-5 ml-2">
        <h1 class="text-2xl flex-grow">Salary Overview</h1>
    </div>

    <div class="border-t border-gray-300 w-full mt-4 mb-4"></div>

    <div class="flex-1 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
    <div class="relative flex items-center">
            <div class="flex-1 m-5">
                <h2 class="font-semibold ">Salary</h2>
            </div>
    <div class="flex flex-col items-center ml-2">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
</svg>



        <div class="border-l border-gray-400 h-20"></div>
    </div>
    
</div>

        <div class="relative p-3 m-3 border bg-gray-200">
            <p class="font-semibold">₱{{$user->salary}}</p>
            <p class="text-blue-500 font-semibold">Present</p>
        </div>

    </div>
    
</div>
@endsection