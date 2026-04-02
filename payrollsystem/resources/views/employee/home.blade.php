@extends('employee.layouts.sidebar')
@section('username')
{{$user->name}}
@endsection
@section('username')
{{$user->name}}
@endsection
@section('content')
<div class="h-full ml-14 mt-14 mb-5 md:ml-64 relative">
    

    <!-- Punch In/Out Box -->
    <div class="bg-blue-600 shadow-lg rounded-lg p-6 mb-6 w-3/4 mx-auto">
        <h2 class="text-white text-xl font-semibold mb-4">
            Hello, {{ explode(' ', $user->name)[0] }}.
        </h2>
        <div> 
            <img 
                src="{{ asset('logo/payroll_dash_img.jpg') }}" 
                alt="dashboard"
                class="w-full  rounded-md object-cover"
                style="height:135px;"
            >
        </div>
    </div>

    <!-- ./Punch In/Out Box -->

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                    <div class="col-span-1 md:col-span-2 grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div class="bg-blue-600 shadow-lg rounded-lg p-4 text-white flex flex-col">
                            <h3 class="font-medium text-lg mb-2">Total Leave available</h3>
                            <div class="flex items-center mb-1">
                                <div class="w-3 h-3 bg-green-500 mr-2"></div>
                                <span>Count - {{ $leaveavailable }}</span>
                            </div>
                        </div>
                        <div class="bg-blue-600 shadow-lg rounded-lg p-4 text-white flex flex-col">
                            <h3 class="font-medium text-lg mb-2">Total Leaves</h3>
                            <div class="flex items-center mb-1">
                                <div class="w-3 h-3 bg-green-500 mr-2"></div>
                                <span>Count - {{ $leaves_count }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Time Log Box -->
                    <!-- <div class="bg-white shadow-lg rounded-lg p-6">
                        <h3 class="text-lg font-medium mb-4">Time Log @if($mattendance && $mattendance->behavior == 'Leave') (On Leave) @endif</h3>
                        <div class="flex justify-between mb-2">
                            <span>Morning:</span>
                            @if($mattendance)
                            <span>{{ date('h:i A', strtotime($mattendance->punched_in))}} - @if($mattendance->punched_out != ''){{ date('h:i A', strtotime($mattendance->punched_out))}} @else None @endif</span>
                            @else
                            <span>No Attendance</span>
                            @endif
                        </div>
                        <div class="flex justify-between mb-2">
                            <span>Afternoon:</span>
                            @if($aattendance)
                            <span>{{ date('h:i A', strtotime($aattendance->punched_in))}} - @if($aattendance->punched_out != ''){{ date('h:i A', strtotime($aattendance->punched_out))}} @else None @endif</span>
                            @else
                            <span>No Attendance</span>
                            @endif
                        </div>
                        <div class="flex justify-between mb-2">
                            <span>This Month:</span>
                            <span>160 Hours</span>
                        </div>
                        <div class="flex justify-between mb-2 border-t border-gray-300 pt-2 text-gray-700"> -->
    <!-- <span class="font-semibold">Schedule:</span>
    <span class="flex space-x-4">
        <span>9:00</span>
        <span class="font-medium">Worked: 00:00</span>
        <span class="font-medium">Balance: 00:00</span>
    </span> -->
<!-- </div> -->

                    </div>
                 

                </div>
            </div>
        </div>
    </div>
</div>

<!-- <script>
    const now = new Date();
    const currentHour = now.getHours();   // 0–23
    const currentMinute = now.getMinutes();

    // Disable button if it's 8:00 PM (20:00) or later
    if (currentHour > 21 || (currentHour === 21 && currentMinute >= 0)) {
        const punchButton = document.getElementById('punchButton');
        const punchoButton = document.getElementById('punchoutButton');
        punchButton.disabled = true;
        punchButton.classList.add('opacity-50', 'cursor-not-allowed'); // Optional styling
        punchoButton.disabled = true;
        punchoButton.classList.add('opacity-50', 'cursor-not-allowed');
    }
</script> -->
@endsection