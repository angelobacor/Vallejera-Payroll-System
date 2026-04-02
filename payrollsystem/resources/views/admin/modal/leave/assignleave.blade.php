<!-- Modal Structure -->
<div id="assign-leave" class="fixed inset-0 bg-gray-800 bg-opacity-60 flex items-center justify-center hidden z-50">
    <div class="bg-white p-6 rounded-lg shadow-lg relative w-full max-w-3xl max-h-full">
        <button onclick="closeAssignLeave()" class="absolute top-2 right-2 text-gray-600 hover:text-gray-800 focus:outline-none" aria-label="Close">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
        
        <h2 class="text-2xl font-semibold mb-4 text-gray-800">Assign Leave</h2>
        
        <div class="space-y-4">
            
             <div class="flex-1">
                    <label for="reason" class="block text-sm font-medium text-gray-700">Employee</label>
                    <input type="text" id="name" placeholder="Enter the name here" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" />
                </div>
          

            <div>
                <label for="leave-type" class="block text-sm font-medium text-gray-700">Leave Type</label>
                <select id="leave-type" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
                    <option value="" disabled selected>Choose a leave type</option>
                    <option value="hr">Sick Leave</option>
                    <option value="it">Maternity Leave</option>
                    <option value="finance">Finance</option>
                </select>
            </div>
            
            
            <div>
                <span class="block text-sm font-medium text-gray-700">Duration</span>
                <div class="flex items-center space-x-4 mt-2">
                    <label class="flex items-center space-x-2">
                        <input type="radio" name="gender" value="male" class="form-radio text-blue-600" />
                        <span>Single Day</span>
                    </label>
                    <label class="flex items-center space-x-2">
                        <input type="radio" name="gender" value="female" class="form-radio text-blue-600" />
                        <span>Multi Day</span>
                    </label>
                    <label class="flex items-center space-x-2">
                        <input type="radio" name="gender" value="others" class="form-radio text-blue-600" />
                        <span>Half Day</span>
                    </label>
                    <label class="flex items-center space-x-2">
                        <input type="radio" name="gender" value="others" class="form-radio text-blue-600" />
                        <span>Hours</span>
                    </label>
                </div>
            </div>
            
   
                <div class="flex-1">
                    <label for="date" class="block text-sm font-medium text-gray-700">Enter Date</label>
                    <input type="date" id="date" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" />
                </div>
                
                <div class="flex-1">
                    <label for="reason" class="block text-sm font-medium text-gray-700">Reason</label>
                    <input type="text" id="reason" placeholder="Add reason notes here" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" />
                </div>
        
           
            <div>
                <label for="attachment" class="block text-sm font-medium text-gray-700">Attachments</label>
                <input type="file" id="attachment" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" />
            </div>
           
        
            <div class="flex justify-end mt-4 gap-2">
                <button onclick="closeAssignLeave()" class="bg-gray-200 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-500">Cancel</button>
                <button onclick="submitForm()" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">Submit</button>
            </div>
        </div>
    </div>
</div>
