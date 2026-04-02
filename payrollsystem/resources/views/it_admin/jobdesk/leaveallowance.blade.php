@extends('it_admin.layouts.sidebar')
@section('username')
{{$user->name}}
@endsection
@section('content')

<div class="h-full ml-14 mt-14 mb-5 md:ml-64">
    <div class="flex items-center justify-between mt-5 ml-2">
        <h1 class="text-2xl flex-grow">Contribution Table</h1>
    </div>
    <div class="border-t border-gray-300 w-full mt-4 mb-47"></div>
    <div class="m-4">
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
