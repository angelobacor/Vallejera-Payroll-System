@extends('it_admin.layouts.sidebar')

@section('username')
{{$user->name}}
@endsection

@section('content')
@include('it_admin.jobdesk.Modal.addattendance')
@include('it_admin.jobdesk.Modal.assignleave')

<div class="h-full ml-14 mt-14 mb-5 md:ml-64 flex">
    <!-- Sidebar for Job Desk -->
    <div class="w-64 border border-gray-300 bg-white rounded-lg shadow-md p-4">
        <h2 class="text-lg font-semibold">{{$employee->name}}</h2>
        <ul class="mt-2">
        @foreach ([
                
                'it_employeejobhistory' => 'Job History',
                
                
                'it_employeeupdateaccount' => 'Update Account',
            ] as $link => $text)
                <li class="flex items-center h-11 focus:outline-none hover:bg-blue-800 text-gray-800 hover:text-white border-l-4 border-transparent hover:border-blue-500 pr-6">
                    <a href="{{ route($link, $employee->id) }}" onclick="showNextPage()" class="flex-grow">
                        <span class="ml-2 text-sm tracking-wide truncate">{{ $text }}</span>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>

    <main class="content px-0">
            @yield('jobdesk')
        </main>
</div>

@endsection