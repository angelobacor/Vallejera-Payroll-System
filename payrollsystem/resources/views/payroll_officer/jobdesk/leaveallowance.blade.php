@extends('payroll_officer.layouts.sidebar')

@section('username')
{{$user->name}}
@endsection@section('content')

@section('content')

<div class="h-full ml-14 mt-14 mb-5 md:ml-64">
    <div class="flex items-center justify-between mt-5 ml-2">
        <h1 class="text-2xl flex-grow">Contribution Table</h1>
    </div>
    <div class="border-t border-gray-300 w-full mt-4 mb-47"></div>
    <div class="m-4">
        <!-- <div class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
            </svg>
            <p class="ml-1">Leave Policy</p>
        </div>
        <div class="bg-yellow-100 rounded-md p-4 mt-4">
            <p class="ml-1 mt-4 text-gray-600">1. Leave will start from the month of January.</p>
            <p class="ml-1 text-gray-600">2. Any type of change will be effective on the next day.</p>
            <p class="ml-1 text-gray-600">3. Probationary employees are not yet eligible to submit leave requests.</p>
        </div> -->
        

        <!-- New Boxes for Philhealth, Pag-IBIG, SSS -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mt-6">
            <div class="relative p-4 border border-gray-300 rounded-md bg-white">
                <div class="flex items-center justify-between">
                    <p class="font-semibold">Philhealth</p>
                    
                </div>
                <div class="border-t border-gray-300 w-full mt-2 mb-2"></div>
                <p class="text-sm"><strong>Type:</strong> Mandatory</p>
                <p class="text-sm"><strong>Contribution:</strong> {{$philhealth}}</p>
                <!-- <p class="text-sm"><strong>Paid:</strong> 2.50</p>
                <p class="text-sm"><strong>Remaining:</strong> 0.50</p> -->
            </div>

            <div class="relative p-4 border border-gray-300 rounded-md bg-white">
                <div class="flex items-center justify-between">
                    <p class="font-semibold">Pag-IBIG</p>
                    
                </div>
                <div class="border-t border-gray-300 w-full mt-2 mb-2"></div>
                <p class="text-sm"><strong>Type:</strong> Savings</p>
                <p class="text-sm"><strong>Contribution:</strong> {{$pagibig}}</p>
                <!-- <p class="text-sm"><strong>Paid:</strong> 1.50</p>
                <p class="text-sm"><strong>Remaining:</strong> 0.50</p> -->
            </div>

            <div class="relative p-4 border border-gray-300 rounded-md bg-white">
                <div class="flex items-center justify-between">
                    <p class="font-semibold">SSS</p>
                    
                </div>
                <div class="border-t border-gray-300 w-full mt-2 mb-2"></div>
                <p class="text-sm"><strong>Type:</strong> Mandatory</p>
                <p class="text-sm"><strong>Contribution:</strong> {{$sss}}</p>
                <!-- <p class="text-sm"><strong>Paid:</strong> 4.00</p>
                <p class="text-sm"><strong>Remaining:</strong> 1.00</p> -->
            </div>
        </div>
    </div>
</div>

@endsection
