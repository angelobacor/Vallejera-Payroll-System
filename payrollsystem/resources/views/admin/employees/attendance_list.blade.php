<div id="attendance" class="overflow-x-auto mt-6 ml-10 mr-10">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Employee</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Punched In</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Punched Out</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Behaviour</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Work Hours</th>
                    <!-- <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th> -->
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
            @if($getAttendance->count() > 0)
                    @foreach($getAttendance as $attendance)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">{{$attendance->employee->name}}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{date('l - M d, Y', strtotime($attendance->date))}}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ date('h:i A', strtotime($attendance->punched_in))}}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($attendance->punched_out != null)
                                {{ date('h:i A', strtotime($attendance->punched_out))}}
                                @else
                                Not Record Yet
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">{{$attendance->behavior}}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{$attendance->type}}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{$attendance->total_hours}}</td>
                            <!-- <td class="px-6 py-4 whitespace-nowrap"> -->
                            <!-- <div class="flex items-center justify-between">
                        
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