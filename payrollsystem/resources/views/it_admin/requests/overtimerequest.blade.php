@extends('it_admin.layouts.sidebar')
@section('username')
{{$user->name}}
@endsection
@section('content')
@include('it_admin.requests.modal.overtimemodal')

<div class="h-full ml-14 mt-14 mb-5 md:ml-64">
    <div class="flex items-center justify-between mt-5 ml-2">
        <h1 class="text-2xl flex-grow">Overtime</h1>
        <div class="flex space-x-4 m-2">

            <div>
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#overtimeModal">
                Overtime rendered
            </button>
            </div>

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
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Start time</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">End time</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Reason</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                    @if($leaves->count() > 0)
                        @foreach($leaves as $leave)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">{{$leave->date}}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ \Carbon\Carbon::parse($leave->start_time)->format('g:i A') }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ \Carbon\Carbon::parse($leave->end_time)->format('g:i A') }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">@if($leave->reason) {{$leave->reason}} @else None @endif</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{$leave->status}}</td>
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
