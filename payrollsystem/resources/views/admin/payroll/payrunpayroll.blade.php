@extends('admin.layouts.sidebar')

@section('username')
{{$user->name}}
@endsection@section('content')

@section('content')
@include('admin.payroll.Modal.sendingpayslip')
@include('admin.payroll.Modal.defaultpayrun')
<div class="h-full ml-14 mt-14 mb-5 md:ml-64">
    <div class="flex items-center justify-between mt-5 ml-2">
        <h1 class="text-2xl flex-grow">Payrun</h1>
        <div class="flex items-center space-x-4 m-2">
    <!-- <a href="payrollsettings" onclick="showNextPage()" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600 focus:outline-none">
        Settings
    </a>
   
    
     <button onclick="DefaultPay(event)" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none">
        Default payrun
    </button> -->

    <a href = "manualpayrun" onclick="showNextPage()" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none">
        Payrun
</a>
</div>

    </div>

    <!-- <div class="mt-6 ml-2 flex flex-wrap gap-2"> -->
        <!-- Filter Buttons -->
        <!-- @foreach (['Payrun date', 'Created', 'Type', 'Type', 'Payrun Period','Status', 'Show conflicted'] as $filter)
            <button class="bg-white text-gray-700 border border-gray-300 px-4 py-2 rounded-full hover:bg-gray-100 focus:outline-none">
                {{ $filter }}
            </button>
        @endforeach
    </div> -->

  
    <div class="mt-3 m-3 flex flex-col space-y-4">
    @if($payrolls->count() > 0 )
        @foreach($payrolls as $payroll)
            <div class="flex items-center p-4 bg-white shadow rounded-half border mt-2 h-[170px]">
                
                    <div class="flex-1 flex-col items-center justify-center">
                    <div class="flex items-center space-x-4">
                        <h2 class="text-blue-700 text-sm">{{$payroll->date}}</h2>
                    </div>
                    <h2 class="text-black-700 text-sm">Semi-Monthly - Hour based (include overtime) </h2>
                    
                    <div class="flex items-center space-x-2">
                        <p class="text-gray-600 text-sm">ID:</p>
                        <p class="text-black-600 text-sm">{{$payroll->generated_id}}</p>
                    </div>
                    <div class="flex space-x-2">
                    
                    <form action="{{ route('sendpayslip', $payroll->id) }}"  method="Post" enctype="multipart/form-data">
                        @csrf
                        <button class="border border-red-500 text-red-500 px-2 py-1 text-xs rounded hover:bg-red-100">
                            View Payslips
                        </button>
                    </form>

                                        
                            <button class="flex items-center border border-blue-500 text-blue-500 px-2 py-1 text-xs rounded hover:bg-blue-100">
                                Export
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 ml-2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9.75v6.75m0 0-3-3m3 3 3-3m-8.25 6a4.5 4.5 0 0 1-1.41-8.775 5.25 5.25 0 0 1 10.233-2.33 3 3 0 0 1 3.758 3.848A3.752 3.752 0 0 1 18 19.5H6.75Z" />
                                </svg>
                            </button>
                        </div>   
                </div>
                <div class="flex-1 flex flex-col ml-3 space-y-2">
                    
                    <div class="bg-orange-500 text-xs px-2 py-1 rounded-full inline-block w-[90px] h-5">
                        Partially Sent
                    </div>
                    <div class="flex items-center text-gray-600 text-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-1">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
                </svg>
                <p class="ml-1 mr-1">Created at</p>
                <p class="text-black">{{$payroll->created_at}}</p>
            </div>

            <!-- <div class="flex items-center text-gray-600 text-sm">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-1">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
            </svg>

            </div> -->

                </div>

                <div class="flex-col ml-2">
                    
                    <form action="{{ route('sendpayslip', $payroll->id) }}"  method="Post" enctype="multipart/form-data">
                        @csrf
                        <button type='submit' class="bg-blue-500 text-white px-3 py-2 text-xs rounded hover:bg-green-600">
                            Send Payslip
                        </button>
                    </form>
                </div>
        

            </div>
        @endforeach
        @else
        <div class="flex flex-col items-center justify-center h-screen">
            <h2>No Payruns</h2>    
        <div>
    @endif
</div>

@endsection
