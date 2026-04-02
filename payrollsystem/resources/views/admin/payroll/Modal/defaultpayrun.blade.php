<!-- Main modal -->
<div id="def-pay" class="fixed inset-0 bg-gray-800 bg-opacity-60 flex items-center justify-center hidden z-50">
    <div class="relative w-full max-w-3xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Add Payrun (Default)
                </h3>
                <button onclick = "closeDefaultPay()" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form class="p-4 md:p-5">
                <p class="text-sm text-orange-600 dark:text-gray-300">
                    All good, Just have a quick read!
                </p>
                <p class="text-sm text-black-600 dark:text-gray-300">
                    You are going to add default payrun based on the settings or employee preference.
                </p>
                <p class="text-sm text-black-600 dark:text-gray-300 mb-4">
                    Please have a look on payrun generating for last month.
                </p>
                
                <div id="details-message" class="mb-4 hidden flex items-center space-x-4">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-blue-500">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
                    </svg>
                    <div class="flex-1">
                        <div class="flex flex-col space-y-1">
                            <div class="flex items-center space-x-2">
                                <h2 class="text-blue-700 text-sm">01 - 31 May 2024</h2>
                                <p class="text-gray-600 text-sm italic">Includes 1 employee</p>
                            </div>
                            <div class="flex items-center space-x-2">
                                <h2 class="text-black-700 text-sm mb-2">Monthly - Hour based (include overtime) | 
                                    <a class="text-blue-500 hover:underline" href="#">Default</a> - followed by settings
                                </h2>
                            </div>
                        </div>
                        
                        <!-- Earning and Deduction boxes aligned below -->
                        <div style="margin-top: 1rem;">
                            <div style="display: flex; justify-content: space-between; margin-bottom: 0.5rem;">
                                <div style="flex: 1; margin-right: 0.5rem;">
                                    <strong class="text-gray-900 dark:text-white">Earning:</strong>
                                    <p style="display: inline-block; background-color: #f9fafb; border: 1px solid #d1d5db; border-radius: 0.375rem; padding: 0.5rem 0.75rem; font-size: 0.875rem; line-height: 1.25rem; width: 100%; box-sizing: border-box; text-align: left;">₱150000</p>
                                </div>
                                <div style="flex: 1;">
                                    <strong class="text-gray-900 dark:text-white">Deduction:</strong>
                                    <p style="display: inline-block; background-color: #f9fafb; border: 1px solid #d1d5db; border-radius: 0.375rem; padding: 0.5rem 0.75rem; font-size: 0.875rem; line-height: 1.25rem; width: 100%; box-sizing: border-box; text-align: left;">₱0</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              
                <div class="grid gap-4 mb-4">
                    <div>
                        <label for="payslip-note" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Payslip Note (optional)</label>
                        <input type="text" name="payslip-note" id="payslip-note" class="h-20 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Add a payslip note here" onfocus="showDetailsMessage()" onblur="hideDetailsMessage()">
                    </div>
                </div>
                
                <p class="text-sm text-black-600 dark:text-gray-300 mb-2">
                    Please make your own <a class="text-blue-500 hover:underline" href="#">settings</a>. Also can <a class="text-blue-500 hover:underline" href="#">Add Manual Payrun</a>. Otherwise run the default payrun.
                </p>
                <div class="flex justify-end gap-4">
                    <button onclick = "closeDefaultPay()" type="button" class="text-gray-600 bg-gray-200 hover:bg-gray-300 rounded-lg text-sm px-5 py-2.5 text-center dark:bg-gray-700 dark:hover:bg-gray-600 dark:text-gray-300 dark:hover:text-gray-200">
                        Cancel
                    </button>
                    <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                        Run
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
