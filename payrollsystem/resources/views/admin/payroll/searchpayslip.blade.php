@extends('admin.layouts.sidebar')

@section('username')
{{$user->name}}
@endsection@section('content')

@section('content')
@include('admin.modal.sendmonthlypayslip')
@include('admin.modal.ViewPayslip')

<div class="h-full ml-14 mt-14 mb-5 md:ml-64">
    <div class="flex items-center justify-between mt-5 ml-2">
        <!-- Heading -->
        <h1 class="text-2xl flex-grow">Payslip</h1>

        <!-- Buttons -->
        <!-- <div class="flex space-x-4 m-2">
            <div>
                <button onclick="toggleAccordion(event)" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600 focus:outline-none">
                    Export All
                </button>
            </div>
            <div>
                <button onclick="toggleAccordion(event)" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600 focus:outline-none">
                    Send Filtered Payslip
                </button>
            </div>
            <div>
                <button onclick="sendmonthlymodal(event)" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none">
                    Send Monthly Payslip
                </button>
            </div>
        </div> -->
    </div>

    <div class="mt-6 ml-2 flex flex-wrap gap-2">
        
<!-- Search Box -->
<form action='{{route("searchpayslip")}}' method='POST'>
        @csrf
        <div class="bg-white rounded flex items-center max-w-xl p-2 shadow-sm border border-gray-200 ml-5">
            <input type="search" name="search" id="search" placeholder="Search" class="w-64 pl-3 pr-2 text-sm text-black outline-none focus:outline-none bg-transparent" />
            <button type='submit' class="search-btn flex items-center justify-center p-2 rounded-full hover:bg-gray-100 transition duration-200">
                <svg class="w-5 h-5 text-gray-600 cursor-pointer" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </button>
        </div>
    </form>

    </div>

    
    <div class="bg-gray-50 p-3 mt-6 mx-2 rounded-lg shadow-md flex flex-col">
        
        <div class="flex justify-between items-center mb-4">
            <div class="flex items-center">
                <button class="outline-none focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>
                <span class="ml-2">{{ \Carbon\Carbon::now()->format('F j, Y') }}</span>
            </div>
        </div>

        <!-- Full Width Horizontal Line -->
        <div class="border-t border-gray-300 w-full mb-4"></div>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Profile</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Payrun</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Payrun Period</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Payrun Type</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Salary</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Net Salary</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Details</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @if($employee_payslips->count() > 0 )
                    @foreach($employee_payslips as $payslip)
                        <tr>
                            <!-- Profile -->
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex flex-col">
                                    <span class="font-medium text-gray-900">{{$payslip->employee->name}}</span>
                                    <span class="text-gray-500 text-sm">Main Department</span>
                                </div>
                            </td>
                            <!-- Payrun -->
                             @if($payslip->employee->payment_method == 'Weekly')
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex flex-col">
                                    <span class="font-medium text-gray-900">5 Days</span>
                                    <span class="text-gray-500 text-sm">ID: {{$payslip->payrun->generated_id}}</span>
                                </div>
                            </td>
                            @else
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex flex-col">
                                    <span class="font-medium text-gray-900">15 Days</span>
                                    <span class="text-gray-500 text-sm">ID: {{$payslip->payrun->generated_id}}</span>
                                </div>
                            </td>
                            @endif
                            <!-- Payrun Period -->
                            <td class="px-6 py-4 whitespace-nowrap">{{$payslip->employee->payment_method}}</td>
                            <!-- Payrun Type -->
                            <td class="px-6 py-4 whitespace-nowrap">Default</td>
                            <!-- Status -->
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="bg-gray-200 text-gray-800 text-xs px-2 py-1 rounded-full">{{$payslip->condition}}</span>
                            </td>
                            
                            <td class="px-6 py-4 whitespace-nowrap">{{$payslip->employee->salary}}</td>
                            
                            <td class="px-6 py-4 whitespace-nowrap">₱{{$payslip->total_salary}}</td>
                            
                            <td class="px-6 py-4 whitespace-nowrap">
                                    <button onclick = "ViewPayslip()" class="bg-gray-400 text-gray-800 px-4 py-2 rounded-md flex items-center space-x-2 hover:bg-gray-300">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                        </svg>
                                        <span class="text-sm">View</span>
                                    </button>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    <a href='{{route("download", $payslip->id)}}' class="mb-2 bg-gray-400 text-gray-800 px-4 py-2 rounded-md flex items-center space-x-2 hover:bg-gray-300">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-arrow-down" viewBox="0 0 16 16">
                                        <path d="M8.5 6.5a.5.5 0 0 0-1 0v3.793L6.354 9.146a.5.5 0 1 0-.708.708l2 2a.5.5 0 0 0 .708 0l2-2a.5.5 0 0 0-.708-.708L8.5 10.293z"/>
                                        <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2M9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z"/>
                                        </svg>

                                            <span class="text-sm">Download</span>
                                    </a>
                                    <a href='{{route("recalculate", $payslip->id)}}' class="bg-gray-400 text-gray-800 px-4 py-2 rounded-md flex items-center space-x-2 hover:bg-gray-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calculator" viewBox="0 0 16 16">
                                    <path d="M12 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>
                                    <path d="M4 2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5zm0 4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5z"/>
                                    </svg>

                                            <span class="text-sm">Recalculate</span>
                                    </a>
                                </td>

                        </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="10" class="px-6 text-center py-4 whitespace-nowrap">No Employee Payslips</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
