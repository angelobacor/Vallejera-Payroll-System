<!-- Modal Structure -->
<div id="joiningdate" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center hidden z-50">
    <div class="bg-white p-6 rounded-lg shadow-lg relative flex flex-col w-full max-w-3xl">
        <button onclick="closeJoiningDateModal()" class="absolute top-2 right-2 text-gray-600 focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
        <div class="flex-grow">
            <h2 class="text-xl mb-4">Select Date</h2>
            
            <div class="flex space-x-4 mb-4">
                
                <div class="p-4 bg-gray-100 border border-gray-300 rounded-lg flex-1">
                    <h3 class="text-lg font-semibold mb-2">Previous Month</h3>
                    <div id="previousMonthCalendar" class="calendar-container"></div>
                </div>
               
                <div class="p-4 bg-gray-100 border border-gray-300 rounded-lg flex-1 flex">
                    <div class="flex-1">
                        <h3 class="text-lg font-semibold mb-2">Current Month</h3>
                        <div id="currentMonthCalendar" class="calendar-container"></div>
                    </div>
                    <div class="ml-4 flex flex-col space-y-2">
                        <label class="flex items-center space-x-2">
                            <input type="radio" name="dateRange" value="today" class="form-radio text-blue-600" />
                            <span>Today</span>
                        </label>
                        <label class="flex items-center space-x-2">
                            <input type="radio" name="dateRange" value="last7days" class="form-radio text-blue-600" />
                            <span>Last 7 days</span>
                        </label>
                        <label class="flex items-center space-x-2">
                            <input type="radio" name="dateRange" value="thisMonth" class="form-radio text-blue-600" />
                            <span>This month</span>
                        </label>
                        <label class="flex items-center space-x-2">
                            <input type="radio" name="dateRange" value="thisYear" class="form-radio text-blue-600" />
                            <span>This year</span>
                        </label>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="flex justify-between mt-4">
            <button onclick="clearSelection()" class="bg-gray-300 text-gray-800 px-4 py-2 rounded-lg hover:bg-gray-400 focus:outline-none">Clear</button>
            <button onclick="applySelection()" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 focus:outline-none">Apply</button>
        </div>
    </div>
</div>


