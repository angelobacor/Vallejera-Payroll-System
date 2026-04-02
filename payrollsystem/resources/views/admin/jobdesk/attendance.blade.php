@extends('admin.layouts.sidebar')

@section('username')
{{$user->name}}
@endsection

@section('content')

<div class="h-full ml-14 mt-14 mb-5 md:ml-64 ">
    <div class="flex items-center justify-between mt-5 ml-2">
        <h1 class="text-2xl flex-grow">Attendance</h1>
    </div>
    <div class="border-t border-gray-300 w-full mt-4 mb-4"></div>
    <div class="m-3">
        <div class="flex justify-between items-center">
            <div class="flex items-center">
                <!-- <button>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </button> -->
                <span>{{ \Carbon\Carbon::now()->format('F j, Y') }}</span>
            </div>
            <div class="space-x-4">
                <form id="form_attendance" action="{{route('filter_date_attendance_admin')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                    <input type="month" name="search_month_attendance" class="col form-control" @if ($monthSearch != 'false') value="{{$monthSearch}}" @else value="<?php echo date('Y-m'); ?>" @endif/>
                    <button type="submit" class="col ml-2 btn btn-primary">Filter</button>
                    <button type="button" onclick="exportAttendance()" class="col ml-2 btn btn-warning">Export</button>
                    <button type="button" onclick="printDtr()" class="col ml-2 btn btn-info">DTR</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
    
    <div class="border-t border-gray-300 w-full mt-4 mb-4"></div>
    <div class="m-3 flex flex-col space-y-4">
        <!-- Circle and legends -->
        <!-- <div class="ml-3 mt-3 flex items-center mr-3">
            <div class="mr-4">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 128 128" stroke="currentColor" class="w-32 h-32">
                    <circle cx="64" cy="64" r="30" stroke="red" stroke-width="10" fill="none"/>
                </svg>
            </div>
            <div class="space-y-2">
                <span class="flex items-center"><span class="inline-block w-4 h-4 bg-green-500 mr-2"></span><strong>Regular:</strong> 0 Days</span>
                <span class="flex items-center"><span class="inline-block w-4 h-4 bg-orange-500 mr-2"></span><strong>Early:</strong> 0 Days</span>
                <span class="flex items-center"><span class="inline-block w-4 h-4 bg-red-500 mr-2"></span><strong>Late:</strong> 1 Day</span>
                <span class="flex items-center"><span class="inline-block w-4 h-4 bg-purple-500 mr-2"></span><strong>On Leave:</strong> 0 Days</span>
            </div>
        </div> -->
        <!-- <form action="{{ route('adminpunchin') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="flex justify-center items-center space-x-2">
                        
                        <button type="submit" class="w-full font-semibold text-center text-red-600">Timein</button>
                    </div>
                </form>                <form action="{{ route('adminpunchout') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="flex justify-center items-center space-x-2">
                        
                        <button type="submit" class="w-full font-semibold text-center text-red-600">Timeout</button>
                    </div>
                </form> -->
        <!-- Import and Export -->
        <!-- <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-4">
            <div class="relative p-6 border bg-gray-300 rounded-lg shadow-md hover:bg-gray-400 transition duration-200">
                <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="flex justify-center items-center space-x-2">
                        
                        <input type="file" name="file" required class="block w-full mb-3" />
                        <button type="submit" class="w-full font-semibold text-center text-red-600">Import</button>
                    </div>
                </form>
            </div>
            <div class="relative p-6 border bg-gray-300 rounded-lg shadow-md hover:bg-gray-400 transition duration-200">
                <form action="{{ route('export') }}" method="GET" enctype="multipart/form-data">
                    @csrf
                    <div class="flex justify-center items-center space-x-2">
                        
                        
                        <button type="submit" class="w-full font-semibold text-center text-red-600">Export</button>
                    </div>
                </form>
            </div>
        </div> -->
    </div>
    
    <div class="overflow-x-auto mt-6 ml-10 mr-10">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Time</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Mode</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Behaviour</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Work Hours</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
            @if($getAttendance->count() > 0)
                    @foreach($getAttendance as $attendance)
                        @php
                            $punchedOut = \Carbon\Carbon::parse($attendance->punched_out);
                            $time = $punchedOut->format('H:i');

                            $inStart = '09:00';
                            $inEnd = '12:45';

                            $outStart = '14:30';
                            $outEnd = '20:00';
                        @endphp
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">{{date('l - M d, Y', strtotime($attendance->date))}}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                
                                @if ($time >= $inStart && $time <= $inEnd)
                                    {{ date('h:i A', strtotime($attendance->punched_in))}}
                                @elseif ($time >= $outStart && $time <= $outEnd && $attendance->punched_out != null)
                                    {{ date('h:i A', strtotime($attendance->punched_out))}}
                                @elseif($attendance->is_duplicate)
                                    No Time-out Yet
                                @else
                                    {{ date('h:i A', strtotime($attendance->punched_in))}}
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($attendance->punched_out != null)
                                    @if (($time >= $inStart && $time <= $inEnd) || !$attendance->is_duplicate)
                                        In
                                    @elseif ($time >= $outStart && $time <= $outEnd)
                                        Out
                                    @else
                                        {{ $punchedOut->format('h:i A') }}
                                    @endif
                                @elseif(!$attendance->is_duplicate)
                                    In
                                @else
                                    Out
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">{{$attendance->behavior}}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{$attendance->type}}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{$attendance->total_hours}}</td>
                            <!-- <td class="px-6 py-4 whitespace-nowrap">{{$attendance->entry}}</td> -->
                            <!-- <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center justify-between">
                        
                                        <div class="relative">
                                <button class="focus:outline-none" onclick="toggleEditMenu(event)">
                                    <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v.01M12 12v.01M12 18v.01"></path>
                                    </svg>
                                </button>
                                <div class="hidden absolute top-8 right-5 w-20 bg-white border border-gray-300 rounded-md shadow-md p-2" id="editMenu">
                                    <a href="{{route('soloexport',$attendance->id)}}" class="text-blue-500 hover:underline">Export</a>
                                </div>
                            </div>
                                </div>
                            </td> -->
                        </tr>
                    @endforeach
                @else
                    <tr ><td colspan='8' class='text-center mt-2'>No Attendance</td></tr>
                @endif
            </tbody>
        </table>
    </div>
</div>

<script>
    function exportAttendance(){
        const month = document.querySelector('[name="search_month_attendance"]').value;
        window.location.href = "{{ route('admin.att.export') }}" + "?month=" + month;
    }

    function printDtr(){
        const month = document.querySelector('[name="search_month_attendance"]').value;
        window.location.href = "{{ route('admin.att.dtr') }}" + "?month=" + month;
    }
</script>
@endsection