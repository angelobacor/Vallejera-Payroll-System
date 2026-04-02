<!-- Modal Structure -->
<div id="assign-leave" class="fixed inset-0 bg-gray-800 bg-opacity-60 flex items-center justify-center hidden z-50">
    <div class="bg-white p-6 rounded-lg shadow-lg relative w-full max-w-3xl max-h-full">
        <button onclick="closeAssignLeave()" class="absolute top-2 right-2 text-gray-600 hover:text-gray-800 focus:outline-none" aria-label="Close">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
        
        <h2 class="text-2xl font-semibold mb-4 text-gray-800">Assign Leave</h2>
        
        <form action="{{route('payrollofficer_leaver')}}" method='POST' enctype="multipart/form-data">
        @csrf
        <div class="space-y-4">
            
             <div class="flex-1">
                    <label for="reason" class="block text-sm font-medium text-gray-700">Employee</label>
                    <input disabled type="text" placeholder={{Auth::user()->name}} class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" />
                    <input hidden type="text" id="name" name='employee' value={{Auth::user()->id}} class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" />

                </div>
          

                <div>
                    <label for="leave-type" class="block text-sm font-medium text-gray-700">Leave Type</label>
                    <select name="leave_type" id="leave-type" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" required>
                        <option value="" disabled selected>Choose a leave type</option>
                        @if (Auth::user()->employment->status == 'Regular')<option value="Leave">Leave</option> @else <option disabled>Leave (Don't Have System Privilege)</option> @endif
                        <option value="Overtime">Overtime</option>
                        <option value="Undertime">Undertime</option>
                        <option value="Official Business">Official Business</option>
                        <option value="Schedule Adjustment">Schedule Adjustment</option>
                    </select>

                    <div id="leave-specific-container" style="display: none;">
                        <label for="leave_specific" style="margin-top:20px;" class="block text-sm font-medium text-gray-700">Type Specific: 
                            <input style="margin-left:10px;" type="checkbox" name="is_paid" value="True"/> Paid
                        </label>
                        <input id="leave_specific" type="text" placeholder="(e.g. Sick Leave, Vacation Leave, etc..)" name="leave_specific" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" />
                    </div>

                    <div id="leave-overtime-container" style="display: none;">
                        <label for="hours_rendered" style="margin-top:20px;" class="block text-sm font-medium text-gray-700">Overtime Hours Rendered: 
                            <input style="margin-left:10px;" type="checkbox" name="is_paid" value="True"/> Paid
                        </label>
                        <input id="hours_rendered" type="number" name="hours_rendered" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" />
                    </div>

                    <div id="leave-undertime-container" style="display: none;">
                        <label for="undertime_hours_rendered" style="margin-top:20px;" class="block text-sm font-medium text-gray-700">Hours Rendered: 
                            <input style="margin-left:10px;" type="checkbox" name="is_paid" value="True"/> Paid
                        </label>
                        <input id="undertime_hours_rendered" type="number" name="undertime_hours_rendered" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" />
                    </div>
                </div>
            
            
            <!-- <div>
                <span class="block text-sm font-medium text-gray-700">Duration</span>
                <div class="flex items-center space-x-4 mt-2">
                    <label class="flex items-center space-x-2">
                        <input type="radio" name="duration" value="1" class="form-radio text-blue-600" required/>
                        <span>Single Day</span>
                    </label>
                    <label class="flex items-center space-x-2">
                        <input type="radio" name="duration" value="2" class="form-radio text-blue-600" required/>
                        <span>Two Days</span>
                    </label>
                </div>
            </div> -->
            
   
            <div class="flex-1">
                    <label for="date" class="block text-sm font-medium text-gray-700">Starting Date</label>
                    <input type="date" name='start_date' id="date" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" required/>
                </div>

                <div class="flex-1">
                    <label for="date" class="block text-sm font-medium text-gray-700">Ending Date</label>
                    <input type="date" name='end_date' id="date" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" required/>
                </div>
                
                <div class="flex-1">
                    <label for="reason" class="block text-sm font-medium text-gray-700">Reason</label>
                    <input type="text" name='reason' id="reason" placeholder="Add reason notes here" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" required />
                </div>
        
           
            <!-- <div>
                <label for="attachment" class="block text-sm font-medium text-gray-700">Attachments</label>
                <input type="file" id="attachment" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" />
            </div> -->
           
        
            <div class="flex justify-end mt-4 gap-2">
                <a onclick="closeAssignLeave()" class="bg-gray-200 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-500">Cancel</a>
                <button onclick="submitForm()" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">Submit</button>
            </div>
        </div>
    </form>
    </div>
</div>

<script>
    const leaveTypeSelect = document.getElementById('leave-type');
    const leaveSpecificContainer = document.getElementById('leave-specific-container');
    const leaveSpecificInput = document.getElementById('leave_specific');
    const leaveOvertimeContainer = document.getElementById('leave-overtime-container');
    const leaveOvertimeInput = document.getElementById('hours_rendered')
    const leaveUndertimeContainer = document.getElementById('leave-undertime-container');
    const leaveUndertimeInput = document.getElementById('undertime_hours_rendered')

    function toggleLeaveSpecific() {
        if (leaveTypeSelect.value === 'Leave') {
            leaveOvertimeContainer.style.display = 'none';  
            leaveOvertimeInput.removeAttribute('required');
            leaveUndertimeContainer.style.display = 'none';  
            leaveUndertimeInput.removeAttribute('required'); 

            leaveSpecificContainer.style.display = 'block';  
            leaveSpecificInput.setAttribute('required', 'true');  

        } else if (leaveTypeSelect.value === 'Overtime'){
            leaveSpecificContainer.style.display = 'none';  
            leaveSpecificInput.removeAttribute('required');
            leaveUndertimeContainer.style.display = 'none';  
            leaveUndertimeInput.removeAttribute('required'); 

            leaveOvertimeContainer.style.display = 'block';  
            leaveOvertimeInput.setAttribute('required', 'true'); 
        } else if (leaveTypeSelect.value === 'Undertime'){
            leaveSpecificContainer.style.display = 'none';  
            leaveSpecificInput.removeAttribute('required');
            leaveOvertimeContainer.style.display = 'none';  
            leaveOvertimeInput.removeAttribute('required');
            
            leaveUndertimeContainer.style.display = 'block';  
            leaveUndertimeInput.setAttribute('required', 'true'); 
        }
         else {
            leaveSpecificContainer.style.display = 'none';  
            leaveSpecificInput.removeAttribute('required');  
            leaveOvertimeContainer.style.display = 'none';  
            leaveOvertimeInput.removeAttribute('required'); 
            leaveUndertimeContainer.style.display = 'none';  
            leaveUndertimeInput.removeAttribute('required'); 
        }
    }

    leaveTypeSelect.addEventListener('change', toggleLeaveSpecific);

    toggleLeaveSpecific();
</script>