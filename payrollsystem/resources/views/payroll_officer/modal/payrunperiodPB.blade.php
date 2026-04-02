<!-- Main modal -->
<div id="payrun" class="fixed inset-0 bg-gray-800 bg-opacity-60 flex items-center justify-center hidden z-50">
    <div class="relative p-4 w-full max-w-3xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Edit Payrun
                </h3>
                <button onclick = "ClosePayrunPeriod()"  type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form class="p-4 md:p-5">
                <div class="grid gap-4 mb-4">
                    <div>
                        <label for="payrun_period" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Payrun Period</label>
                        <select id="payrun_period" name="payrun_period" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option selected disabled>Choose Payrun Period</option>
                            <option value="weekly">Weekly</option>
                            <option value="monthly">Monthly</option>
                        </select>
                        <p class="text-gray-400 text-sm mt-1" style="font-style: italic;">Always run for last month</p>
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Payrun Generating Type</label>
                        <div class="flex items-center space-x-4">
                            <label class="flex items-center">
                                <input type="radio" name="payrun_type" value="hour" class="text-primary-500 focus:ring-primary-500 dark:focus:ring-primary-500">
                                <span class="ml-2 text-sm text-gray-900 dark:text-white">Hour</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" name="payrun_type" value="daily_log" class="text-primary-500 focus:ring-primary-500 dark:focus:ring-primary-500">
                                <span class="ml-2 text-sm text-gray-900 dark:text-white">Daily Log</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" name="payrun_type" value="none" class="text-primary-500 focus:ring-primary-500 dark:focus:ring-primary-500">
                                <span class="ml-2 text-sm text-gray-900 dark:text-white">None</span>
                            </label>
                        </div>
                    </div>
                    <div>
                        <label for="consider_overtime" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Consider Overtime</label>
                        <div class="flex items-center">
                            <input type="checkbox" id="consider_overtime" name="consider_overtime" class="hidden">
                            <button type="button" id="consider_overtime_button" class="focus:outline-none relative w-12 h-6 bg-gray-400 rounded-full cursor-pointer">
                                <div id="toggleCircle" class="absolute left-1 top-1 w-4 h-4 bg-white rounded-full shadow-md transition-transform"></div>
                            </button>
                           
                        </div>
                        <p class="text-gray-400 text-sm mt-1" style="font-style: italic;">(Overtime will be calculated after the end of the total schedule time.)</p>
                    </div>
                </div>
                <div class="flex justify-end gap-4">
                    <button onclick = "ClosePayrunPeriod()" type="button" class="text-gray-600 bg-gray-200 hover:bg-gray-300 rounded-lg text-sm px-5 py-2.5 text-center dark:bg-gray-700 dark:hover:bg-gray-600 dark:text-gray-300 dark:hover:text-gray-200">
                        Cancel
                    </button>
                    <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
