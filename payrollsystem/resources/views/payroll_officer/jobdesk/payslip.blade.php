@extends('payroll_officer.layouts.sidebar')

@section('username')
{{$user->name}}
@endsection@section('content')

@section('content')
@include('payroll_officer.modal.ViewPayslip')

<div class="h-full ml-14 mt-14 mb-5 md:ml-64">
    <div class="flex items-center justify-between mt-5 ml-2">
        <h1 class="text-2xl flex-grow">Payslip</h1>
    </div>
    <div class="border-t border-gray-300 w-full mt-4 mb-4"></div>
    <div class="m-3">
        

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
                                <!-- <a href='#' onclick = "ViewPayslip()" class="hover:scale-110 transform transition-all">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                        <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"/>
                                        <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                                    </svg>
                                </a> -->
                                <a href='{{route("hr_download", $payslip->id)}}' class="hover:scale-110 transform transition-all">
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
