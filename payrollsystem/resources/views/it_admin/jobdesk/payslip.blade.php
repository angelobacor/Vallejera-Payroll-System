@extends('it_admin.layouts.sidebar')
@section('username')
{{$user->name}}
@endsection
@section('content')

<div class="h-full ml-14 mt-14 mb-5 md:ml-64">
    <div class="flex items-center justify-between mt-5 ml-2">
        <h1 class="text-2xl flex-grow">Payslip</h1>
    </div>
    <div class="border-t border-gray-300 w-full mt-4 mb-4"></div>
    <div class="m-3">
        <!-- <div class="flex justify-between items-center">
            <div class="flex items-center">
                <button>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>
                <span>{{ \Carbon\Carbon::now()->format('F j, Y') }}</span>
            </div>
            <div class="space-x-4">
                @foreach (['This Month', 'Last Month', 'This Year', 'Total'] as $timeframe)
                    <button class="text-black hover:text-blue-500" onclick="changeButtonColor(this)">
                        {{ $timeframe }}
                    </button>
                @endforeach
            </div>
        </div> 

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
           
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
       </div> -->

       <div class="overflow-x-auto mt-6 ml-5 mr-5">
        <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Payrun</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Payrun Period</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Payrun Type</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Salary</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Net Salary</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Details</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody>
                @if($payslip->count() > 0)
                    @foreach($payslip as $payslip)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray">{{$payslip->payrun->generated_id}}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray">@if($payslip->employee->payment_method == '15 days')15 days @else 5 days @endif</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray">{{$payslip->payrun_type}}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray">{{$payslip->status}}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray">{{$payslip->total_salary}}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray">{{$payslip->net_salary}}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray">{{$payslip->created_at}}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray">{{$payslip->employee->email}}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray flex space-x-4">
                                <a href='{{route("it_admindownload", $payslip->id)}}' class="hover:scale-110 transform transition-all">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-arrow-down" viewBox="0 0 16 16">
                                        <path d="M8.5 6.5a.5.5 0 0 0-1 0v3.793L6.354 9.146a.5.5 0 1 0-.708.708l2 2a.5.5 0 0 0 .708 0l2-2a.5.5 0 0 0-.708-.708L8.5 10.293z"/>
                                        <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2M9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z"/>
                                    </svg>
                                </a>
                            </td>

                        </tr>
                    @endforeach
                    @else
                    <td colspan='9' class="px-6 py-4 whitespace-nowrap text-sm text-center font-medium text-gray">No Payslips</td>

                @endif
            </tbody>
            
        </table>
    </div>
</div>




    </div>

@endsection
