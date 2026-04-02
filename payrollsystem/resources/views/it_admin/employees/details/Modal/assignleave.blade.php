<!-- Main modal -->
<div id="assign-leave" class="fixed inset-0 bg-gray-800 bg-opacity-60 flex items-center justify-center hidden z-50">
    <div class="relative max-w-3xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Assign Leave
                </h3>
                <button onclick="closeassignleave()" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            
            <form class="p-4 md:p-5">
                <div class="grid gap-4 mb-4">
                    <!-- Leave Type Dropdown -->
                    <div>
                        <label for="leave_type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Leave Type</label>
                        <select id="leave_type" name="leave_type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                            <option value="" disabled selected>Select leave type</option>
                            <option value="sick">Sick Leave</option>
                            <option value="vacation">Vacation Leave</option>
                            <option value="personal">Personal Leave</option>
                        </select>
                    </div>
                    
                    <!-- Leave Duration Radio Buttons -->
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Leave Duration</label>
                        <div class="flex gap-4">
                            <div>
                                <input type="radio" id="single_day" name="leave_duration" value="single_day" class="mr-2" required>
                                <label for="single_day" class="text-sm text-gray-900 dark:text-white">Single Day</label>
                            </div>
                            <div>
                                <input type="radio" id="multi_day" name="leave_duration" value="multi_day" class="mr-2">
                                <label for="multi_day" class="text-sm text-gray-900 dark:text-white">Multi Day</label>
                            </div>
                            <div>
                                <input type="radio" id="half_day" name="leave_duration" value="half_day" class="mr-2">
                                <label for="half_day" class="text-sm text-gray-900 dark:text-white">Half Day</label>
                            </div>
                            <div>
                                <input type="radio" id="hours" name="leave_duration" value="hours" class="mr-2">
                                <label for="hours" class="text-sm text-gray-900 dark:text-white">Hours</label>
                            </div>
                        </div>
                    </div>

                    <!-- Date Input -->
                    <div>
                        <label for="leave_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Leave Date</label>
                        <input type="date" id="leave_date" name="leave_date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                    </div>

                    <!-- Reason Note Input -->
                    <div>
                        <label for="reason" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Reason Note</label>
                        <input type="text" id="reason" name="reason" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Enter reason" required>
                    </div>

                    <!-- Attachments -->
                    <div>
                        <label for="attachments" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Attachments</label>
                        <input type="file" id="attachments" name="attachments[]" multiple class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    </div>
                </div>
                <div class="flex justify-end gap-4">
                    <button onclick="closeassignleave()" type="button" class="text-gray-600 bg-gray-200 hover:bg-gray-300 rounded-lg text-sm px-5 py-2.5 text-center dark:bg-gray-700 dark:hover:bg-gray-600 dark:text-gray-300 dark:hover:text-gray-200">
                        Cancel
                    </button>
                    <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
                        </svg>
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
