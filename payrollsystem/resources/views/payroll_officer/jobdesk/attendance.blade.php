@extends('payroll_officer.layouts.sidebar')

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
                
            </div>
            <div class="space-x-4">
                <form action="{{route('hr_filter_date_attendance_admin')}}" method="POST" enctype="multipart/form-data">
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
                    <!-- <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th> -->
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
        window.location.href = "{{ route('payrollofficer.att.export') }}" + "?month=" + month;
    }

    function printDtr(){
        const month = document.querySelector('[name="search_month_attendance"]').value;
        window.location.href = "{{ route('payrollofficer.att.dtr') }}" + "?month=" + month;
    }
</script>

@endsection