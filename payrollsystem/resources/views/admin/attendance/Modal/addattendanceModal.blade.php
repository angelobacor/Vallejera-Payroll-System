<!-- Modal Structure -->
<div id="add-attendance" class="fixed inset-0 bg-gray-800 bg-opacity-60 flex items-center justify-center hidden z-50">
    <div class="bg-white p-6 rounded-lg shadow-lg relative w-full max-w-3xl max-h-full">
        <button onclick="closeAddAttendance()" class="absolute top-2 right-2 text-gray-600 hover:text-gray-800 focus:outline-none" aria-label="Close">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
        
        <h2 class="text-2xl font-semibold mb-4 text-gray-800">Manual Punch Entry</h2>
        
        <div class="space-y-4">
            <form action="{{route('manualattendance')}}" method='POST' enctype="multipart/form-data">
                @csrf
                <div class="flex-1">
                    <label for="reason" class="block text-sm font-medium text-gray-700">Department</label>
                    <select id="departmenta" onchange="fetchEmployeesa()" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
                        <option value="" disabled selected>Select Department</option>
                    </select>
                </div>
                <div class="flex-1">
                    <label for="reason" class="block text-sm font-medium text-gray-700">Employee</label>
                    <select name='employee' id="employeelista" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
                        <option value="" disabled selected>Select Employee</option>
                    </select>
                </div>

            <div class="flex-1">
                <label for="punch-in-date" class="block text-sm font-medium text-gray-700">Date</label>
                <input type="date" name='date' id="punch-in-date" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" required/>
            </div>

            <div class='row'>
                <div class="col">
                    <label for="punch-in-date" class="block text-sm font-medium text-gray-700">Punch In Date and Time (Morning)</label>
                    <input type="datetime-local" name='morning_punchin' id="punch-in-date" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" />
                </div>
                
                <div class="col">
                    <label for="punch-out-date" class="block text-sm font-medium text-gray-700">Punch Out Date and Time</label>
                    <input type="datetime-local" name='morning_punchout' id="punch-out-date" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" />
                </div>
            </div>
            
            <!-- <div class="flex-1">
                <label for="reason-note" class="block text-sm font-medium text-gray-700">Reason Note</label>
                <textarea id="reason-note" placeholder="Add reason notes here" rows="4" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"></textarea>
            </div> -->
            <br>
            <div class="row">
                <div class="col">
                    <label for="punch-in-afternoon-date" class="block text-sm font-medium text-gray-700">Punch In Date and Time (Afternoon)</label>
                    <input type="datetime-local" name='afternoon_punchin' id="punch-in-afternoon-date" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" />
                </div>
                
                <div class="col">
                    <label for="punch-out-afternoon-date" class="block text-sm font-medium text-gray-700">Punch Out Date and Time</label>
                    <input type="datetime-local" name='afternoon_punchout' id="punch-out-afternoon-date" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" />
                </div>
            </div> 
        
            <div class="flex justify-end mt-4 gap-2">
                <a onclick="closeAddAttendance()" class="bg-gray-200 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-500">Cancel</a>
                <button onclick="submitForm()" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>
